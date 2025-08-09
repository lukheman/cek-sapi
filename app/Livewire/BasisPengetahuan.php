<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class BasisPengetahuan extends Component
{
    use WithPagination;
    use WithModal;
    use WithNotify;

    public $modalId = 'modal-gejala-penyakit';

    public string $search = '';
    public $selectedPenyakit = null;

    public float $probabilitas = 0;

    #[Rule('required')]
    public $selectedIdGejala = null;

    #[Computed]
    public function gejala() {
        return Gejala::latest()->get();
    }

    #[Computed]
    public function penyakit() {
        return Penyakit::query()
            ->when($this->search, function($query) {
                $query->where('nama', 'like', '%'.$this->search.'%');
            })
            ->latest()
            ->paginate(10);
    }

    public function showGejalaPenyakit($id) {
        $this->selectedPenyakit = Penyakit::with('gejala')->find($id);
        $this->openModal($this->modalId);
    }

    public function cancel() {
        $this->reset();
        $this->closeModal($this->modalId);
    }

    public function saveGejalaPenyakit() {
        // selain menambahakan gejala gejala, juga memperbarui gejaa yang sudah ada
 $this->validate([
        'selectedIdGejala' => 'required|exists:gejala,id',
        'probabilitas' => 'required|numeric|min:0|max:1'
    ]);

        $this->selectedPenyakit->gejala()->syncWithoutDetaching([
            $this->selectedIdGejala => [
                'probabilitas' => $this->probabilitas
            ]
        ]);

        $this->notifySuccess('Berhasil memperbarui gejala ke penyakit');

    }

    public function deleteGejalaPenyakit($id) {
        $this->selectedIdGejala = $id;
        $this->dispatch('deleteConfirmation', message: 'Apakah anda yakin untuk menghapus gejala penyakit ini? ');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed() {
        $this->selectedPenyakit->gejala()->detach($this->selectedIdGejala);
        $this->notifySuccess('Berhasil menghapus gejala dari penyakit');
    }


    public function render()
    {
        return view('livewire.basis-pengetahuan');
    }
}
