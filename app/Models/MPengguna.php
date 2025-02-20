<?php

namespace App\Models;

use CodeIgniter\Model;

class MPengguna extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id_pengguna';
    protected $allowedFields    = ['nama_pengguna', 'password', 'email', 'level'];
}
