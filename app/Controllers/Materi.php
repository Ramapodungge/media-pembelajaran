<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MMateri;
use App\Models\MSub;
use App\Models\MGambar;

class Materi extends BaseController
{
    protected $MMateri;
    protected $MSub;
    protected $MGambar;
    public function __construct()
    {
        $this->MMateri = new MMateri();
        $this->MSub = new MSub();
        $this->MGambar = new MGambar();
    }
    public function materi()
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $dm = $this->MMateri->findAll();
            $sub = $this->MSub->findAll();
            $data = [
                'title' => 'Halaman Materi',
                'judul' => 'Materi',
                'page' => 'Materi',
                'materi' => $dm,
                'sub' => $sub
            ];
            return view('admin/v_materi', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }

    public function tambah()
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $data = [
                'title' => 'Halaman Tambah Materi',
                'judul' => 'Tambah Materi',
                'page' => '<a href="' . base_url('materi') . '">Materi</a> / Tambah Materi',
            ];
            return view('admin/v_tambah_materi', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }
    public function act_tambah()
    {
        $judul = $this->request->getVar('judul');
        $desk = $this->request->getVar('desk');
        date_default_timezone_set('Asia/Makassar');
        $data = [
            'judul' => $judul,
            'deskripsi' => $desk
        ];
        $this->MMateri->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('materi');
    }

    public function edit($id_materi)
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $materi = $this->MMateri->where(['id_materi' => $id_materi])->get()->getResultArray();
            // print_r($materi);
            $data = [
                'title' => 'Halaman Edit Materi',
                'judul' => 'Edit Materi',
                'page' => '<a href="' . base_url('materi') . '">Materi</a> / Edit Materi',
                'materi' => $materi
            ];
            return view('admin/v_e_tambah_materi', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }

    public function act_ubah()
    {
        $id_materi = $this->request->getVar('id_materi');
        $judul = $this->request->getVar('judul');
        $desk = $this->request->getVar('desk');
        date_default_timezone_set('Asia/Makassar');
        $data = [
            'id_materi' => $id_materi,
            'judul' => $judul,
            'deskripsi' => $desk
        ];
        $this->MMateri->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('materi');
    }

    public function tambah_sub()
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $materi = $this->MMateri->findAll();
            $data = [
                'title' => 'Halaman Tambah Sub Materi',
                'judul' => 'Tambah Sub Materi',
                'page' => '<a href="materi"> Materi </a> / Tambah Sub Materi',
                'materi' => $materi
            ];
            return view('admin/v_tambah_sub_materi', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }

    public function act_tambah_sub()
    {
        $materi = $this->request->getVar('materi');
        $sub = $this->request->getVar('sub');
        $konten = $this->request->getVar('konten');
        // echo "<pre>";
        // print_r($this->request->getVar('foto'));
        // echo "</pre>";
        if (!$this->validate([
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $Berkasfoto = $this->request->getFile('foto');
        // jika form foto kosong
        if ($Berkasfoto->getError() == 4) {
            $filefoto = 'blank.png';
        } else {
            $filefoto = $Berkasfoto->getRandomName();
            $Berkasfoto->move('gambar_materi/', $filefoto);
        }
        date_default_timezone_set('Asia/Makassar');
        $data = [
            'id_materi' => $materi,
            'judul' => $sub,
            'konten' => $konten
        ];
        $this->MSub->save($data);
        $id_submateri = $this->MSub->getLastID();
        $data_gambar = [
            'id_submateri' => $id_submateri,
            'gambar' => $filefoto
        ];
        $this->MGambar->save($data_gambar);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('materi');
    }

    public function edit_sub($id_bab)
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $materi = $this->MMateri->findAll();
            // $sub = $this->MSub->where(['id_bab' => $id_bab])->get()->getResultArray();
            $sub = $this->MSub->getAll($id_bab);
            // print_r($materi);
            $data = [
                'title' => 'Halaman Edit Sub Materi',
                'judul' => 'Edit Sub Materi',
                'page' => '<a href="' . base_url('materi') . '"> Materi </a> / Edit Sub Materi',
                'materi' => $materi,
                'sub' => $sub
            ];
            return view('admin/v_e_sub_materi', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }
    public function act_edit_sub()
    {
        $id_bab = $this->request->getVar('id_bab');
        $materi = $this->request->getVar('materi');
        $id = $this->request->getVar('id');
        $sub = $this->request->getVar('sub');
        $konten = $this->request->getVar('konten');
        if (!$this->validate([
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $Berkasfoto = $this->request->getFile('foto');

        // jika form foto kosong
        if ($Berkasfoto->getError() == 4) {
            $filefoto =  $this->request->getVar('fl');
        } else {
            $filefoto = $Berkasfoto->getRandomName();
            $Berkasfoto->move('gambar_materi/', $filefoto);
            //hapus file yang lama
            $a = $this->MGambar->where(['id_submateri' => $id_bab])->get()->getResultArray();
            foreach ($a as $b) {
                if ($b['gambar'] != 'blank.jpg') {
                    unlink('gambar_materi/' . $b['gambar']);
                }
            }
        }
        date_default_timezone_set('Asia/Makassar');
        $data = [
            'id_bab' => $id_bab,
            'id_materi' => $materi,
            'judul' => $sub,
            'konten' => $konten
        ];
        $this->MSub->save($data);
        $data_gambar = [
            'id' => $id,
            'id_submateri' => $id_bab,
            'gambar' => $filefoto
        ];
        $this->MGambar->save($data_gambar);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('materi');
    }
}
