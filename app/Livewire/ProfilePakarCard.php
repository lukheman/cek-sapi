<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class ProfilePakarCard extends Component
{
    public User $pakar;

    public function mount()
    {
        $this->pakar = User::where('email', 'admin@gmail.com')->first();
    }

    public function render()
    {
        return view('livewire.profile-pakar-card');
    }
}
