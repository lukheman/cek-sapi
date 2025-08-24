<?php

namespace App\Helpers;

use App\Models\Gejala;
use App\Models\Penyakit;

class NaiveBayes
{
    /** @var int Jumlah total gejala yang tersedia */
    public int $jumlah_gejala;

    /**
     * @var array<string,float>
     *                          Menyimpan hasil probabilitas penyakit berdasarkan gejala.
     *                          Contoh: ['P01' => 0.85]
     */
    public array $set_probabilitas_penyakit = [];

    /** @var array Konfigurasi gejala untuk diagnosis */
    public $konfigurasi;

    /**
     * Konstruktor untuk inisialisasi NaiveBayes.
     *
     * @param  array  $konfigurasi  Konfigurasi penyakit dan gejala.
     */
    public function __construct($konfigurasi)
    {
        $this->jumlah_gejala = Gejala::count();
        $this->konfigurasi = $konfigurasi;
    }

    /**
     * Melakukan diagnosis berdasarkan konfigurasi gejala dan penyakit.
     *
     * Proses:
     * 1. Melakukan iterasi pada setiap penyakit yang ada di konfigurasi.
     * 2. Mengambil probabilitas penyakit dari database.
     * 3. Menghitung probabilitas setiap gejala untuk penyakit tersebut.
     * 4. Menyimpan hasil probabilitas penyakit berdasarkan gejala.
     * 5. Mengambil hasil diagnosis dengan probabilitas terbesar.
     *
     * @return array<string,float> Kode penyakit dan probabilitas terbesar.
     *                             Contoh: ['P01' => 0.85]
     */
    public function diagnosis()
    {
        foreach ($this->konfigurasi as $kode_penyakit => $gejala) {
            $probabilitas_penyakit = Penyakit::where('kode', $kode_penyakit)->first()->probabilitas;

            $probabilitas_gejala = [];
            foreach ($gejala as $kode_gejala => $is_exist) {
                $probabilitas = $this->getProbabilitasGejala($probabilitas_penyakit, $is_exist);
                $probabilitas_gejala[] = $probabilitas;
            }
            $this->probabilitasPenyakit($kode_penyakit, $probabilitas_gejala);
        }

        return $this->probabilitasTerbesarPenyakit();
    }

    /**
     * Mengembalikan kode penyakit dengan probabilitas terbesar.
     *
     * @return array<string,float> Kode penyakit dengan probabilitas terbesar.
     *                             Contoh: ['P01' => 0.85]
     */
    public function probabilitasTerbesarPenyakit()
    {
        $max = 0;
        $kode_penyakit = null;

        foreach ($this->set_probabilitas_penyakit as $key => $value) {
            if ($value > $max) {
                $max = $value;
                $kode_penyakit = $key;
            }
        }

        return [$kode_penyakit => $max];
    }

    /**
     * Menghitung probabilitas gejala berdasarkan probabilitas penyakit.
     *
     * @param  float  $probabilitas_penyakit  Probabilitas penyakit.
     * @param  bool|int  $gejala_is_exist  Apakah gejala ada (1 / true) atau tidak (0 / false).
     * @return float Probabilitas gejala untuk penyakit tersebut.
     *
     * @example
     * Jika jumlah gejala = 15, probabilitas penyakit = 0.2, gejala_is_exist = 1
     * Maka:
     * (1 + 15 * 0.2) / (1 + 15) = 0.25
     */
    public function getProbabilitasGejala(float $probabilitas_penyakit, bool|int $gejala_is_exist): float
    {
        return ($gejala_is_exist + $this->jumlah_gejala * $probabilitas_penyakit) /
               (1 + $this->jumlah_gejala);
    }

    /**
     * Menghitung probabilitas penyakit dari hasil perkalian semua probabilitas gejala.
     *
     * @param  string  $kode_penyakit  Kode penyakit.
     * @param  array<int,float>  $probabilitas_gejala  Daftar probabilitas gejala.
     * @return float Hasil probabilitas penyakit.
     *
     * @example
     * $kode_penyakit = 'P001';
     * $probabilitas_gejala = [0.2, 0.2, 0.2];
     * Hasil = 0.2 * 0.2 * 0.2 = 0.008
     */
    public function probabilitasPenyakit(string $kode_penyakit, array $probabilitas_gejala): float
    {
        $hasil = 1;
        foreach ($probabilitas_gejala as $p) {
            $hasil *= $p;
        }

        $this->set_probabilitas_penyakit[$kode_penyakit] = $hasil;

        return $hasil;
    }
}
