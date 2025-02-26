<?php

namespace App\Controllers;

use App\Models\MPengguna;
use App\Models\MMateri;

class Home extends BaseController
{
    protected $MPengguna;
    protected $MMateri;
    public function __construct()
    {
        $this->MPengguna = new MPengguna();
        $this->MMateri = new MMateri();
    }
    public function index()
    {
        $data = [
            'title' => 'Menu Utama',
        ];
        return view('menu_utama', $data);
    }
    public function materi()
    {
        $materi = $this->MMateri->find();

        $data = [
            'title' => 'Menu Materi',
            'materi' => $materi
        ];
        return view('menu_materi', $data);
    }
    public function login()
    {
        return view('login');
    }

    public function proses()
    {
        $session = session();
        $username = $this->request->getVar('user');
        $password = $this->request->getVar('pass');
        $level = $this->request->getVar('level');
        // Cek sesuai level yang dipilih
        // Cek di tabel pengajar
        $admin = $this->MPengguna->where('username', $username)->where('level', $level)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            // Jika cocok, set session admin
            $session->set([
                'id_pengguna' => $admin['id_pengguna'],
                'nama_pengguna' => $admin['nama_pengguna'],
                'username' => $admin['username'],
                'level' => $admin['level'],
                'logged_in' => true
            ]);
            $session->setFlashdata('pesanlogin', 'Berhasil Masuk');
            return redirect()->to('/dashboard'); // Redirect ke dashboard pengajar
        }
        // Jika login gagal
        $session->setFlashdata('pesanlogin', 'Username, password, atau level salah');
        return redirect()->back()->withInput(); // Kembali ke halaman login
    }
}
