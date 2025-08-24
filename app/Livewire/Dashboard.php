<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public int $jumlah_penyakit;

    public int $jumlah_gejala;

    public int $jumlah_pengguna;

    public function mount()
    {
        $this->jumlah_penyakit = Penyakit::count();
        $this->jumlah_gejala = Gejala::count();
        $this->jumlah_pengguna = User::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
