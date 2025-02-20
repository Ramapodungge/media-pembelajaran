<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    public function pengguna()
    {
        $data = [
            'title' => 'Halaman Pengguna',
            'judul' => 'Pengguna',
            'page' => 'Pengguna'
        ];
        return view('admin/v_pengguna', $data);
    }
}
