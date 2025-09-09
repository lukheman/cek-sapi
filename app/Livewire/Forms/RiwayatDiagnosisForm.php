<?php

namespace App\Livewire\Forms;

use App\Models\RiwayatDiagnosis;
use Livewire\Form;

class RiwayatDiagnosisForm extends Form
{
    public ?RiwayatDiagnosis $riwayat = null;

    public string $nama_pasien = '';

    public int $id_penyakit;

    public float $probabilitas;

    protected function rules(): array
    {
        return [
            'nama_pasien' => 'required|string|max:255',
            'id_penyakit' => 'required|exists:penyakit,id',
            'probabilitas' => 'required|numeric|min:0|max:1',
        ];
    }

    protected function messages(): array
    {
        return [
            'nama_pasien.required' => 'Nama pasien wajib diisi',
            'id_penyakit.required' => 'Penyakit wajib dipilih',
            'id_penyakit.exists' => 'Penyakit tidak valid',
            'probabilitas.required' => 'Probabilitas wajib diisi',
            'probabilitas.numeric' => 'Probabilitas harus berupa angka',
            'probabilitas.min' => 'Probabilitas minimal 0',
            'probabilitas.max' => 'Probabilitas maksimal 1',
        ];
    }

    public function delete()
    {
        $this->riwayat->delete();

    }
}
