<?php

namespace App\Models;

use CodeIgniter\Model;

class MKuis extends Model
{
    protected $table            = 'soal_kuis';
    protected $primaryKey       = 'id_soal';
    protected $allowedFields    = ['pertanyaan', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'jawaban_benar'];
}
