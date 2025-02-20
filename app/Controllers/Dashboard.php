<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            $data = [
                'title' => 'Halaman Dashboard',
                'judul' => 'Dashboard',
                'page' => 'Dashboard'
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
