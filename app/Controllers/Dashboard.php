<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MPengguna;
use App\Models\MMateri;
use App\Models\MSub;
use App\Models\MGambar;
use App\Models\MKuis;

class Dashboard extends BaseController
{
    protected $MPengguna;
    protected $MMateri;
    protected $MSub;
    protected $MGambar;
    protected $MKuis;
    public function __construct()
    {
        $this->MPengguna = new MPengguna();
        $this->MMateri = new MMateri();
        $this->MSub = new MSub();
        $this->MGambar = new MGambar();
        $this->MKuis = new MKuis();
    }
    public function dashboard()
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $materi = $this->MMateri->countAll();
            $pengguna = $this->MPengguna->countAll();
            $gambar = $this->MGambar->countAll();
            $kuis = $this->MKuis->countAll();
            $data = [
                'title' => 'Halaman Dashboard',
                'judul' => 'Dashboard',
                'page' => 'Dashboard',
                'materi' => $materi,
                'pengguna' => $pengguna,
                'gambar' => $gambar,
                'kuis' => $kuis,
            ];
            return view('admin/dashboard', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login_admin'));
    }
}
