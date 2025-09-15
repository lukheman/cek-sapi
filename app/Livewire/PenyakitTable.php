<?php

namespace App\Livewire;

use App\Livewire\Forms\PenyakitForm;
use App\Models\Penyakit;
use App\Traits\WithConfirmation;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PenyakitTable extends Component
{
    use WithConfirmation;
    use WithModal;
    use WithNotify;
    use WithPagination;

    public PenyakitForm $form;

    public string $modalFormState = 'create';

    public string $search = '';

    public $modalId = 'modal-penyakit';

    #[Computed]
    public function penyakitList()
    {

        return Penyakit::query()
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

        $this->form->penyakit = Penyakit::find($id);

        $this->form->kode = $this->form->penyakit->kode;
        $this->form->nama = $this->form->penyakit->nama;

        $this->form->probabilitas = $this->form->penyakit->probabilitas;
        $this->form->deskripsi = $this->form->penyakit->deskripsi;
        $this->form->solusi = $this->form->penyakit->solusi;

        $this->openModal($this->modalId);
    }

    public function cancel()
    {
        $this->closeModal($this->modalId);
    }

    public function delete($id): void
    {
        $this->form->penyakit = Penyakit::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data penyakit ini ?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed(): void
    {
        $this->notifySuccess("Berhasil menghapus penyakit: {$this->form->penyakit->kode} - {$this->form->penyakit->nama}");
        $this->form->delete();
    }

    public function save(): void
    {

        if ($this->modalFormState === 'create') {

            $this->form->store();
            $this->notifySuccess('Berhasil menambahkan penyakit baru');

        } elseif ($this->modalFormState === 'edit') {
            $this->form->update();
            $this->notifySuccess('Berhasil memperbarui penyakit');
        }

        $this->closeModal($this->modalId);

    }

    public function render()
    {
        return view('livewire.penyakit-table');
    }
}
