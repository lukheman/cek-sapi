<?php

namespace App\Livewire\Forms;

use App\Models\Penyakit;
use Illuminate\Validation\Rule;
use Livewire\Form;

class PenyakitForm extends Form
{
    public ?Penyakit $penyakit = null;

    public string $kode = '';

    public $nama = '';

    public $deskripsi = '';

    public $solusi = '';

    public $probabilitas = '';

    protected function rules(): array
    {
        return [
            'kode' => [
                'required',
                'string',
                'max:50',
                Rule::unique('penyakit', 'kode')->ignore($this->penyakit),
            ],
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:5',
            'solusi' => 'required|string|min:5',
            'probabilitas' => 'required|numeric|min:0|max:1',
        ];
    }

    protected function messages(): array
    {
        return [
            'kode.required' => 'Kode penyakit wajib diisi.',
            'kode.string' => 'Kode penyakit harus berupa teks.',
            'kode.max' => 'Kode penyakit tidak boleh lebih dari 50 karakter.',
            'kode.unique' => 'Kode penyakit sudah terdaftar, gunakan kode lain.',

            'nama.required' => 'Nama penyakit wajib diisi.',
            'nama.string' => 'Nama penyakit harus berupa teks.',
            'nama.max' => 'Nama penyakit tidak boleh lebih dari 255 karakter.',

            'deskripsi.required' => 'Deskripsi penyakit wajib diisi.',
            'deskripsi.string' => 'Deskripsi penyakit harus berupa teks.',
            'deskripsi.min' => 'Deskripsi penyakit harus memuat minimal 5 karakter.',

            'solusi.required' => 'Solusi penyakit wajib diisi.',
            'solusi.string' => 'Solusi penyakit harus berupa teks.',
            'solusi.min' => 'Solusi penyakit harus memuat minimal 5 karakter.',

            'probabilitas.required' => 'Probabilitas penyakit wajib diisi.',
            'probabilitas.numeric' => 'Probabilitas penyakit harus berupa angka.',
            'probabilitas.min' => 'Probabilitas minimal adalah 0.',
            'probabilitas.max' => 'Probabilitas maksimal adalah 1.',
        ];
    }

    public function store()
    {

        Penyakit::create($this->validate());

        $this->reset();
    }

    public function update()
    {

        $this->penyakit->update($this->validate());
        $this->reset();
    }

    public function delete()
    {
        $this->penyakit->delete();
        $this->reset();
    }
}
