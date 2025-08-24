<?php

namespace App\Livewire;

use App\Models\Penyakit;
use Livewire\Component;

class PenyakitCard extends Component
{
    public Penyakit $penyakit;

    public function render()
    {
        return view('livewire.penyakit-card');
    }
}
