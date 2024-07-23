<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/transaksi_barang', 'Transaksi::barang');
$routes->get('/laporan_masuk','Laporan::laporan');


$routes->post('/transaksi/save', 'Transaksi::save');
$routes->post('/transaksi/update', 'Transaksi::update');
$routes->post('/transaksi/delete', 'Transaksi::delete');

$routes->get('/transaksi/barang', 'Transaksi::barang');





