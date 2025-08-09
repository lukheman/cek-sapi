<?php

namespace App\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Penyakit;

class PenyakitTable extends Component
{
    public $model = Penyakit::class;

    public $columns = [
        ['field' => 'kode', 'label' => 'Kode Penyakit'],
        ['field' => 'nama', 'label' => 'Nama Penyakit'],
        ['field' => 'probabilitas', 'label' => 'Probabilitas'],
    ];

    public $formFields = [
        ['field' => 'kode', 'label' => 'Kode Penyakit'],
        ['field' => 'nama', 'label' => 'Nama Penyakit'],
        ['field' => 'probabilitas', 'label' => 'Probabilitas'],
    ];

    protected function rules(): array {
        return [
            'form.nama' => 'required|string|max:255',
            'form.kode' => [
                'required',
                Rule::unique('penyakit', 'kode')->ignore($this->editingId),
            ],
            'form.probabilitas' => 'required|numeric'
        ];

    }

    public function messages(): array {
        return [
            'form.nama.required' => 'Silakan masukkan nama penyakit.',
            'form.nama.max' => 'Nama penyakit maksimal terdiri dari 255 karakter.',
            'form.kode.required' => 'Silakan masukkan kode penyakit.',
            'form.kode.unique' => 'Kode penyakit yang Anda masukkan sudah digunakan. Harap gunakan kode lain.',
            'form.probabilitas.required' => 'Silakan masukan probabilitas penyakit'
        ];
    }




    public function render()
    {
        return view('livewire.penyakit-table');
    }
}
