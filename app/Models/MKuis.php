<?php

namespace App\Models;

use CodeIgniter\Model;

class MKuis extends Model
{
    protected $table            = 'soal_kuis';
    protected $primaryKey       = 'id_soal';
    protected $allowedFields    = ['pertanyaan', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'jawaban_benar'];

    public function getPertanyaanAcak()
    {
        return $this->orderBy('RAND()')->findAll(); // Menggunakan RAND() untuk mengacak
    }
    public function getPertanyaanById($firstQuestionId)
    {
        return $this->find($firstQuestionId); // Ambil satu pertanyaan berdasarkan ID
    }
    public function getFirstQuestionId()
    {
        // Ambil ID pertanyaan pertama (terkecil)
        return $this->selectMin('id_soal')->first()['id_soal'];
    }
}
