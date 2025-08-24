<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user = null;

    public string $name = '';
    public string $email = '';
    public string $tanggal_lahir = '';
    public string $pendidikan = '';
    public string $jabatan = '';
    public ?string $tempat_lahir = null;

    protected function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'email'         => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'tanggal_lahir' => 'required|date',
            'pendidikan'    => 'required|string|max:255',
            'jabatan'       => 'required|string|max:255',
            'tempat_lahir'  => 'nullable|string|max:255',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required'          => 'Nama wajib diisi',
            'email.required'         => 'Email wajib diisi',
            'email.email'            => 'Format email tidak valid',
            'email.unique'           => 'Email sudah digunakan',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'pendidikan.required'    => 'Pendidikan wajib diisi',
            'jabatan.required'       => 'Jabatan wajib diisi',
        ];
    }

    public function store()
    {
        $data = $this->validate();


        User::create($data);

        $this->reset();
    }

    public function update()
    {
        $data = $this->validate();

        $this->user->update($data);

        $this->reset();
    }

    public function delete()
    {
        $this->user->delete();
        $this->reset();
    }
}
