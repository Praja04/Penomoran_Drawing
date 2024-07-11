<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Grup GET routes
$routes->group('', function ($routes) {
    $routes->get('sub/proses', 'PdfNumberController::getsubProses');
    $routes->get('type/sub', 'PdfNumberController::getTypeSub');
    $routes->get('type/sub2', 'PdfNumberController::getTypeSub2');
    $routes->get('/revisi/numbers', 'PdfNumberController::getRowsByNumber');
    $routes->get('pdf/setStatusMasspro/(:num)', 'PdfNumberController::setStatusMasspro/$1');
    $routes->get('pdf/resetMassproStatus/(:num)', 'PdfNumberController::resetMassproStatus/$1');
    $routes->get('pdf/revise/(:num)', 'PdfNumberController::getRowsByNumber/$1');
    //auth
    $routes->get('/', 'Auth::index');
    $routes->get('logout', 'Auth::logout');
    $routes->get('auth/pilih_role', 'Auth::pilih_role');
    //admin
    $routes->get('/update/subproses', 'AdminController::subproses');
    $routes->get('/logbook', 'AdminController::logbook');
    $routes->get('/publish', 'AdminController::publish');
    $routes->get('/verifikasi', 'AdminController::verifikasi');
    $routes->get('verifikasi/(:num)', 'PdfNumberController::getRowsByNumberforAdmin/$1');
    $routes->get('logbook/(:num)', 'PdfNumberController::getlogbookAdmin/$1');
    $routes->get('/admin/resetMassproStatus/(:num)', 'AdminController::resetMassproAdmin/$1');
    //uploader
    $routes->get('/revisi', 'UploaderController::revisi');
    $routes->get('/pdfnumber', 'UploaderController::index');
    $routes->get('insert/pdf', 'UploaderController::insertPdf');
    //reader
    $routes->get('/listpdf', 'ReaderController::listpdf');
});

// Grup POST routes
$routes->group('', function ($routes) {
    $routes->post('/pdfnumber/generate', 'PdfNumberController::generateNumber');
    //auth
    $routes->post('/proses/login', 'Auth::proses_login');
    $routes->post('auth/proses_pilih_role', 'Auth::proses_pilih_role');
    //admin
    $routes->post('/update/sub_proses', 'AdminController::update_subproses');
    $routes->post('/admin/updateHasilVerifikasi/(:num)', 'AdminController::updateHasilVerifikasi/$1');
    $routes->post('/admin/updateHasilVerifikasi2/(:num)', 'AdminController::updateHasilVerifikasi2/$1');
    //uploader
    $routes->post('/pdfnumber/update', 'UploaderController::update');
});
