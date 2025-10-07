<?php

namespace App\Livewire\Diagnosis;

use App\Helpers\NaiveBayes;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RiwayatDiagnosis;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class MulaiDiagnosis extends Component
{
    public $daftarGejalaKiri;

    public $daftarGejalaKanan;

    public $gejalaDipilih = [];

    public string $namaPasien = '';

    public function mount()
    {
        $gejala = Gejala::all();

        $gejala = Gejala::all()->map(function ($item, $index) {
            $item->nomor = $index + 1; // index mulai dari 0, jadi ditambah 1
            return $item;
        });

        $half = (int) ceil($gejala->count() / 2);

        $this->daftarGejalaKiri = $gejala->slice(0, $half);
        $this->daftarGejalaKanan = $gejala->slice($half);
    }

    public function diagnosis()
    {

        $NB = new NaiveBayes($this->gejalaDipilih);

        $penyakit = $NB->diagnosis();

        $this->dispatch('showHasilDiagnosis', $penyakit); // untuk komponent Flow

    }


    public function render()
    {
        return view('livewire.diagnosis.mulai-diagnosis');
    }
}
