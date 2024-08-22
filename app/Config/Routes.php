<?php

use App\Controllers\UploaderController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('sub/proses', 'PdfNumberController::getsubProses');
$routes->get('type/sub', 'PdfNumberController::getTypeSub');
$routes->get('type/sub2', 'PdfNumberController::getTypeSub2');
$routes->post('pdfnumber/generate', 'PdfNumberController::generateNumber');
$routes->get('revisi/numbers', 'PdfNumberController::getRowsByNumber');
$routes->get('pdf/setStatusMasspro/(:num)', 'PdfNumberController::setStatusMasspro/$1');
$routes->get('pdf/resetMassproStatus/(:num)', 'PdfNumberController::resetMassproStatus/$1');
$routes->get('pdf/revise/(:num)', 'PdfNumberController::getRowsByNumber/$1');
$routes->post('pdf/revise/(:num)', 'PdfNumberController::revisePdfNumber/$1');

//auth
$routes->get('/', 'Auth::index');
$routes->post('proses/login', 'Auth::proses_login');
$routes->get('logout', 'Auth::logout');
$routes->get('auth/pilih_role', 'Auth::pilih_role');
$routes->post('auth/proses_pilih_role', 'Auth::proses_pilih_role');

//admin
$routes->get('update/subproses', 'AdminController::subproses');
$routes->get('total/masspro', 'AdminController::getTotalMasspro');
$routes->post('create/sub_proses', 'AdminController::create_subproses');
$routes->get('logbook', 'AdminController::logbook');
$routes->get('publish', 'AdminController::publish');
$routes->get('verifikasi', 'AdminController::verifikasi');
$routes->get('verifikasi/(:num)', 'PdfNumberController::getRowsByNumberforAdmin/$1');
$routes->get('logbook/(:num)', 'PdfNumberController::getlogbookAdmin/$1');
$routes->post('admin/updateHasilVerifikasi/(:num)', 'AdminController::updateHasilVerifikasi/$1');
$routes->post('admin/updateHasilVerifikasi2/(:num)', 'AdminController::updateHasilVerifikasi2/$1');
$routes->delete('admin/DeleteNumber/(:num)', 'AdminController::delete_number/$1');
$routes->get('admin/resetMassproStatus/(:num)', 'AdminController::resetMassproAdmin/$1');
//update admin
$routes->get('drawing/trial', 'AdminController::getTrialdrawing');
$routes->get('order/external', 'AdminController::order_drawing_external');
$routes->get('order/internal', 'AdminController::order_drawing_internal');
$routes->post('update/order', 'AdminController::terima_order');
$routes->post('update/sub_proses', 'AdminController::updateSubProses');
$routes->post('delete/sub_proses/(:num)', 'AdminController::deleteSubProses/$1');
$routes->get('update/typesubproses', 'AdminController::Typesubproses');
$routes->get('total/approve', 'AdminController::getTotalapprove');
$routes->post('update/type_sub_proses', 'AdminController::updateTypeSubProses');
$routes->post('delete/type_sub_proses/(:num)', 'AdminController::deleteTypeSubProses/$1');
$routes->post('create/type_sub_proses', 'AdminController::create_typesubproses');
$routes->get('jenis_project', 'AdminController::JenisProject');
$routes->post('create/jenisproject', 'AdminController::createProject');
$routes->post('delete/jenisproject/(:num)', 'AdminController::deletejenisProject/$1');
$routes->post('update/jenis_project', 'AdminController::updatejenisProject');



//uploader
$routes->get('revisi', 'UploaderController::revisi');
$routes->get('pdfnumber', 'UploaderController::index');
$routes->get('insert/pdf', 'UploaderController::insertPdf');
$routes->post('pdfnumber/update', 'UploaderController::update');
$routes->post('pdf/update/(:num)', 'UploaderController::updatePdf/$1');

//update uploader
$routes->get('status/order', 'UploaderController::status_order_drawing');
$routes->get('status/generate', 'UploaderController::status_has_generate');
$routes->get('status/not/generate', 'UploaderController::status_not_generate');
$routes->get('status/open', 'UploaderController::status_order_open');
$routes->get('status/over', 'UploaderController::status_order_over');
$routes->get('status/proses', 'UploaderController::status_order_proses');
$routes->get('status/done', 'UploaderController::status_order_done');
$routes->post('submit/order', 'UploaderController::submit_order');
$routes->post('update/status', 'UploaderController::updateStatus');
$routes->post('update/status/number', 'UploaderController::updateStatusnumber');
$routes->get('order/drawing', 'UploaderController::order_drawing');
$routes->post('trial/update', 'UploaderController::inputPdfTrial');
$routes->post('trial/pdf/(:num)', 'UploaderController::gantiPdfTrial/$1');
$routes->post('submit/jenis_project', 'UploaderController::submitProject');
$routes->post('submit/jenis_workshop', 'UploaderController::submitWorkshop');
$routes->post('submit/jenis_progress', 'UploaderController::submitProgress');


//reader
// $routes->get('/dashboard-reader', 'ReaderController::index');
$routes->get('listpdf', 'ReaderController::listpdf');


//kasi
$routes->get('dashboard', 'KasiController::index');
$routes->get('logbooks', 'KasiController::all_logbook');
$routes->get('logbooks/(:num)', 'KasiController::logbook/$1');
$routes->get('publish/drawing', 'KasiController::publish');
$routes->get('trial/drawing', 'KasiController::trial');
$routes->get('status/all/open', 'KasiController::status_order_open');
$routes->get('status/all/proses', 'KasiController::status_order_proses');
$routes->get('status/all/done', 'KasiController::status_order_done');
$routes->get('status/all/over', 'KasiController::status_order_over');
$routes->get('data/order', 'KasiController::data_order');
$routes->get('data/drawing', 'KasiController::data_drawing');
$routes->get('data/drawing/drafters', 'KasiController::data_drawing_drafters');
$routes->get('data/drafter/(:num)', 'KasiController::data_drafter/$1');


//pengajuan revisi
$routes->post('pengajuan/revisi/(:num)', 'PdfNumberController::pengajuan_revisi/$1');