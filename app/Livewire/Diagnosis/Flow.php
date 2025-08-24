<?php

namespace App\Livewire\Diagnosis;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.guest')]
class Flow extends Component
{
    public $state = 'mulai-diagnosis';

    public $penyakit;

    #[On('setState')]
    public function setState($state)
    {
        $this->state = $state;

    }

    #[On('showHasilDiagnosis')]
    public function showHasilDiagnosis($penyakit)
    {

        $this->state = 'hasil-diagnosis';

        $this->penyakit = $penyakit;

    }

    public function render()
    {
        return view('livewire.diagnosis.flow');
    }
}
