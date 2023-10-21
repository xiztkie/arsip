<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\Auth;
use App\Controllers\Databarang;
use App\Controllers\Laporan;
use App\Controllers\Datalokasi;
use App\Controllers\Masterdata;
use App\Controllers\Pejabat;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [Home::class, 'index']);
$routes->post('processlogin', [Auth::class, 'processLogin']);
$routes->get('login', [Auth::class, 'login']);
$routes->get('logout', [Auth::class, 'logout']);
$routes->resource('dashboard', [Dashboard::class, 'index']);

/* DATA BARANG */
$routes->get('databarang', [Databarang::class, 'index']);
$routes->post('databarang/add', [Databarang::class, 'addbarang']);
$routes->post('databarang/(:num)/edit', 'Databarang::editbarang/$1');
$routes->delete('databarang/(:num)', 'Databarang::delbarang/$1');

/* DATA LOKASI */
$routes->get('datalokasi', [Datalokasi::class, 'index']);
$routes->post('datalokasi/add', [Datalokasi::class, 'addlokasi']);
$routes->post('datalokasi/(:num)/edit', 'Datalokasi::editlokasi/$1');
$routes->delete('datalokasi/(:num)', 'Datalokasi::dellokasi/$1');

/* USER */
$routes->resource('users', ['controller' => 'Users']);
$routes->post('users/delete/(:num)', 'Users::delete/$1');

/* MASTER DATA */
$routes->get('tahun', [Masterdata::class, 'index']);
$routes->post('tahun/add', [Masterdata::class, 'addtahun']);
$routes->post('tahun/(:num)/edit', 'Masterdata::edittahun/$1');
$routes->delete('tahun/(:num)', 'Masterdata::deltahun/$1');

/* PEJABAT */
$routes->get('pejabat', [Pejabat::class, 'index']);
$routes->post('pejabat/add', [Pejabat::class, 'addpejabat']);
$routes->post('pejabat/(:num)/edit', 'Pejabat::editpejabat/$1');
$routes->delete('pejabat/(:num)', 'Pejabat::delpejabat/$1');

/* LAPORAN */
$routes->get('laporan', [Laporan::class, 'index']);
$routes->post('laporan/result', [Laporan::class, 'result']);
$routes->get('pdf/(:num)', 'Laporan::generatePDF/$1');
$routes->post('laporanpdf', 'Laporan::laporanPDF');
