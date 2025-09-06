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

    public $gejalaDipilih = [];

    public function mount()
    {
        $gejala = Gejala::all();
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
