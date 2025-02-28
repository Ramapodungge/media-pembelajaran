<?php

namespace App\Models;

use CodeIgniter\Model;

class MMateri extends Model
{
    protected $table            = 'materi';
    protected $primaryKey       = 'id_materi';
    protected $allowedFields    = ['judul_materi', 'deskripsi', 'gambar_thum', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAll($id_materi)
    {
        $builder = $this->db->table('bab');
        $builder->join('gambar_materi', 'bab.id_bab = gambar_materi.id_submateri', 'left');
        $builder->join('materi', 'materi.id_materi = bab.id_materi');
        $builder->where('bab.id_materi', $id_materi);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
