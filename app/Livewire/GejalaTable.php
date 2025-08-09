<?php

namespace App\Livewire;

use App\Models\Gejala;
use Livewire\Component;

class GejalaTable extends Component
{

    public $model = Gejala::class;

    public $columns = [
        ['field' => 'kode', 'label' => 'Kode Gejala'],
        ['field' => 'nama', 'label' => 'Nama Gejala'],
    ];

    public $formFields = [
        ['field' => 'kode', 'label' => 'Kode Gejala'],
        ['field' => 'nama', 'label' => 'Nama Gejala'],
    ];

    public $rules = [
        'form.nama' => 'required|string|max:255',
        'form.kode' => 'required|unique:gejala,kode',
    ];

    public $messages = [
        'form.nama.required' => 'Silakan masukkan nama gejala.',
        'form.nama.max' => 'Nama gejala maksimal terdiri dari 255 karakter.',
        'form.kode.required' => 'Silakan masukkan kode gejala.',
        'form.kode.unique' => 'Kode gejala yang Anda masukkan sudah digunakan. Harap gunakan kode lain.',
    ];

    public function render()
    {
        return view('livewire.gejala-table');
    }
}
