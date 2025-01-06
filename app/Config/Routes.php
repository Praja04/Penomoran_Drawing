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
$routes->post('submit/jenis_no_pro', 'UploaderController::submitNoPR');


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

//Project Controller
$routes->get('listproject', 'ProjectController::list_project');
$routes->post('create/saveProject', 'ProjectController::saveProject');
$routes->get('project/detail/(:num)', 'ProjectController::detail_project/$1');
$routes->post('submit/detail/project', 'ProjectController::submit_detail');
$routes->post('submit/dokumen/project', 'ProjectController::submit_dokumen');
$routes->post('delete/drafter', 'ProjectController::delete_drafter');
$routes->post('delete/dokumen', 'ProjectController::delete_dokumen');
$routes->post('update/detail', 'ProjectController::updatedetail_Project');
$routes->post('delete/all/project', 'ProjectController::delete_Project');
$routes->post('add/drafter', 'ProjectController::AddDrafter');


//pengajuan revisi
$routes->post('pengajuan/revisi/(:num)', 'PdfNumberController::pengajuan_revisi/$1');


//project parameter proses
$routes->get('produksi2', 'Mode::menu_produksi2');
$routes->get('produksi1', 'Mode::menu_produksi1');
$routes->get('charging', 'Mode::menu_charging');
$routes->get('menu/utama', 'Mode::menu_utama');
$routes->post('insert/data/alt2/line5', 'TestInsert::insert_data');

//line6
$routes->group("apbline6",  function ($routes) {
    //APB1
    $routes->get('dashboard/1', 'DashboardApbLine6::dashboard_apb1');
    $routes->get('get/temp/left1', 'DashboardApbLine6::getData_APB1_tempLeftActual');
    $routes->get('get/temp/right1', 'DashboardApbLine6::getData_APB1_tempRightActual');
    $routes->get('distinct/left1', 'DashboardApbLine6::getDistinct_APB1_tempLeftActual');
    $routes->get('distinct/right1', 'DashboardApbLine6::getDistinct_APB1_tempRightActual');
    $routes->get('get/temp/left1/date/(:any)', 'DashboardApbLine6::getDataByDate_APB1_tempLeft/$1');
    $routes->get('get/temp/right1/date/(:any)', 'DashboardApbLine6::getDataByDate_APB1_tempRight/$1');
    //get layout mode
    $routes->get('get/parameter/1', 'DashboardApbLine6::getDataParameterAPB1');
    $routes->get('get/total/data/1', 'DashboardApbLine6::getDataTodayAPB1');
    //bydate
    $routes->get('distinct/left1/date/(:any)', 'DashboardApbLine6::getDistinct_APB1_tempLeftActualbyDate/$1');
    $routes->get('distinct/right1/date/(:any)', 'DashboardApbLine6::getDistinct_APB1_tempRightActualbyDate/$1');
    //byweek
    $routes->post('data/temp/left1/week', 'DashboardApbLine6::getDataByWeek_APB1_tempLeft');
    $routes->post('data/temp/right1/week', 'DashboardApbLine6::getDataByWeek_APB1_tempRight');
    //APB2
    $routes->get('dashboard/2', 'DashboardApbLine6::dashboard_apb2');
    $routes->get('get/temp/left2', 'DashboardApbLine6::getData_APB2_tempLeftActual');
    $routes->get('get/temp/right2', 'DashboardApbLine6::getData_APB2_tempRightActual');
    $routes->get('distinct/left2', 'DashboardApbLine6::getDistinct_APB2_tempLeftActual');
    $routes->get('distinct/right2', 'DashboardApbLine6::getDistinct_APB2_tempRightActual');
    $routes->get('get/temp/left2/date/(:any)', 'DashboardApbLine6::getDataByDate_APB2_tempLeft/$1');
    $routes->get('get/temp/right2/date/(:any)', 'DashboardApbLine6::getDataByDate_APB2_tempRight/$1');
    //layout mode data
    $routes->get('get/parameter/2', 'DashboardApbLine6::getDataParameterAPB2');
    $routes->get('get/total/data/2', 'DashboardApbLine6::getDataTodayAPB2');
    //bydate
    $routes->get('distinct/left2/date/(:any)', 'DashboardApbLine6::getDistinct_APB2_tempLeftActualbyDate/$1');
    $routes->get('distinct/right2/date/(:any)', 'DashboardApbLine6::getDistinct_APB2_tempRightActualbyDate/$1');
    //byweek
    $routes->post('data/temp/left2/week', 'DashboardApbLine6::getDataByWeek_APB2_tempLeft');
    $routes->post('data/temp/right2/week', 'DashboardApbLine6::getDataByWeek_APB2_tempRight');
});

$routes->group("hsmline6",  function ($routes) {
    //HSM1
    $routes->get('dashboard/1', 'DashboardHsmLine6::dashboard_hsm1');
    $routes->get('get/temp/left1', 'DashboardHsmLine6::getData_HSM1_tempLeft');
    $routes->get('get/temp/right1', 'DashboardHsmLine6::getData_HSM1_tempRight');
    $routes->get('distinct/left1', 'DashboardHsmLine6::getDistinct_HSM1_tempLeft');

    $routes->get('distinct/left1/date/(:any)', 'DashboardHsmLine6::getDistinct_HSM1_tempLeftbyDate/$1');
    $routes->get('distinct/right1/date/(:any)', 'DashboardHsmLine6::getDistinct_HSM1_tempRightbyDate/$1');

    $routes->get('distinct/right1', 'DashboardHsmLine6::getDistinct_HSM1_tempRight');
    $routes->get('get/temp/left1/date/(:any)', 'DashboardHsmLine6::getDataByDate_HSM1_tempLeft/$1');
    $routes->get('get/temp/right1/date/(:any)', 'DashboardHsmLine6::getDataByDate_HSM1_tempRight/$1');
    $routes->get('get/type/battery1/first', 'DashboardHsmLine6::getDataTypeBatteryFirstHSM1');
    $routes->get('get/total/data1', 'DashboardHsmLine6::getTotalDataHSM1');
    $routes->get('get/type/battery', 'DashboardHsmLine6::getDataTypeBattery');
    $routes->get('get/type/1', 'DashboardHsmLine6::getlastDandoriTypeHSM1');
    $routes->get('get/data/ok/1', 'DashboardHsmLine6::getTotalDataOKHSM1');
    $routes->get('get/data/parameter/1', 'DashboardHsmLine6::getParameterData1');
    //data melting
    $routes->get('get/data/lid_holder_melting/1', 'DashboardHsmLine6::getData_HSM1_LidHolderMelting');
    $routes->get('get/data/box_lifter_melting/1', 'DashboardHsmLine6::getData_HSM1_BoxLifterMelting');
    $routes->get('get/data/mirror_pos/1', 'DashboardHsmLine6::getData_HSM1_MirrorPos');
    //data melting by date
    $routes->get('get/data/lid_holder_melting1/date/(:any)', 'DashboardHsmLine6::getData_HSM1_LidHolderMeltingByDate/$1');
    $routes->get('get/data/box_lifter_melting1/date/(:any)', 'DashboardHsmLine6::getData_HSM1_BoxLifterMeltingByDate/$1');
    $routes->get('get/data/mirror_pos1/date/(:any)', 'DashboardHsmLine6::getData_HSM1_MirrorPosByDate/$1');
    //getdatatempbyweek
    $routes->post('data/temp/right1/week', 'DashboardHsmLine6::getDataByWeek_HSM1_tempRight');
    $routes->post('data/temp/left1/week', 'DashboardHsmLine6::getDataByWeek_HSM1_tempLeft');
    $routes->post('data/lid_holder1/pos/week', 'DashboardHsmLine6::getData_HSM1_LidHolderMeltingByWeek');
    $routes->post('data/box_lifter1/pos/week', 'DashboardHsmLine6::getData_HSM1_BoxLifterMeltingByWeek');
    $routes->post('data/mirror1/pos/week', 'DashboardHsmLine6::getData_HSM1_MirrorPosByWeek');

    //HSM2
    $routes->get('dashboard/2', 'DashboardHsmLine6::dashboard_hsm2');
    $routes->get('get/temp/left2', 'DashboardHsmLine6::getData_HSM2_tempLeft');
    $routes->get('get/temp/right2', 'DashboardHsmLine6::getData_HSM2_tempRight');
    $routes->get('distinct/left2', 'DashboardHsmLine6::getDistinct_HSM2_tempLeft');
    $routes->get('distinct/right2', 'DashboardHsmLine6::getDistinct_HSM2_tempRight');
    $routes->get('distinct/left2/date/(:any)', 'DashboardHsmLine6::getDistinct_HSM2_tempLeftbyDate/$1');
    $routes->get('distinct/right2/date/(:any)', 'DashboardHsmLine6::getDistinct_HSM2_tempRightbyDate/$1');
    $routes->get('get/temp/left2/date/(:any)', 'DashboardHsmLine6::getDataByDate_HSM2_tempLeft/$1');
    $routes->get('get/temp/right2/date/(:any)', 'DashboardHsmLine6::getDataByDate_HSM2_tempRight/$1');
    $routes->get('get/total/data2', 'DashboardHsmLine6::getTotalDataHSM2');

    $routes->get('get/type/battery/2', 'DashboardHsmLine6::getDataTypeBattery');
    $routes->get('get/type/2', 'DashboardHsmLine6::getlastDandoriTypeHSM2');
    $routes->get('get/data/ok/2', 'DashboardHsmLine6::getTotalDataOKHSM2');
    $routes->get('get/data/parameter/2', 'DashboardHsmLine6::getParameterData2');
    //data melting
    $routes->get('get/data/lid_holder_melting/2', 'DashboardHsmLine6::getData_HSM2_LidHolderMelting');
    $routes->get('get/data/box_lifter_melting/2', 'DashboardHsmLine6::getData_HSM2_BoxLifterMelting');
    $routes->get('get/data/mirror_pos/2', 'DashboardHsmLine6::getData_HSM2_MirrorPos');
    //data melting by date
    $routes->get('get/data/lid_holder_melting2/date/(:any)', 'DashboardHsmLine6::getData_HSM2_LidHolderMeltingByDate/$1');
    $routes->get('get/data/box_lifter_melting2/date/(:any)', 'DashboardHsmLine6::getData_HSM2_BoxLifterMeltingByDate/$1');
    $routes->get('get/data/mirror_pos2/date/(:any)', 'DashboardHsmLine6::getData_HSM2_MirrorPosByDate/$1');

    //getdatatempbyweek
    $routes->post('data/temp/right2/week', 'DashboardHsmLine6::getDataByWeek_HSM2_tempRight');
    $routes->post('data/temp/left2/week', 'DashboardHsmLine6::getDataByWeek_HSM2_tempLeft');
    $routes->post('data/lid_holder2/pos/week', 'DashboardHsmLine6::getData_HSM2_LidHolderMeltingByWeek');
    $routes->post('data/box_lifter2/pos/week', 'DashboardHsmLine6::getData_HSM2_BoxLifterMeltingByWeek');
    $routes->post('data/mirror2/pos/week', 'DashboardHsmLine6::getData_HSM2_MirrorPosByWeek');
});

$routes->group("altline6", function ($routes) {
    //ALT1
    $routes->get('dashboard/1', 'DashboardAltLine6::dashboard_alt1');
    $routes->get('get/all/cell1', 'DashboardAltLine6::getData_ALT1_cell1');
    $routes->get('get/all/cell3', 'DashboardAltLine6::getData_ALT1_cell3');
    $routes->get('get/all/cell5', 'DashboardAltLine6::getData_ALT1_cell5');
    $routes->get('get/distinct/cell1', 'DashboardAltLine6::getDistinct_ALT1_cell1');
    $routes->get('get/distinct/cell3', 'DashboardAltLine6::getDistinct_ALT1_cell3');
    $routes->get('get/distinct/cell5', 'DashboardAltLine6::getDistinct_ALT1_cell5');
    //filter data alt 1
    $routes->get('get/cell1/date/(:any)', 'DashboardAltLine6::getDataActualCell1ByDate/$1');
    $routes->get('get/cell3/date/(:any)', 'DashboardAltLine6::getDataActualCell3ByDate/$1');
    $routes->get('get/cell5/date/(:any)', 'DashboardAltLine6::getDataActualCell5ByDate/$1');
    //layout mode data
    $routes->get('get/parameter/1', 'DashboardAltLine6::getDataParameterALT1');
    $routes->get('get/total/data/1', 'DashboardAltLine6::getDataTodayALT1');
    $routes->get('get/total/ok/1', 'DashboardAltLine6::getDataOKTodayALT1');
    $routes->get('get/total/ng/1', 'DashboardAltLine6::getDataNGTodayALT1');
    //distinctalt1date
    $routes->get('get/distinct/cell1/date/(:any)', 'DashboardAltLine6::getDistinct_ALT1_cell1byDate/$1');
    $routes->get('get/distinct/cell3/date/(:any)', 'DashboardAltLine6::getDistinct_ALT1_cell3byDate/$1');
    $routes->get('get/distinct/cell5/date/(:any)', 'DashboardAltLine6::getDistinct_ALT1_cell5byDate/$1');
    //getdatangDetail
    $routes->get('get/ng/detail/1', 'DashboardAltLine6::getdataNGdetailToday_ALT1');
    $routes->get('get/ng/detail/1/(:any)', 'DashboardAltLine6::getdataNGdetailTodaybyDate_ALT1/$1');
    //week
    $routes->post('data/cell1/week', 'DashboardAltLine6::getDataActualCell1ByWeek');
    $routes->post('data/cell3/week', 'DashboardAltLine6::getDataActualCell3ByWeek');
    $routes->post('data/cell5/week', 'DashboardAltLine6::getDataActualCell5ByWeek');
    //result
    $routes->get('get/result/cell1', 'DashboardAltLine6::getDataResult_ALT1_cell1');
    $routes->get('get/result/cell3', 'DashboardAltLine6::getDataResult_ALT1_cell3');
    $routes->get('get/result/cell5', 'DashboardAltLine6::getDataResult_ALT1_cell5');
    $routes->get('get/result/cell1/date/(:any)', 'DashboardAltLine6::getDataResultCell1ByDate/$1');
    $routes->get('get/result/cell3/date/(:any)', 'DashboardAltLine6::getDataResultCell3ByDate/$1');
    $routes->get('get/result/cell5/date/(:any)', 'DashboardAltLine6::getDataResultCell5ByDate/$1');
    $routes->post('data/result/cell1/week', 'DashboardAltLine6::getDataResultCell1ByWeek');
    $routes->post('data/result/cell3/week', 'DashboardAltLine6::getDataResultCell3ByWeek');
    $routes->post('data/result/cell5/week', 'DashboardAltLine6::getDataResultCell5ByWeek');

    //ALT2
    $routes->get('dashboard/2', 'DashboardAltLine6::dashboard_alt2');
    $routes->get('get/all/cell2', 'DashboardAltLine6::getData_ALT2_cell2');
    $routes->get('get/all/cell4', 'DashboardAltLine6::getData_ALT2_cell4');
    $routes->get('get/all/cell6', 'DashboardAltLine6::getData_ALT2_cell6');
    $routes->get('get/distinct/cell2', 'DashboardAltLine6::getDistinct_ALT2_cell2');
    $routes->get('get/distinct/cell4', 'DashboardAltLine6::getDistinct_ALT2_cell4');
    $routes->get('get/distinct/cell6', 'DashboardAltLine6::getDistinct_ALT2_cell6');
    //filter data alt 2
    $routes->get('get/cell2/date/(:any)', 'DashboardAltLine6::getDataActualCell2ByDate/$1');
    $routes->get('get/cell4/date/(:any)', 'DashboardAltLine6::getDataActualCell4ByDate/$1');
    $routes->get('get/cell6/date/(:any)', 'DashboardAltLine6::getDataActualCell6ByDate/$1');
    //layout mode data
    $routes->get('get/parameter/2', 'DashboardAltLine6::getDataParameterALT2');
    $routes->get('get/total/data/2', 'DashboardAltLine6::getDataTodayALT2');
    $routes->get('get/total/ok/2', 'DashboardAltLine6::getDataOKTodayALT2');
    $routes->get('get/total/ng/2', 'DashboardAltLine6::getDataNGTodayALT2');
    //distinct data with date
    $routes->get('get/distinct/cell2/date/(:any)', 'DashboardAltLine6::getDistinct_ALT2_cell2byDate/$1');
    $routes->get('get/distinct/cell4/date/(:any)', 'DashboardAltLine6::getDistinct_ALT2_cell4byDate/$1');
    $routes->get('get/distinct/cell6/date/(:any)', 'DashboardAltLine6::getDistinct_ALT2_cell6byDate/$1');
    //getdatangDetail
    $routes->get('get/ng/detail/2', 'DashboardAltLine6::getdataNGdetailToday_ALT2');
    $routes->get('get/ng/detail/2/(:any)', 'DashboardAltLine6::getdataNGdetailTodaybyDate_ALT2/$1');
    //week
    $routes->post('data/cell2/week', 'DashboardAltLine6::getDataActualCell2ByWeek');
    $routes->post('data/cell4/week', 'DashboardAltLine6::getDataActualCell4ByWeek');
    $routes->post('data/cell6/week', 'DashboardAltLine6::getDataActualCell6ByWeek');
    //result
    $routes->get('get/result/cell2', 'DashboardAltLine6::getDataResult_ALT2_cell2');
    $routes->get('get/result/cell4', 'DashboardAltLine6::getDataResult_ALT2_cell4');
    $routes->get('get/result/cell6', 'DashboardAltLine6::getDataResult_ALT2_cell6');
    $routes->get('get/result/cell2/date/(:any)', 'DashboardAltLine6::getDataResultCell2ByDate/$1');
    $routes->get('get/result/cell4/date/(:any)', 'DashboardAltLine6::getDataResultCell4ByDate/$1');
    $routes->get('get/result/cell6/date/(:any)', 'DashboardAltLine6::getDataResultCell6ByDate/$1');
    $routes->post('data/result/cell2/week', 'DashboardAltLine6::getDataResultCell2ByWeek');
    $routes->post('data/result/cell4/week', 'DashboardAltLine6::getDataResultCell4ByWeek');
    $routes->post('data/result/cell6/week', 'DashboardAltLine6::getDataResultCell6ByWeek');
});


//line 5
$routes->group("apbline5",  function ($routes) {
    //APB1
    $routes->get('dashboard/1', 'DashboardApbLine5::dashboard_apb1');
    $routes->get('get/temp/left1', 'DashboardApbLine5::getData_APB1_tempLeftActual');
    $routes->get('get/temp/right1', 'DashboardApbLine5::getData_APB1_tempRightActual');
    $routes->get('distinct/left1', 'DashboardApbLine5::getDistinct_APB1_tempLeftActual');
    $routes->get('distinct/right1', 'DashboardApbLine5::getDistinct_APB1_tempRightActual');
    $routes->get('get/temp/left1/date/(:any)', 'DashboardApbLine5::getDataByDate_APB1_tempLeft/$1');
    $routes->get('get/temp/right1/date/(:any)', 'DashboardApbLine5::getDataByDate_APB1_tempRight/$1');
    //layout mode
    //bydate
    $routes->get('distinct/left1/date/(:any)', 'DashboardApbLine5::getDistinct_APB1_tempLeftActualbyDate/$1');
    $routes->get('distinct/right1/date/(:any)', 'DashboardApbLine5::getDistinct_APB1_tempRightActualbyDate/$1');
    //get layout mode
    $routes->get('get/parameter/1', 'DashboardApbLine5::getDataParameterAPB1');
    $routes->get('get/total/data/1', 'DashboardApbLine5::getDataTodayAPB1');
    //byweek
    $routes->post('data/temp/left1/week', 'DashboardApbLine5::getDataByWeek_APB1_tempLeft');
    $routes->post('data/temp/right1/week', 'DashboardApbLine5::getDataByWeek_APB1_tempRight');
    //APB2
    $routes->get('dashboard/2', 'DashboardApbLine5::dashboard_apb2');
    $routes->get('get/temp/left2', 'DashboardApbLine5::getData_APB2_tempLeftActual');
    $routes->get('get/temp/right2', 'DashboardApbLine5::getData_APB2_tempRightActual');
    $routes->get('distinct/left2', 'DashboardApbLine5::getDistinct_APB2_tempLeftActual');
    $routes->get('distinct/right2', 'DashboardApbLine5::getDistinct_APB2_tempRightActual');
    $routes->get('get/temp/left2/date/(:any)', 'DashboardApbLine5::getDataByDate_APB2_tempLeft/$1');
    $routes->get('get/temp/right2/date/(:any)', 'DashboardApbLine5::getDataByDate_APB2_tempRight/$1');
    //layout mode data
    $routes->get('get/parameter/2', 'DashboardApbLine5::getDataParameterAPB2');
    $routes->get('get/total/data/2', 'DashboardApbLine5::getDataTodayAPB2');
    //bydate
    $routes->get('distinct/left2/date/(:any)', 'DashboardApbLine5::getDistinct_APB2_tempLeftActualbyDate/$1');
    $routes->get('distinct/right2/date/(:any)', 'DashboardApbLine5::getDistinct_APB2_tempRightActualbyDate/$1');
    //byweek
    $routes->post('data/temp/left2/week', 'DashboardApbLine5::getDataByWeek_APB2_tempLeft');
    $routes->post('data/temp/right2/week', 'DashboardApbLine5::getDataByWeek_APB2_tempRight');
});

$routes->group("hsmline5",  function ($routes) {
    //HSM1
    $routes->get('dashboard/1', 'DashboardHsmLine5::dashboard_hsm1');
    $routes->get('get/temp/left1', 'DashboardHsmLine5::getData_HSM1_tempLeft');
    $routes->get('get/temp/right1', 'DashboardHsmLine5::getData_HSM1_tempRight');
    $routes->get('distinct/left1', 'DashboardHsmLine5::getDistinct_HSM1_tempLeft');
    $routes->get('distinct/right1', 'DashboardHsmLine5::getDistinct_HSM1_tempRight');
    $routes->get('get/temp/left1/date/(:any)', 'DashboardHsmLine5::getDataByDate_HSM1_tempLeft/$1');
    $routes->get('get/temp/right1/date/(:any)', 'DashboardHsmLine5::getDataByDate_HSM1_tempRight/$1');
    $routes->get('get/type/battery1/first', 'DashboardHsmLine5::getDataTypeBatteryFirstHSM1');
    $routes->get('get/total/data1', 'DashboardHsmLine5::getTotalDataHSM1');
    $routes->get('get/type/battery', 'DashboardHsmLine5::getDataTypeBattery');
    $routes->get('get/type/1', 'DashboardHsmLine5::getlastDandoriTypeHSM1');
    $routes->get('get/data/ok/1', 'DashboardHsmLine5::getTotalDataOKHSM1');
    $routes->get('get/data/parameter/1', 'DashboardHsmLine5::getParameterData1');
    $routes->get('distinct/left1/date/(:any)', 'DashboardHsmLine5::getDistinct_HSM1_tempLeftbyDate/$1');
    $routes->get('distinct/right1/date/(:any)', 'DashboardHsmLine5::getDistinct_HSM1_tempRightbyDate/$1');
    //data melting
    $routes->get('get/data/lid_holder_melting/1', 'DashboardHsmLine5::getData_HSM1_LidHolderMelting');
    $routes->get('get/data/box_lifter_melting/1', 'DashboardHsmLine5::getData_HSM1_BoxLifterMelting');
    $routes->get('get/data/mirror_pos/1', 'DashboardHsmLine5::getData_HSM1_MirrorPos');
    //data melting by date
    $routes->get('get/data/lid_holder_melting1/date/(:any)', 'DashboardHsmLine5::getData_HSM1_LidHolderMeltingByDate/$1');
    $routes->get('get/data/box_lifter_melting1/date/(:any)', 'DashboardHsmLine5::getData_HSM1_BoxLifterMeltingByDate/$1');
    $routes->get('get/data/mirror_pos1/date/(:any)', 'DashboardHsmLine5::getData_HSM1_MirrorPosByDate/$1');
    //getdatatempbyweek
    $routes->post('data/temp/right1/week', 'DashboardHsmLine5::getDataByWeek_HSM1_tempRight');
    $routes->post('data/temp/left1/week', 'DashboardHsmLine5::getDataByWeek_HSM1_tempLeft');
    $routes->post('data/lid_holder1/pos/week', 'DashboardHsmLine5::getData_HSM1_LidHolderMeltingByWeek');
    $routes->post('data/box_lifter1/pos/week', 'DashboardHsmLine5::getData_HSM1_BoxLifterMeltingByWeek');
    $routes->post('data/mirror1/pos/week', 'DashboardHsmLine5::getData_HSM1_MirrorPosByWeek');




    //HSM2
    $routes->get('dashboard/2', 'DashboardHsmLine5::dashboard_hsm2');
    $routes->get('get/temp/left2', 'DashboardHsmLine5::getData_HSM2_tempLeft');
    $routes->get('get/temp/right2', 'DashboardHsmLine5::getData_HSM2_tempRight');
    $routes->get('distinct/left2', 'DashboardHsmLine5::getDistinct_HSM2_tempLeft');
    $routes->get('distinct/right2', 'DashboardHsmLine5::getDistinct_HSM2_tempRight');
    $routes->get('get/temp/left2/date/(:any)', 'DashboardHsmLine5::getDataByDate_HSM2_tempLeft/$1');
    $routes->get('get/temp/right2/date/(:any)', 'DashboardHsmLine5::getDataByDate_HSM2_tempRight/$1');
    $routes->get('get/total/data2', 'DashboardHsmLine5::getTotalDataHSM2');
    $routes->get('get/type/battery/2', 'DashboardHsmLine5::getDataTypeBattery');
    $routes->get('get/type/2', 'DashboardHsmLine5::getlastDandoriTypeHSM2');
    $routes->get('get/data/ok/2', 'DashboardHsmLine5::getTotalDataOKHSM2');
    $routes->get('get/data/parameter/2', 'DashboardHsmLine5::getParameterData2');
    //  distinct bydate temp left and right
    $routes->get('distinct/left2/date/(:any)', 'DashboardHsmLine5::getDistinct_HSM2_tempLeftbyDate/$1');
    $routes->get('distinct/right2/date/(:any)', 'DashboardHsmLine5::getDistinct_HSM2_tempRightbyDate/$1');
    //data melting
    $routes->get('get/data/lid_holder_melting/2', 'DashboardHsmLine5::getData_HSM2_LidHolderMelting');
    $routes->get('get/data/box_lifter_melting/2', 'DashboardHsmLine5::getData_HSM2_BoxLifterMelting');
    $routes->get('get/data/mirror_pos/2', 'DashboardHsmLine5::getData_HSM2_MirrorPos');
    //data melting by date
    $routes->get('get/data/lid_holder_melting2/date/(:any)', 'DashboardHsmLine5::getData_HSM2_LidHolderMeltingByDate/$1');
    $routes->get('get/data/box_lifter_melting2/date/(:any)', 'DashboardHsmLine5::getData_HSM2_BoxLifterMeltingByDate/$1');
    $routes->get('get/data/mirror_pos2/date/(:any)', 'DashboardHsmLine5::getData_HSM2_MirrorPosByDate/$1');
    //getdatatempbyweek
    $routes->post('data/temp/right2/week', 'DashboardHsmLine5::getDataByWeek_HSM2_tempRight');
    $routes->post('data/temp/left2/week', 'DashboardHsmLine5::getDataByWeek_HSM2_tempLeft');
    $routes->post('data/lid_holder2/pos/week', 'DashboardHsmLine5::getData_HSM2_LidHolderMeltingByWeek');
    $routes->post('data/box_lifter2/pos/week', 'DashboardHsmLine5::getData_HSM2_BoxLifterMeltingByWeek');
    $routes->post('data/mirror2/pos/week', 'DashboardHsmLine5::getData_HSM2_MirrorPosByWeek');
});

$routes->group("altline5", function ($routes) {
    //ALT1
    $routes->get('dashboard/1', 'DashboardAltLine5::dashboard_alt1');
    $routes->get('get/all/cell1', 'DashboardAltLine5::getData_ALT1_cell1');
    $routes->get('get/all/cell3', 'DashboardAltLine5::getData_ALT1_cell3');
    $routes->get('get/all/cell5', 'DashboardAltLine5::getData_ALT1_cell5');
    $routes->get('get/distinct/cell1', 'DashboardAltLine5::getDistinct_ALT1_cell1');
    $routes->get('get/distinct/cell3', 'DashboardAltLine5::getDistinct_ALT1_cell3');
    $routes->get('get/distinct/cell5', 'DashboardAltLine5::getDistinct_ALT1_cell5');
    //distinct date
    $routes->get('get/distinct/cell1/date/(:any)', 'DashboardAltLine5::getDistinct_ALT1_cell1byDate/$1');
    $routes->get('get/distinct/cell3/date/(:any)', 'DashboardAltLine5::getDistinct_ALT1_cell3byDate/$1');
    $routes->get('get/distinct/cell5/date/(:any)', 'DashboardAltLine5::getDistinct_ALT1_cell5byDate/$1');
    //filter data alt 1
    $routes->get('get/cell1/date/(:any)', 'DashboardAltLine5::getDataActualCell1ByDate/$1');
    $routes->get('get/cell3/date/(:any)', 'DashboardAltLine5::getDataActualCell3ByDate/$1');
    $routes->get('get/cell5/date/(:any)', 'DashboardAltLine5::getDataActualCell5ByDate/$1');
    //layout mode data
    $routes->get('get/parameter/1', 'DashboardAltLine5::getDataParameterALT1');
    $routes->get('get/total/data/1', 'DashboardAltLine5::getDataTodayALT1');
    $routes->get('get/total/ok/1', 'DashboardAltLine5::getDataOKTodayALT1');
    $routes->get('get/total/ng/1', 'DashboardAltLine5::getDataNGTodayALT1');
    //getdatangDetail
    $routes->get('get/ng/detail/1', 'DashboardAltLine5::getdataNGdetailToday_ALT1');
    $routes->get('get/ng/detail/1/(:any)', 'DashboardAltLine5::getdataNGdetailTodaybyDate_ALT1/$1');

    //week
    $routes->post('data/cell1/week', 'DashboardAltLine5::getDataActualCell1ByWeek');
    $routes->post('data/cell3/week', 'DashboardAltLine5::getDataActualCell3ByWeek');
    $routes->post('data/cell5/week', 'DashboardAltLine5::getDataActualCell5ByWeek');
    //result
    $routes->get('get/result/cell1', 'DashboardAltLine5::getDataResult_ALT1_cell1');
    $routes->get('get/result/cell3', 'DashboardAltLine5::getDataResult_ALT1_cell3');
    $routes->get('get/result/cell5', 'DashboardAltLine5::getDataResult_ALT1_cell5');
    $routes->get('get/result/cell1/date/(:any)', 'DashboardAltLine5::getDataResultCell1ByDate/$1');
    $routes->get('get/result/cell3/date/(:any)', 'DashboardAltLine5::getDataResultCell3ByDate/$1');
    $routes->get('get/result/cell5/date/(:any)', 'DashboardAltLine5::getDataResultCell5ByDate/$1');
    $routes->post('data/result/cell1/week', 'DashboardAltLine5::getDataResultCell1ByWeek');
    $routes->post('data/result/cell3/week', 'DashboardAltLine5::getDataResultCell3ByWeek');
    $routes->post('data/result/cell5/week', 'DashboardAltLine5::getDataResultCell5ByWeek');



    //ALT2
    $routes->get('dashboard/2', 'DashboardAltLine5::dashboard_alt2');
    $routes->get('get/all/cell2', 'DashboardAltLine5::getData_ALT2_cell2');
    $routes->get('get/all/cell4', 'DashboardAltLine5::getData_ALT2_cell4');
    $routes->get('get/all/cell6', 'DashboardAltLine5::getData_ALT2_cell6');
    $routes->get('get/distinct/cell2', 'DashboardAltLine5::getDistinct_ALT2_cell2');
    $routes->get('get/distinct/cell4', 'DashboardAltLine5::getDistinct_ALT2_cell4');
    $routes->get('get/distinct/cell6', 'DashboardAltLine5::getDistinct_ALT2_cell6');
    //filter data alt 2
    $routes->get('get/cell2/date/(:any)', 'DashboardAltLine5::getDataActualCell2ByDate/$1');
    $routes->get('get/cell4/date/(:any)', 'DashboardAltLine5::getDataActualCell4ByDate/$1');
    $routes->get('get/cell6/date/(:any)', 'DashboardAltLine5::getDataActualCell6ByDate/$1');
    //layout mode data
    $routes->get('get/parameter/2', 'DashboardAltLine5::getDataParameterALT2');
    $routes->get('get/total/data/2', 'DashboardAltLine5::getDataTodayALT2');
    $routes->get('get/total/ok/2', 'DashboardAltLine5::getDataOKTodayALT2');
    $routes->get('get/total/ng/2', 'DashboardAltLine5::getDataNGTodayALT2');
    //distinct data with date
    $routes->get('get/distinct/cell2/date/(:any)', 'DashboardAltLine5::getDistinct_ALT2_cell2byDate/$1');
    $routes->get('get/distinct/cell4/date/(:any)', 'DashboardAltLine5::getDistinct_ALT2_cell4byDate/$1');
    $routes->get('get/distinct/cell6/date/(:any)', 'DashboardAltLine5::getDistinct_ALT2_cell6byDate/$1');
    //getdatangDetail
    $routes->get('get/ng/detail/2', 'DashboardAltLine5::getdataNGdetailToday_ALT2');
    $routes->get('get/ng/detail/2/(:any)', 'DashboardAltLine5::getdataNGdetailTodaybyDate_ALT2/$1');
    //week
    $routes->post('data/cell2/week', 'DashboardAltLine5::getDataActualCell2ByWeek');
    $routes->post('data/cell4/week', 'DashboardAltLine5::getDataActualCell4ByWeek');
    $routes->post('data/cell6/week', 'DashboardAltLine5::getDataActualCell6ByWeek');
    //result
    $routes->get('get/result/cell2', 'DashboardAltLine5::getDataResult_ALT2_cell2');
    $routes->get('get/result/cell4', 'DashboardAltLine5::getDataResult_ALT2_cell4');
    $routes->get('get/result/cell6', 'DashboardAltLine5::getDataResult_ALT2_cell6');
    $routes->get('get/result/cell2/date/(:any)', 'DashboardAltLine5::getDataResultCell2ByDate/$1');
    $routes->get('get/result/cell4/date/(:any)', 'DashboardAltLine5::getDataResultCell4ByDate/$1');
    $routes->get('get/result/cell6/date/(:any)', 'DashboardAltLine5::getDataResultCell6ByDate/$1');
    $routes->post('data/result/cell2/week', 'DashboardAltLine5::getDataResultCell2ByWeek');
    $routes->post('data/result/cell4/week', 'DashboardAltLine5::getDataResultCell4ByWeek');
    $routes->post('data/result/cell6/week', 'DashboardAltLine5::getDataResultCell6ByWeek');
});

$routes->group("mode/line6", function ($routes) {
    $routes->get('hsm1', 'Mode::hsm1_line6');
    $routes->get('hsm2', 'Mode::hsm2_line6');
    $routes->get('alt1', 'Mode::alt1_line6');
    $routes->get('alt2', 'Mode::alt2_line6');
    $routes->get('apb1', 'Mode::apb1_line6');
    $routes->get('apb2', 'Mode::apb2_line6');
});
$routes->group("mode/line5", function ($routes) {
    $routes->get('hsm1', 'Mode::hsm1_line5');
    $routes->get('hsm2', 'Mode::hsm2_line5');
    $routes->get('alt1', 'Mode::alt1_line5');
    $routes->get('alt2', 'Mode::alt2_line5');
    $routes->get('apb1', 'Mode::apb1_line5');
    $routes->get('apb2', 'Mode::apb2_line5');
});
$routes->group("api/line5", function ($routes) {
    $routes->post('hsm1', 'APILine5Controller::insert_hsm1');
    $routes->post('hsm2', 'APILine5Controller::insert_hsm2');
    $routes->post('alt1', 'APILine5Controller::insert_alt1');
    $routes->post('alt2', 'APILine5Controller::insert_alt2');
    $routes->post('apb1', 'APILine5Controller::insert_apb1');
    $routes->post('apb2', 'APILine5Controller::insert_apb2');
});
$routes->group("api/line6", function ($routes) {
    $routes->post('hsm1', 'APILine6Controller::insert_hsm1');
    $routes->post('hsm2', 'APILine6Controller::insert_hsm2');
    $routes->post('alt1', 'APILine6Controller::insert_alt1');
    $routes->post('alt2', 'APILine6Controller::insert_alt2');
    $routes->post('apb1', 'APILine6Controller::insert_apb1');
    $routes->post('apb2', 'APILine6Controller::insert_apb2');
});

//Produksi 1

//Ballmil/4/
$routes->group("ballmill", function ($routes) {
    $routes->get('dashboard/4', 'DashboardBallmill::dashboard_ballmill4');
    $routes->get('dashboard/3', 'DashboardBallmill::dashboard_ballmill3');
});
