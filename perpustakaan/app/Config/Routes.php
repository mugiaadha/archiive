<?php

use App\Controllers\Anggota;
use App\Controllers\Buku;
use App\Controllers\CurriculumVitae;
use App\Controllers\Dashboard;
use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\PeminjamanBuku;
use App\Controllers\Pengembalian;
use App\Controllers\Rak;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);

$routes->get('/login', [Login::class, 'index']);
$routes->post('/login/save', [Login::class, 'save']);

$routes->get('/Dashboard', [Dashboard::class, 'index']);

$routes->get('/Anggota', [Anggota::class, 'index']);
$routes->get('/Anggota/Search', [Anggota::class, 'Search']);
$routes->get('/Anggota/Tambah', [Anggota::class, 'Tambah']);
$routes->post('/Anggota/DoTambahAnggota', [Anggota::class, 'DoTambahAnggota']);
$routes->get('/Anggota/HapusAnggota/(:any)', [Anggota::class, 'HapusAnggota']);
$routes->get('/Anggota/EditAnggota/(:any)', [Anggota::class, 'EditAnggota']);
$routes->post('/Anggota/DoEdit/(:any)', [Anggota::class, 'DoEdit']);


$routes->get('/Buku', [Buku::class, 'index']);
$routes->get('/Buku/Search', [Buku::class, 'Search']);
$routes->get('/Buku/Tambah', [Buku::class, 'Tambah']);
$routes->post('/Buku/DoTambahBuku', [Buku::class, 'DoTambahBuku']);
$routes->get('/Buku/HapusBuku/(:any)', [Buku::class, 'HapusBuku']);
$routes->get('/Buku/EditBuku/(:any)', [Buku::class, 'EditBuku']);
$routes->post('/Buku/DoEdit/(:any)', [Buku::class, 'DoEdit']);


$routes->get('/CurriculumVitae', [CurriculumVitae::class, 'index']);
$routes->get('/saveCV', [CurriculumVitae::class, 'saveCV']);
$routes->get('/delete', [CurriculumVitae::class, 'delete']);
$routes->get('/exportExcel', [CurriculumVitae::class, 'exportExcel']);

$routes->get('/Home', [Home::class, 'index']);

$routes->get('/PeminjamanBuku', [PeminjamanBuku::class, 'index']);
$routes->get('/PeminjamanBuku/Pengembalian', [PeminjamanBuku::class, 'Pengembalian']);
$routes->get('/PeminjamanBuku/Search', [PeminjamanBuku::class, 'Search']);
$routes->get('/PeminjamanBuku/Pinjam', [PeminjamanBuku::class, 'Pinjam']);
$routes->get('/PeminjamanBuku/KembalikanBuku/(:any)', [PeminjamanBuku::class, 'KembalikanBuku']);
$routes->post('/PeminjamanBuku/DoKembalikanBuku', [PeminjamanBuku::class, 'DoKembalikanBuku']);
$routes->post('/PeminjamanBuku/DoPinjam', [PeminjamanBuku::class, 'DoPinjam']);


$routes->get('/Pengembalian', [Pengembalian::class, 'index']);
$routes->get('/Search', [Pengembalian::class, 'Search']);


$routes->get('/Rak', [Rak::class, 'index']);
$routes->get('/Rak/HapusRak/(:any)', [Rak::class, 'HapusRak']);
$routes->get('/Rak/Search', [Rak::class, 'Search']);
$routes->get('/Rak/Tambah', [Rak::class, 'Tambah']);
$routes->post('/Rak/DoTambahRak', [Rak::class, 'DoTambahRak']);
$routes->get('/Rak/EditRak/(:any)', [Rak::class, 'EditRak']);
$routes->post('/Rak/DoEdit/(:any)', [Rak::class, 'DoEdit']);


$routes->get('/User', [User::class, 'index']);
$routes->get('/User/Search', [User::class, 'Search']);
$routes->get('/User/Tambah', [User::class, 'Tambah']);
$routes->post('/User/DoTambahUser', [User::class, 'DoTambahUser']);
$routes->get('/User/HapusUser/(:any)', [User::class, 'HapusUser']);
$routes->get('/User/EditUser/(:any)', [User::class, 'EditUser']);
$routes->post('/User/DoEdit/(:any)', [User::class, 'DoEdit']);
