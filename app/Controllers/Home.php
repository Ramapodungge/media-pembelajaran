<?php

namespace App\Controllers;

use App\Models\MPengguna;
use App\Models\MMateri;
use App\Models\MSub;
use App\Models\MKuis;

class Home extends BaseController
{
    protected $MPengguna;
    protected $MMateri;
    protected $MSub;
    protected $MKuis;
    public function __construct()
    {
        $this->MPengguna = new MPengguna();
        $this->MMateri = new MMateri();
        $this->MSub = new MSub();
        $this->MKuis = new MKuis();
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
    public function sub_materi($id_materi)
    {
        $list = $this->MMateri->getAll($id_materi);

        $data = [
            'title' => 'Menu Sub Materi',
            'list' => $list
        ];
        return view('menu_utama_sub_materi', $data);
    }
    public function isi_materi($id_bab)
    {
        // Jika tidak ada ID yang diberikan, arahkan kembali atau beri pesan error
        if ($id_bab === null) {
            return redirect()->to('/'); // Atau tampilkan pesan error jika diperlukan
        }

        // Ambil data konten berdasarkan ID
        $kontenData = $this->MSub->getKontenById($id_bab); // Menggunakan fungsi untuk mencari berdasarkan ID

        // Jika konten tidak ditemukan, beri pesan error atau redirect
        if (!$kontenData) {
            return redirect()->to('/'); // Atau tampilkan pesan error
        }

        // Pisahkan konten berdasarkan pagebreak
        $kontenHalaman = explode('<!-- pagebreak -->', $kontenData['konten']);

        // Menghitung total halaman
        $totalHalaman = count($kontenHalaman);

        // Menentukan halaman yang sedang aktif berdasarkan parameter page
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $page = max(1, min($totalHalaman, $page)); // Pastikan halaman valid

        // Mengambil konten halaman yang sesuai
        $kontenHalamanAktif = $kontenHalaman[$page - 1];

        // Mengirimkan data ke view
        $data = [
            'title' => 'Halaman Materi',
            'konten' => $kontenHalamanAktif,
            'judul' => $kontenData['judul'],
            'totalHalaman' => $totalHalaman,
            'page' => $page,
            'id' => $id_bab
        ];
        return view('isi_materi', $data);
    }
    public function kuis_name()
    {
        // Cek apakah ada pesan dari session (misalnya, setelah submit quiz)
        $session = session();
        $pesan = $session->getFlashdata('pesan'); // Ambil pesan dari session
        $data = [
            'title' => 'Menu Kuis Name',
            'pesan' => $pesan
        ];
        return view('quiz_name', $data);
    }
    public function menu_kuis()
    {
        $nama = $this->request->getVar('nama');
        if (!empty($nama)) {
            $session = session();
            $session->set('nama', $nama); // Simpan nama di session
            $session->set('score', 0); // Inisialisasi score

            // Ambil pertanyaan pertama
            $quizModel = new MKuis();
            $firstQuestionId = $quizModel->getFirstQuestionId();

            if ($firstQuestionId) {
                $session->set('current_question_id', $firstQuestionId); // Simpan ID pertanyaan pertama di session
                // Ambil pertanyaan pertama
                $pertanyaan = $quizModel->getPertanyaanById($firstQuestionId);
                $data = [
                    'title' => 'Halaman Pertanyaan',
                    'nama' => $nama,
                    'pertanyaan' => $pertanyaan
                ];
                return view('menu_quiz', $data); // Tampilkan halaman pertanyaan
            } else {
                return redirect()->to('/kuis_name')->with('pesan', [
                    'title' => 'Error',
                    'text' => 'Tidak ada pertanyaan tersedia.',
                    'icon' => 'error'
                ]);
            }
        } else {
            return redirect()->to('/kuis_name')->with('pesan', [
                'title' => 'Error',
                'text' => 'Nama tidak boleh kosong!',
                'icon' => 'error'
            ]);
        }
    }

    public function checkAnswer()
    {

        $session = session();
        $nama = $session->get('nama'); // Ambil nama dari session
        $currentQuestionId = $session->get('current_question_id'); // Ambil ID pertanyaan saat ini

        $jawaban = $this->request->getVar('jawaban'); // Ambil jawaban dari form

        // Ambil pertanyaan saat ini dari database
        $quizModel = new MKuis();
        $pertanyaanSaatIni = $quizModel->getPertanyaanById($currentQuestionId);

        // Proses jawaban
        if ($jawaban == $pertanyaanSaatIni['jawaban_benar']) {
            $session->set('score', $session->get('score') + 10); // Tambah skor jika jawaban benar
        }

        // Ambil ID pertanyaan berikutnya
        $nextQuestionId = $currentQuestionId + 1;
        $pertanyaanBerikutnya = $quizModel->getPertanyaanById($nextQuestionId);

        if ($pertanyaanBerikutnya) {
            // Jika ada pertanyaan berikutnya, update session dan tampilkan pertanyaan baru
            $session->set('current_question_id', $nextQuestionId);

            $data = [
                'title' => 'Halaman Pertanyaan',
                'nama' => $nama,
                'pertanyaan' => $pertanyaanBerikutnya
            ];
            return view('menu_quiz', $data);
        } else {
            // Jika tidak ada pertanyaan berikutnya, tampilkan hasil quiz
            $totalPertanyaan = $quizModel->countAll(); // Hitung total pertanyaan
            $score = $session->get('score');

            $session->setFlashdata('pesan', [
                'title' => 'Hasil Quiz',
                'text' => "<h3>Nama: " .$nama. " </h3><h4>Score Anda: " .$score. " dari ". $totalPertanyaan . " soal</h4>",
                'icon' => 'info'
            ]);

            return redirect()->to('/kuis_name'); // Kembali ke halaman awal
        }
    }

public function login()
{
    $data = [
        'title' => 'Halaman Login'
    ];
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
