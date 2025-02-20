<?php

namespace App\Models;

use CodeIgniter\Model;

class MSub extends Model
{
    protected $table            = 'bab';
    protected $primaryKey       = 'id_bab';
    protected $allowedFields    = ['id_materi', 'judul', 'konten', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getLastID()
    {
        return $this->db->insertID();
    }

    public function getAll($id_bab)
    {
        $builder = $this->db->table('bab');
        $builder->join('gambar_materi', 'bab.id_bab = gambar_materi.id_submateri', 'left');
        $builder->where('bab.id_bab', $id_bab);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
