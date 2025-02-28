<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/menu_materi', 'Home::materi');
$routes->get('/sub_materi/(:num)', 'Home::sub_materi/$1');
$routes->get('/isi_materi/(:num)', 'Home::isi_materi/$1');
$routes->get('/isi_materi/(:num)/(:num)', 'Home::isi_materi/$1/$2');
$routes->get('/login_admin', 'Home::login');
$routes->get('/dashboard', 'Dashboard::dashboard');
$routes->get('/kuis', 'Kuis::kuis');
$routes->get('/pengguna', 'Pengguna::pengguna');
//proses Login
$routes->get('/logout', 'Dashboard::logout');
$routes->post('/proses_login', 'Home::proses');
//Page Materi
$routes->get('/materi', 'Materi::materi');
$routes->get('/tambah_materi', 'Materi::tambah');
$routes->post('/act_simpan', 'Materi::act_tambah');
$routes->get('/edit_materi/(:num)', 'Materi::edit/$1');
$routes->post('/act_edit', 'Materi::act_ubah');

$routes->get('/tambah_sub', 'Materi::tambah_sub');
$routes->post('/act_simpan_sub', 'Materi::act_tambah_sub');
$routes->get('/edit_sub/(:num)', 'Materi::edit_sub/$1');
$routes->post('/act_simpan_e_sub', 'Materi::act_edit_sub');

//Batas Page Materi
// Page Quis
$routes->get('/tambah_kuis', 'Kuis::tambah');
$routes->post('/act_simpan_kuis', 'Kuis::simpan');
$routes->get('/edit_kuis/(:num)', 'Kuis::edit/$1');
$routes->post('/act_edit_kuis', 'Kuis::simpan_edit');

$routes->get('/kuis_name', 'Home::kuis_name');
$routes->get('/waktunya_quiz', 'Home::menu_kuis');
$routes->post('/submit', 'Home::checkAnswer');
// Batas Quis