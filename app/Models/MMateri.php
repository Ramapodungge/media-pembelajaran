<?php

namespace App\Models;

use CodeIgniter\Model;

class MMateri extends Model
{
    protected $table            = 'materi';
    protected $primaryKey       = 'id_materi';
    protected $allowedFields    = ['judul', 'deskripsi', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
