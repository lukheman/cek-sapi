<?php

namespace App\Livewire\Diagnosis;

use App\Helpers\NaiveBayes;
use App\Models\Gejala;
use App\Models\Penyakit;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class MulaiDiagnosis extends Component
{
    public $daftarGejalaKiri;

    public $daftarGejalaKanan;

    public $gejalaDipilih = [1, 4, 6, 7];

    public function mount()
    {
        $gejala = Gejala::all();
        $half = (int) ceil($gejala->count() / 2);

        $this->daftarGejalaKiri = $gejala->slice(0, $half);
        $this->daftarGejalaKanan = $gejala->slice($half);
    }

    public function diagnosis()
    {

        $penyakitList = Penyakit::with('gejala')->get();
        $allGejala = Gejala::pluck('kode')->toArray();

        $konfigurasi = [];

        foreach ($penyakitList as $penyakit) {

            $gejalaDiagnosa = []; // ['G1' => 1, 'G2' => 0]

            foreach ($this->gejalaDipilih as $id_gejala) {

                $hasGejala = $penyakit->gejala->contains('id', $id_gejala);

                // apakah penyakit ini mempunyai gejala dengan $id_gejala
                if ($hasGejala) {
                    $gejalaDiagnosa[$id_gejala] = 1;

                } else {

                    $gejalaDiagnosa[$id_gejala] = 0;
                }

            }

            $konfigurasi[$penyakit->kode] = $gejalaDiagnosa;
        }

        $NB = new NaiveBayes($konfigurasi);
        $hasil_diagnosis = $NB->diagnosis();

        $penyakit = Penyakit::where('kode', array_key_first($hasil_diagnosis))->first();

        $penyakit->persentase = round($hasil_diagnosis[$penyakit->kode] * 100, 2);

        $this->dispatch('showHasilDiagnosis', $penyakit); // untuk komponent Flow

    }

    public function render()
    {
        return view('livewire.diagnosis.mulai-diagnosis');
    }
}
