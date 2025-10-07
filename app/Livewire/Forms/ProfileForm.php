<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProfileForm extends Form
{
    use WithFileUploads;

    public ?User $user;

    public $name;

    public $email;

    public string $password = '';

    public $photo;

    public $tanggal_lahir;

    public $pendidikan;

    public $jabatan;

    public ?string $tempat_lahir = null;


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => [
                'required',
                'string',
                'email',
                'max:100',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'password' => ['nullable'], // optional, minimal 8 karakter
            'photo' => ['nullable', 'image', 'max:2048'], // Max 2MB
            'tanggal_lahir' => ['nullable', 'date', 'before:today'], // tidak boleh tanggal masa depan
            'pendidikan' => ['nullable', 'string', 'max:50'],
            'jabatan' => ['nullable', 'string', 'max:50'],

            'tempat_lahir' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.max' => 'Nama maksimal 50 karakter.',

            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 100 karakter.',
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',

            'password.min' => 'Password minimal 8 karakter.',

            // 'photo.image' => 'File yang diunggah harus berupa gambar.',
            // 'photo.max' => 'Ukuran foto maksimal 2MB.',

            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'tanggal_lahir.before' => 'Tanggal lahir tidak boleh di masa depan.',

            'pendidikan.max' => 'Pendidikan maksimal 50 karakter.',
            'jabatan.max' => 'Jabatan maksimal 50 karakter.',
        ];
    }

    public function update(): bool
    {
        // Validate the form data
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // dd($e->errors()); // semua error yang gagal validasi
        }

        // Prepare updates only for changed fields
        $updates = [];
        if ($this->name !== $this->user->name) {
            $updates['name'] = $this->name;
        }
        if ($this->tempat_lahir !== $this->user->tempat_lahir) {
            $updates['tempat_lahir'] = $this->tempat_lahir;
        }
        if ($this->email !== $this->user->email) {
            $updates['email'] = $this->email;
        }
        if (! empty($this->password)) {
            $updates['password'] = Hash::make($this->password);
        }

        // Tambahkan field tambahan
        if ($this->tanggal_lahir !== $this->user->tanggal_lahir) {
            $updates['tanggal_lahir'] = $this->tanggal_lahir;
        }
        if ($this->pendidikan !== $this->user->pendidikan) {
            $updates['pendidikan'] = $this->pendidikan;
        }
        if ($this->jabatan !== $this->user->jabatan) {
            $updates['jabatan'] = $this->jabatan;
        }

        if ($this->photo) {
            // Delete old photo if exists
            if ($this->user->photo) {
                Storage::disk('public')->delete($this->user->photo);
            }
            // Store new photo
            $path = $this->photo->store('photos', 'public');
            $updates['photo'] = $path;
        }

        // Perform update only if there are changes
        if (! empty($updates)) {
            $this->user->update($updates);

            return true;
        }

        return false; // No changes made
    }
}
