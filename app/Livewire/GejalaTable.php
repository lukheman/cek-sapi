<?php

namespace App\Livewire;

use App\Livewire\Forms\GejalaForm;
use App\Models\Gejala;
use App\Traits\WithConfirmation;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class GejalaTable extends Component
{
    use WithConfirmation;
    use WithModal;
    use WithNotify;
    use WithPagination;

    public GejalaForm $form;

    public $modalFormState = 'create';

    public string $search = '';

    public $modalId = 'modal-gejala';

    public function cancel()
    {
        $this->closeModal($this->modalId);
    }

    #[Computed]
    public function gejalaList()
    {
        return Gejala::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%'.$this->search.'%');
            })
            ->paginate(10);
    }

    public function showAddForm()
    {
        $this->form->reset();
        $this->modalFormState = 'create';
        $this->openModal($this->modalId);
    }

    public function showEditForm($id)
    {
        $this->modalFormState = 'edit';

        $this->form->gejala = Gejala::find($id);

        $this->form->kode = $this->form->gejala->kode;
        $this->form->nama = $this->form->gejala->nama;

        $this->openModal($this->modalId);
    }

    public function delete($id): void
    {
        $this->form->gejala = Gejala::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data gejala ini ?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed(): void
    {
        $this->notifySuccess("Berhasil menghapus gejala: {$this->form->gejala->kode} - {$this->form->gejala->nama}");
        $this->form->delete();
    }

    public function save(): void
    {

        if ($this->modalFormState === 'create') {
            $this->form->store();
            $this->notifySuccess('Berhasil menambahkan gejala baru');
        } elseif ($this->modalFormState === 'edit') {
            $this->form->update();
            $this->notifySuccess('Berhasil memperbarui gejala');
        }

        $this->closeModal($this->modalId);

    }

    public function render()
    {
        return view('livewire.gejala-table');
    }
}
