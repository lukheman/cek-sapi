<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use App\Traits\WithConfirmation;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithConfirmation;
    use WithModal;
    use WithNotify;
    use WithPagination;

    public string $modalId = 'modal-pengguna';

    public string $search = '';

    public string $modalFormState = 'create';

    public UserForm $form;

    public function cancel()
    {
        $this->closeModal($this->modalId);
    }

    #[Computed]
    public function userList()
    {
        return User::query()
            ->when($this->search, fn ($query) => $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
            )
            ->paginate(10);
    }

    public function showAddForm(): void
    {
        $this->form->reset();
        $this->modalFormState = 'create';
        $this->openModal($this->modalId);
    }

    public function showEditForm(int $id): void
    {
        $this->modalFormState = 'edit';
        $this->form->user = User::findOrFail($id);

        // isi form sesuai field
        $this->form->name = $this->form->user->name;
        $this->form->email = $this->form->user->email;
        $this->form->tanggal_lahir = $this->form->user->tanggal_lahir;
        $this->form->tempat_lahir = $this->form->user->tempat_lahir;
        $this->form->pendidikan = $this->form->user->pendidikan;
        $this->form->jabatan = $this->form->user->jabatan;

        $this->openModal($this->modalId);
    }

    public function delete(int $id): void
    {
        $this->form->user = User::findOrFail($id);
        $this->deleteConfirmation('Yakin untuk menghapus data user ini?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed(): void
    {
        $deletedName = $this->form->user->name;
        $this->form->delete();
        $this->notifySuccess("Berhasil menghapus user: {$deletedName}");
    }

    public function save(): void
    {
        if ($this->modalFormState === 'create') {
            $this->form->store();
            $this->notifySuccess('Berhasil menambahkan user baru');
        } elseif ($this->modalFormState === 'edit') {
            $this->form->update();
            $this->notifySuccess('Berhasil memperbarui user');
        }

        $this->closeModal($this->modalId);
    }

    public function render()
    {
        return view('livewire.user-table');
    }
}
