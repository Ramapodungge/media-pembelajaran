<?php

namespace App\Controllers;

use App\Models\MPengguna;

class Home extends BaseController
{
    protected $MPengguna;
    public function __construct()
    {
        $this->MPengguna = new MPengguna();
    }
    public function index(): string
    {
        $html = "<h1>Ini Home Page</h1>";
        return $html;
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
