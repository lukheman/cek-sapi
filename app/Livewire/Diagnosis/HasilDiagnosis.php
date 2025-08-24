<?php

namespace App\Livewire\Diagnosis;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class HasilDiagnosis extends Component
{
    public $penyakit;

    public function render()
    {
        return view('livewire.diagnosis.hasil-diagnosis');
    }
}
