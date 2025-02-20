<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MKuis;

class Kuis extends BaseController
{
    protected $MKuis;
    public function __construct()
    {
        $this->MKuis = new MKuis();
    }
    public function Kuis()
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $kuis = $this->MKuis->findAll();
            $data = [
                'title' => 'Halaman Kuis',
                'judul' => 'Kuis',
                'page' => 'Kuis',
                'kuis' => $kuis
            ];
            return view('admin/v_kuis', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }
    public function tambah()
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $data = [
                'title' => 'Halaman Tambah Kuis',
                'judul' => 'Tambah Kuis',
                'page' => '<a href="' . base_url('kuis') . '">Kuis</a> / Tambah Kuis',
            ];
            return view('admin/v_tambah_kuis', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }
    public function simpan()
    {
        $pertanyaan = $this->request->getVar('pertanyaan');
        $pilihan_a = $this->request->getVar('pilihan_a');
        $pilihan_b = $this->request->getVar('pilihan_b');
        $pilihan_c = $this->request->getVar('pilihan_c');
        $pilihan_d = $this->request->getVar('pilihan_d');
        $jawaban_benar = $this->request->getVar('jawaban_benar');
        $data = [
            'pertanyaan' => $pertanyaan,
            'pilihan_a' => $pilihan_a,
            'pilihan_b' => $pilihan_b,
            'pilihan_c' => $pilihan_c,
            'pilihan_d' => $pilihan_d,
            'jawaban_benar' => $jawaban_benar
        ];
        $this->MKuis->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('kuis');
    }

    public function edit($id_soal)
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $kuis = $this->MKuis->where(['id_soal' => $id_soal])->get()->getResultArray();
            $data = [
                'title' => 'Halaman Edit Kuis',
                'judul' => 'Edit Kuis',
                'page' => '<a href="' . base_url('kuis') . '">Kuis</a> / Edit Kuis',
                'kuis' => $kuis
            ];
            return view('admin/v_e_tambah_kuis', $data);
        } else {
            session()->setFlashdata('pesanlogin', 'Anda Harus Login');
            return redirect()->to(base_url('/login_admin'));
        }
    }
    public function simpan_edit()
    {
        $id_soal = $this->request->getVar('id_soal');
        $pertanyaan = $this->request->getVar('pertanyaan');
        $pilihan_a = $this->request->getVar('pilihan_a');
        $pilihan_b = $this->request->getVar('pilihan_b');
        $pilihan_c = $this->request->getVar('pilihan_c');
        $pilihan_d = $this->request->getVar('pilihan_d');
        $jawaban_benar = $this->request->getVar('jawaban_benar');
        $data = [
            'id_soal' => $id_soal,
            'pertanyaan' => $pertanyaan,
            'pilihan_a' => $pilihan_a,
            'pilihan_b' => $pilihan_b,
            'pilihan_c' => $pilihan_c,
            'pilihan_d' => $pilihan_d,
            'jawaban_benar' => $jawaban_benar
        ];
        $this->MKuis->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('kuis');
    }
}
