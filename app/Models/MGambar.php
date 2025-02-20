<?php

namespace App\Models;

use CodeIgniter\Model;

class MGambar extends Model
{
    protected $table            = 'gambar_materi';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_submateri', 'gambar'];
}
