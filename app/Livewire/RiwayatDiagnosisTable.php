<?php

namespace App\Livewire;

use App\Livewire\Forms\RiwayatDiagnosisForm;
use App\Models\RiwayatDiagnosis;
use App\Traits\WithConfirmation;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RiwayatDiagnosisTable extends Component
{
    use WithConfirmation;
    use WithModal;
    use WithNotify;
    use WithPagination;

    public string $modalId = 'modal-riwayat-diagnosis';

    public string $search = '';

    public RiwayatDiagnosisForm $form;

    #[Computed]
    public function riwayatList()
    {
        return RiwayatDiagnosis::query()->with('penyakit')
            ->when($this->search, fn ($query) =>
                $query->where('nama_pasien', 'like', "%{$this->search}%")
            )
            ->latest()
            ->paginate(10);
    }

    public function delete(int $id): void
    {
        $this->form->riwayat = RiwayatDiagnosis::findOrFail($id);
        $this->deleteConfirmation('Yakin untuk menghapus riwayat diagnosis ini?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed(): void
    {
        $deletedName = $this->form->riwayat->nama_pasien;
        $this->form->delete();
        $this->notifySuccess("Berhasil menghapus riwayat diagnosis pasien: {$deletedName}");
    }

    public function save(): void
    {
        if ($this->modalFormState === 'create') {
            $this->form->store();
            $this->notifySuccess('Berhasil menambahkan riwayat diagnosis baru');
        } elseif ($this->modalFormState === 'edit') {
            $this->form->update();
            $this->notifySuccess('Berhasil memperbarui riwayat diagnosis');
        }

        $this->closeModal($this->modalId);
    }

    public function render()
    {
        return view('livewire.riwayat-diagnosis-table');
    }
}
