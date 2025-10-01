<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosis extends Model
{
    protected $table = 'riwayat_diagnosis';

    protected $guarded = [];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }

    public function getPersentaseAttribute()
    {
        return round($this->probabilitas * 10000, 2).'%';
    }
}
