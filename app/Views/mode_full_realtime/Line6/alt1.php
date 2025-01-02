<?= $this->extend('template_mode/layout_mode'); ?>

<?= $this->section('content'); ?>
<style>
    .box-body-notif {
        max-height: 200px;
        /* Set the maximum height */
        overflow-y: auto;
        /* Enable vertical scrolling */
    }

    .status-container {
        display: flex;
        flex-wrap: wrap;
        /* Membungkus elemen ke baris berikutnya */
    }

    .small-card-body {
        padding: 5px;
        /* Mengurangi padding pada card-body */
    }

    .status-square {
        display: inline-block;
        width: 15px;
        /* Lebar kotak */
        height: 15px;
        /* Tinggi kotak */
        margin-right: 5px;
        /* Jarak antara kotak dan teks */
        margin-bottom: 5px;
        /* Jarak antara kotak */
    }

    .status-ok {
        background-color: #90EE90;
        /* Warna hijau untuk OK */
    }

    .status-warning {
        background-color: yellow;
        /* Warna kuning untuk tidak sesuai */
    }

    .status-ng {
        background-color: #FF6347;
        /* Warna merah untuk NG */
    }

    .status-text {
        display: flex;
        align-items: center;
        /* Vertikal center */
        margin-right: 10px;
        /* Jarak antar teks */
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('content'); ?>
<div class="content-wrapper" style="margin-left:0px;margin-top:10px; background-color:#03346E;">
    <div class="container-full">
        <div class="row align-items-start">

            <div class="col-xl-12 col-12" style="background-color:#03346E;">
                <div class="row d-flex flex-row" style="margin: 10px;">
                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tipe Battery" disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Dandori Time" disabled>
                        </div>
                        <div class="form-group" style="background-color:#fff;">
                            <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">Date Now</span>
                        </div>

                    </div>
                    <div class="col-md-1-5">
                        <div class="form-group">
                            <input id="type1" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <input id="dandori1" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" id="tanggal_now" class="form-control" disabled>
                            <!-- <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center" id="tanggal_now"></span> -->
                        </div>

                        <h5 style="color:#fff;" id="battery_now"></h5>
                    </div>
                    <div class="col-md-1-5">
                        <div class="form-group">
                            <input id="type2" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <input id="dandori2" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" id="jam_now" class="form-control" disabled>
                            <!-- <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center" id="jam_now"></span> -->
                        </div>

                    </div>
                    <div class="col-md-1-5">
                        <div class="form-group">
                            <input id="type3" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <input id="dandori3" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <a data-bs-toggle="modal" data-bs-target="#modal-center5" title="Menu Line 5" class="waves-effect waves-light btn btn-success btn-flat mb-5 btn-sm">
                                <span class="icon-Menu"><span class="path1"></span><span class="path2"></span></span>Line5
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#modal-center6" title="Menu Line 6" class="waves-effect waves-light btn btn-primary btn-flat mb-5 btn-sm">
                                <span class="icon-Menu"><span class="path1"></span><span class="path2"></span></span>Line6
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-body" style="background-color:#F2EFE5; ">
                            <div class="form-group status-container">
                                <div class="status-text">
                                    <span class="status-square status-ok"></span>
                                    <p>Ok sesuai parameter</p>
                                </div>
                                <div class="status-text">
                                    <span class="status-square status-warning"></span>
                                    <p>Ok tidak sesuai parameter</p>
                                </div>
                                <div class="status-text">
                                    <span class="status-square status-ng"></span>
                                    <p>NG</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="card text-center"> <!-- Menggunakan card untuk kotak -->
                                    <div class="card-body small-card-body">
                                        <h5 class="card-title">Output Battery ALT Line 6</h5> <!-- Teks di tengah -->
                                        <h4 id="total_alt"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3-5">
                        <div class="box-body" style="background-color:#F2EFE5;">
                            <h5 class="text-center">ALT 1 Line 6 Detail</h5>
                            <div class="row d-flex flex-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Total (Pcs)" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input id="total_pcs" type="text" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <p id="shift"></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="OK" disabled style="background-color: #90EE90;">
                                    </div>
                                    <div class="form-group">
                                        <input id="data_ok_parameter" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" style="background-color: yellow;" placeholder="OK" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" style="background-color: #FF6347;" placeholder="NG" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input id="data_ng_parameter" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="row align-items-start">
        <div class="col-xl-3 col-12" style="background-color:#03346E;">
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class="box" style="background-color:#fff;">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black; ">
                                                <h4>Parameter</h4>
                                            </label>
                                            <input type="text" value="Fill Pressure" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Test Pressure" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Fill Failure Time" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Stabilization Time" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Test Time" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Leak Pressure" class="form-control mb-3" disabled style="width:120px;">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black;">
                                                <h4>Standar</h4>
                                            </label>
                                            <input type="text" id="standar_fill_pressure" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_test_pressure" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_fill_failure_time" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_stabilization_time" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_test_time" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_leak_pressure" class="form-control mb-3" disabled style="width:100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black;">
                                                <h4>Actual</h4>
                                            </label>
                                            <input type="text" id="actual_fill_pressure" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_test_pressure" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_fill_failure_time" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_stabilization_time" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_test_time" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_leak_pressure" class="form-control mb-3" disabled style="width:80px;">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xl-9 col-12" style="background-color:#03346E; border-radius:10px;">
            <section class="content">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-xl-4 col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div id="result_cell1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div id="result_cell3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div id="result_cell5"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-310 d-block text-center"> Statistical Process Control</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPP/PP</span>
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center" id="cp_cell1"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPK/PPK</span>
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center" id="cpk_cell1"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-310 d-block text-center"> Statistical Process Control</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPP/PP</span>
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center" id="cp_cell3"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPK/PPK</span>
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center" id="cpk_cell3"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-310 d-block text-center"> Statistical Process Control</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPP/PP</span>
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center" id="cp_cell5"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPK/PPK</span>
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center" id="cpk_cell5"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="row">
                            <div class="col-xl-12 col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <h3 class="text-center">Notification</h3>
                                            <div class="box">
                                                <div class="box-header">
                                                    <h4 class="box-title">Abnormality</h4>
                                                </div>
                                                <div class="box-body-notif">
                                                    <div class="act-div">

                                                    </div>
                                                </div>
                                                <div class="box-footer text-center p-0">
                                                    <a href="#" class="btn d-grid btn-primary-light view-all">View all</a>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="text-center">Pilih Opsi</h3>
                                            <div class="col-xl-6 col-12" style="margin:5px;">
                                                <label for="data-source">Filter Data:</label>
                                                <select id="data-source" class="form-select">
                                                    <option value="realtime">Real-time</option>
                                                    <option value="date">By Date</option>
                                                    <option value="week">By Week</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-6 col-12" style="margin:5px;">
                                                <label id="tanggal" style="display: none;">Date :</label>
                                                <input type="date" id="date-input" class="form-control" style="display: none;" />
                                            </div>
                                            <div class="col-xl-6 col-12" style="margin:5px;">
                                                <label id="tanggal-week" style="display: none;">Date Awal :</label>
                                                <input type="date" id="date-input-week" class="form-control" style="display: none;" />
                                            </div>
                                            <div class="col-xl-6 col-12" style="margin:5px;">
                                                <label id="tanggal-week2" style="display: none;">Date Akhir :</label>
                                                <input type="date" id="date-input-week2" class="form-control" style="display: none;" />
                                            </div>
                                            <div class="col-xl-6 col-12" style="margin:5px;">
                                                <button class="btn btn-primary" id="fetch-data" style="display: none;">Fetch Data</button>
                                            </div>
                                            <div class="col-xl-6 col-12" style="margin:5px;">
                                                <button class="btn btn-primary" id="fetch-data-week" style="display: none;">Fetch Data</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="background-color:#03346E;">
                        <div class="col-xl-12 col-12">
                            <div class="box">
                                <div class=" box-header with-border">

                                </div>
                                <div class="box-body">

                                    <div id="container" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <div id="container2" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <div id="container3" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <div id="container4" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <div id="container5" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <div id="container6" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>


<div class="modal center-modal fade" id="modal-center5" tabindex="-1">
    <div class="modal-dialog col-12 col-lg-12 ">
        <div class="modal-content" style="background-color:transparant;border-radius:10px;">
            <div class="modal-header">
                <h5 class="modal-title">Menu Line 5</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line5/hsm1') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>HSM 1</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line5/apb1') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>APB 1</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line5/alt1') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>ALT 1</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line5/hsm2') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>HSM 2</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line5/apb2') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>APB 2</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line5/alt2') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>ALT 2</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal center-modal fade" id="modal-center6" tabindex="-1">
    <div class="modal-dialog col-12 col-lg-12 ">
        <div class="modal-content" style="background-color:transparant;border-radius:10px;">
            <div class="modal-header">
                <h5 class="modal-title">Menu Line 6</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line6/hsm1') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>HSM 1</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line6/apb1') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>APB 1</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line6/alt1') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>ALT 1</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line6/hsm2') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>HSM 2</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line6/apb2') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>APB 2</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('mode/line6/alt2') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>ALT 2</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalLabel">Abnormality Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="box-body-notif-modal">
                    <!-- Data will be populated here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script'); ?>

<script>
    // Variabel untuk ketiga chart
    let chart, chart3, chart5, chartresult1, chartresult3, chartresult5;
    const updateInterval = 100000;

    // Fungsi untuk cell1
    const fetchDataCell1 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/all/cell1') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL1));

                updateOrCreateChart('container', chart, 'Cell1', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL1', (newChart) => {
                    chart = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk cell3
    const fetchDataCell3 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/all/cell3') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL3));

                updateOrCreateChart('container2', chart3, 'Cell3', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL3', (newChart) => {
                    chart3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk cell5
    const fetchDataCell5 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/all/cell5') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL5));

                updateOrCreateChart('container3', chart5, 'Cell5', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL5', (newChart) => {
                    chart5 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell5:', textStatus, errorThrown);
            }
        });
    };


    //result cell
    // Fungsi untuk cell1
    const fetchDataResultCell1 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/result/cell1') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL1));

                updateOrCreateChart('container4', chartresult1, 'Result Cell1', labels, valuesSet, 'L6_ALT1_RESULT_CELL1', (newChart) => {
                    chartresult1 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });
    };
    // Fungsi untuk cell13
    const fetchDataResultCell3 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/result/cell3') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL3));

                updateOrCreateChart('container5', chartresult3, 'Result Cell3', labels, valuesSet, 'L6_ALT1_RESULT_CELL3', (newChart) => {
                    chartresult3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });
    };
    // Fungsi untuk cell15
    const fetchDataResultCell5 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/result/cell5') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL5));

                updateOrCreateChart('container6', chartresult5, 'Result Cell5', labels, valuesSet, 'L6_ALT1_RESULT_CELL5', (newChart) => {
                    chartresult5 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell5:', textStatus, errorThrown);
            }
        });
    };


    // Fungsi untuk mengambil data berdasarkan tanggal
    const fetchDataByDate = (date) => {
        // Fetch untuk cell1
        $.ajax({
            url: `<?= base_url('altline6/get/cell1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL1));

                updateOrCreateChart('container', chart, 'Cell1 ', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL1', (newChart) => {
                    chart = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell3
        $.ajax({
            url: `<?= base_url('altline6/get/cell3/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL3));

                updateOrCreateChart('container2', chart3, 'Cell3', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL3', (newChart) => {
                    chart3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell5
        $.ajax({
            url: `<?= base_url('altline6/get/cell5/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL5));

                updateOrCreateChart('container3', chart5, 'Cell5', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL5', (newChart) => {
                    chart5 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell5:', textStatus, errorThrown);
            }
        });

        //fetch result cell 1
        $.ajax({
            url: `<?= base_url('altline6/get/result/cell1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL1));

                updateOrCreateChart('container4', chartresult1, 'Result Cell1', labels, valuesSet, 'L6_ALT1_RESULT_CELL1', (newChart) => {
                    chartresult1 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });
        //fetch result cell 3
        $.ajax({
            url: `<?= base_url('altline6/get/result/cell3/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL3));

                updateOrCreateChart('container5', chartresult3, 'Result Cell3', labels, valuesSet, 'L6_ALT1_RESULT_CELL3', (newChart) => {
                    chartresult3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });
        //fetch result cell 5
        $.ajax({
            url: `<?= base_url('altline6/get/result/cell5/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL5));

                updateOrCreateChart('container6', chartresult5, 'Result Cell5', labels, valuesSet, 'L6_ALT1_RESULT_CELL5', (newChart) => {
                    chartresult5 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell5:', textStatus, errorThrown);
            }
        });

    };

    // Fungsi helper untuk membuat/update chart
    const updateOrCreateChart = (containerId, chartInstance, title, labels, valuesSet, seriesName, setChart, filteredLabels, originalLabels) => {
        const plotLines = filteredLabels.map(time => {
            const timeIndex = originalLabels.findIndex(label => label === time); // Find the index of the time in the original labels
            let shift = '';
            if (time > '07.00.00' && time < '16.00.00') {
                shift = 'shft 1'; // Adjust the shift if time is greater than '07.00.00'
            } else if (time > '16.00.00' && time < '23.59.59') {
                shift = 'shft 2';
            } else if (time > '00.00.00' && time < '07.00.00') {
                shift = 'shft 3';
            }
            if (timeIndex === -1) return null; // If time is not found, don't add plotLine
            return {
                color: 'red', // Line color
                width: 2, // Line width
                value: timeIndex, // Position on the x-axis (based on label index)
                dashStyle: 'ShortDash', // Line style
                zIndex: 5, // Place it above other series
                label: {
                    text: shift, // Display the time next to the line
                    style: {
                        color: 'red'
                    }
                }
            };
        }).filter(line => line !== null); // Filter out null values if time is not found in the labels


        if (chartInstance) {
            chartInstance.series[0].setData(valuesSet);
            chartInstance.xAxis[0].setCategories(labels);
        } else {

            const newChart = Highcharts.chart(containerId, {
                chart: {
                    type: 'line',
                    zoomType: 'x', // Mengaktifkan zoom horizontal
                    events: {
                        selection: function(event) {
                            if (event.xAxis) {
                                this.xAxis[0].setExtremes(event.xAxis[0].min, event.xAxis[0].max);
                                return false; // Mencegah Highcharts dari pengaturan ekstrem secara otomatis
                            }
                        },
                    }
                },
                title: {
                    text: title
                },
                xAxis: {
                    categories: labels,
                    title: {
                        text: 'Output'
                    },
                    labels: {
                        formatter: function() {
                            return filteredLabels.includes(this.value) ? this.value : '';
                        }
                    },
                    plotLines: plotLines,
                    reversed: true
                },
                yAxis: {
                    title: {
                        text: 'Nilai'
                    },
                    min: 0,
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    formatter: function() {
                        let tooltipText = '<b>' + this.x + '</b><br>';
                        this.points.forEach(function(point) {
                            tooltipText += point.series.name + ': ' + point.y + '<br>'; // Display each series' value
                        });
                        return tooltipText;
                    }
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    formatter: function() {
                        let tooltipText = '<b>' + this.x + '</b><br>';
                        this.points.forEach(function(point) {
                            tooltipText += point.series.name + ': ' + point.y + '<br>'; // Display each series' value
                        });
                        return tooltipText;
                    }
                },
                series: [{
                    name: seriesName,
                    data: valuesSet
                }]
            });
            setChart(newChart);
        }
    };

    //week
    const updateOrCreateChartweek = (containerId, chartInstance, title, labels, valuesSet, seriesName, setChart, filteredLabels, originalLabels) => {

        if (chartInstance) {
            chartInstance.series[0].setData(valuesSet);
            chartInstance.xAxis[0].setCategories(labels);
        } else {

            const newChart = Highcharts.chart(containerId, {
                chart: {
                    type: 'line',
                    zoomType: 'x', // Mengaktifkan zoom horizontal
                    events: {
                        selection: function(event) {
                            if (event.xAxis) {
                                this.xAxis[0].setExtremes(event.xAxis[0].min, event.xAxis[0].max);
                                return false; // Mencegah Highcharts dari pengaturan ekstrem secara otomatis
                            }
                        },
                    }
                },
                title: {
                    text: title
                },
                xAxis: {
                    categories: labels,
                    title: {
                        text: 'Output'
                    },
                    labels: {
                        enabled: false
                    },
                    reversed: true
                },
                yAxis: {
                    title: {
                        text: 'Nilai'
                    },
                    min: 0,
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    formatter: function() {
                        let tooltipText = '<b>' + this.x + '</b><br>';
                        this.points.forEach(function(point) {
                            tooltipText += point.series.name + ': ' + point.y + '<br>'; // Display each series' value
                        });
                        return tooltipText;
                    }
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    formatter: function() {
                        let tooltipText = '<b>' + this.x + '</b><br>';
                        this.points.forEach(function(point) {
                            tooltipText += point.series.name + ': ' + point.y + '<br>'; // Display each series' value
                        });
                        return tooltipText;
                    }
                },
                series: [{
                    name: seriesName,
                    data: valuesSet
                }]
            });
            setChart(newChart);
        }
    };

    //fetch data by week
    const fetchDataByWeek = (selectedDate, selectedDate2) => {
        // Fetch 
        var fd = new FormData();
        fd.append('date1', selectedDate);
        fd.append('date2', selectedDate2);

        $.ajax({
            url: `<?= base_url('altline6/data/cell1/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL1));

                updateOrCreateChartweek('container', chart, 'Cell1 ', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL1', (newChart) => {
                    chart = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for cell 1:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('altline6/data/cell3/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL3));

                updateOrCreateChartweek('container2', chart3, 'Cell3', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL3', (newChart) => {
                    chart3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for cell 3:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('altline6/data/cell5/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_ACTUAL_PRESSURE_CELL5));

                updateOrCreateChartweek('container3', chart5, 'Cell5', labels, valuesSet, 'L6_ALT1_ACTUAL_PRESSURE_CELL5', (newChart) => {
                    chart5 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for cell 5:', textStatus, errorThrown);
            }
        });


        //result cell 1 3 5
        $.ajax({
            url: `<?= base_url('altline6/data/result/cell1/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL1));

                updateOrCreateChartweek('container4', chartresult1, 'Result Cell1', labels, valuesSet, 'L6_ALT1_RESULT_CELL1', (newChart) => {
                    chartresult1 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for cell 1:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('altline6/data/result/cell3/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL3));

                updateOrCreateChartweek('container5', chartresult3, 'Result Cell3', labels, valuesSet, 'L6_ALT1_RESULT_CELL3', (newChart) => {
                    chartresult3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for cell 3:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('altline6/data/result/cell5/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                const time = data.data.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        const itemTime = item.waktu.split(' ')[1]; // Ambil bagian jam
                        const diff = Math.abs(
                            timeToMinutes(itemTime) - timeToMinutes(target)
                        );

                        if (diff < closestDiff) {
                            closest = item;
                            closestDiff = diff;
                        }
                    });

                    return closest;
                };

                // Mengubah waktu ke menit untuk perhitungan
                const timeToMinutes = (time) => {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                };

                // Ambil data dengan waktu terdekat untuk setiap target
                const filteredData = targets.map(target => findClosestTime(data.data, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item.waktu.split(' ')[1]); // Jam saja

                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_ALT1_RESULT_CELL5));

                updateOrCreateChartweek('container6', chartresult5, 'Result Cell5', labels, valuesSet, 'L6_ALT1_RESULT_CELL5', (newChart) => {
                    chartresult5 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for cell 5:', textStatus, errorThrown);
            }
        });

    };



    // Fungsi update untuk realtime
    const updateCharts = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchDataCell1();
            fetchDataCell3();
            fetchDataCell5();
            fetchDataResultCell1();
            fetchDataResultCell3();
            fetchDataResultCell5();
            setTimeout(updateCharts, updateInterval);
        }
    };

    // Event listener untuk dropdown
    $('#data-source').on('change', function() {
        const selectedSource = $(this).val();
        if (selectedSource === 'date') {
            $('#date-input').show();
            $('#fetch-data').show();
            $('#tanggal').show();
            $('#date-input-week').hide();
            $('#tanggal-week').hide();
            $('#date-input-week2').hide();
            $('#tanggal-week2').hide();
            $('#fetch-data-week').hide();
            // Reset charts
            chart = chart3 = chart5 = chartresult1 = chartresult3 = chartresult5 = null;
        } else if (selectedSource === 'week') {
            $('#date-input').hide();
            $('#fetch-data').hide();
            $('#tanggal').hide();
            $('#date-input-week').show();
            $('#tanggal-week').show();
            $('#date-input-week2').show();
            $('#tanggal-week2').show();
            $('#fetch-data-week').show();
            chart = chart3 = chart5 = chartresult1 = chartresult3 = chartresult5 = null;
        } else {
            $('#date-input').hide();
            $('#fetch-data').hide();
            $('#tanggal').hide();
            $('#date-input-week').hide();
            $('#tanggal-week').hide();
            $('#date-input-week2').hide();
            $('#tanggal-week2').hide();
            $('#fetch-data-week').hide();
            updateCharts();
        }
    });

    // Event listener untuk tombol fetch
    $('#fetch-data').on('click', function() {
        const selectedDate = $('#date-input').val();
        if (selectedDate) {
            fetchDataByDate(selectedDate);
        } else {
            alert('Please select a date.');
        }
    });

    $('#fetch-data-week').on('click', function() {
        const selectedDate = $('#date-input-week').val();
        const selectedDate2 = $('#date-input-week2').val();
        if (selectedDate && selectedDate2) {
            fetchDataByWeek(selectedDate, selectedDate2);
        } else {
            alert('Please select a date.');
        }

    });
    // Inisialisasi awal
    fetchDataCell1();
    fetchDataCell3();
    fetchDataCell5();
    fetchDataResultCell1();
    fetchDataResultCell3();
    fetchDataResultCell5();
    updateCharts();
</script>

<script>
    let chart_cell1, chart_cell3, chart_cell5;
    let maxCount = 0; // Variabel untuk menyimpan nilai maksimum
    // let maxsumbuX = 0;

    const fetchDataresultCell1 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/distinct/cell1') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('result_cell1', '<?= base_url('altline6/get/distinct/cell1') ?>', 'L6_ALT1_RESULT_CELL1', 'Result Cell 1');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });
    };

    const fetchDataresultCell3 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/distinct/cell3') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('result_cell3', '<?= base_url('altline6/get/distinct/cell3') ?>', 'L6_ALT1_RESULT_CELL3', 'Result Cell 3');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });
    };

    const fetchDataresultCell5 = () => {
        $.ajax({
            url: '<?= base_url('altline6/get/distinct/cell5') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('result_cell5', '<?= base_url('altline6/get/distinct/cell5') ?>', 'L6_ALT1_RESULT_CELL5', 'Result Cell 5');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });
    };

    const fetchDataresultByDate = (date) => {
        // Fetch untuk cell1
        $.ajax({
            url: `<?= base_url('altline6/get/distinct/cell1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {

                createChart(`result_cell1`, `<?= base_url('altline6/get/distinct/cell1/date/') ?>${date}`, 'L6_ALT1_RESULT_CELL1', 'Result Cell 1');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell3
        $.ajax({
            url: `<?= base_url('altline6/get/distinct/cell3/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {

                createChart(`result_cell3`, `<?= base_url('altline6/get/distinct/cell3/date/') ?>${date}`, 'L6_ALT1_RESULT_CELL3', 'Result Cell 3');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell5
        $.ajax({
            url: `<?= base_url('altline6/get/distinct/cell5/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {

                createChart(`result_cell5`, `<?= base_url('altline6/get/distinct/cell5/date/') ?>${date}`, 'L6_ALT1_RESULT_CELL5', 'Result Cell 5');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell5:', textStatus, errorThrown);
            }
        });
    };

    function createChart(containerId, apiUrl, xAxisLabel, titlegrafik) {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                // Memproses data untuk kategori dan hitungan
                const processedData = data.data.map(item => ({
                    category: parseFloat(item[xAxisLabel]), // Ubah kategori menjadi float
                    count: parseInt(item.count)
                }));

                // Mengurutkan berdasarkan kategori
                processedData.sort((a, b) => a.category - b.category);

                // Mendapatkan kategori dan jumlah terurut
                const categories = processedData.map(item => item.category);
                const counts = processedData.map(item => item.count);

                // Update nilai maksimum
                const currentMaxCount = Math.max(...counts);
                const currentMaxsumbuX = Math.max(...categories);
                const currentMinCategories = 0;
                const currentMaxCategories = 3;
                if (currentMaxCount > maxCount) {
                    maxCount = currentMaxCount;
                }
                // if (currentMaxsumbuX > maxsumbuX) {
                //     maxsumbuX = currentMaxsumbuX;
                // }

                // Menyimpan data grafik untuk kemudian digunakan
                const chartData = {
                    containerId: containerId,
                    categories: categories,
                    counts: counts,
                    result: titlegrafik,
                    // batasmin: currentMinCategories,
                    // batasmax: currentMaxCategories
                };

                drawChart(chartData);
            })
            .catch(error => console.error(`Error fetching data for ${containerId}:`, error));
    }

    function drawChart({
        containerId,
        categories,
        counts,
        result,
        // batasmin,
        // batasmax
    }) {
        Highcharts.chart(containerId, {
            chart: {
                type: 'column',
                height: 280
            },
            title: {
                text: `Grafik Bar ` + result
            },
            xAxis: {
                categories: categories,
                title: {
                    text: 'Result Cell' // Ganti sesuai kebutuhan
                },
                plotLines: [{
                        color: 'blue',
                        width: 1,
                        value: 0,
                    },
                    {
                        color: 'blue',
                        width: 1,
                        value: 3,
                    }
                ],
                // min: maxsumbuX + 1

            },
            yAxis: {
                min: 0,
                // max: maxCount, // Mengatur sumbu Y maksimum
                title: {
                    text: 'Jumlah'
                }
            },
            series: [{
                name: 'Jumlah',
                data: counts
            }]
        });
    }
    const updateCharts2 = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchDataresultCell1();
            fetchDataresultCell3();
            fetchDataresultCell5();

        }
    };

    // Event listener untuk dropdown
    $('#data-source').on('change', function() {
        const selectedSource = $(this).val();
        if (selectedSource === 'date') {
            $('#date-input').show();
            $('#fetch-data').show();
            // Reset charts
            chart_cell1 = chart_cell3 = chart_cell5 = null;
        } else {
            $('#date-input').hide();
            $('#fetch-data').hide();
            updateCharts2();
        }
    });

    // Event listener untuk tombol fetch
    $('#fetch-data').on('click', function() {
        const selectedDate = $('#date-input').val();
        if (selectedDate) {
            fetchDataresultByDate(selectedDate);
        } else {
            alert('Please select a date.');
        }
    });

    // Inisialisasi awal
    fetchDataresultCell1();
    fetchDataresultCell3();
    fetchDataresultCell5();
    updateCharts2();
</script>

<!-- parameter data -->
<script>
    let intervalId; // Untuk menyimpan ID interval

    function displayData(response) {
        // Proses data yang diterima
        $('#standar_fill_pressure').val(response.data['L6_ALT1_FILL_PRESSURE']);
        $('#standar_test_pressure').val(response.data['L6_ALT1_TEST_PRESSURE']);
        $('#standar_fill_failure_time').val(response.data['L6_ALT1_FILL_FAILURE_TIME']);
        $('#standar_stabilization_time').val(response.data['L6_ALT1_STABILIZATION_TIME']);
        $('#standar_test_time').val(response.data['L6_ALT1_TEST_TIME']);
        $('#standar_leak_pressure').val(response.data['L6_ALT1_LEAK_PRESSURE_TOLERANCE']);

        $('#actual_fill_pressure').val(response.data['L6_ALT1_FILL_PRESSURE']);
        $('#actual_test_pressure').val(response.data['L6_ALT1_TEST_PRESSURE']);
        $('#actual_fill_failure_time').val(response.data['L6_ALT1_FILL_FAILURE_TIME']);
        $('#actual_stabilization_time').val(response.data['L6_ALT1_STABILIZATION_TIME']);
        $('#actual_test_time').val(response.data['L6_ALT1_TEST_TIME']);
        $('#actual_leak_pressure').val(response.data['L6_ALT1_LEAK_PRESSURE_TOLERANCE']);
    }

    function fetchData() {
        $.ajax({
            url: '<?= base_url('altline6/get/parameter/1') ?>',
            method: 'GET',
            success: function(response) {

                clearInterval(intervalId); // Hentikan animasi angka acak
                displayData(response); // Tampilkan data
                setTimeout(startRandomAnimation, 10000); // Mulai animasi angka acak setelah 10 detik
            },
            error: function(error) {
                console.error('Ada masalah dengan pengambilan data:', error);
            }
        });
    }

    function startRandomAnimation() {
        // Tampilkan animasi angka acak selama 3 detik
        const endTime = Date.now() + 3000; // 3 detik dari sekarang
        intervalId = setInterval(() => {
            const randomNum = Math.floor(Math.random() * 100); // Angka acak antara 0-100
            $('[id^="actual_"]').val(randomNum); // Update semua elemen dengan ID yang diawali dengan "actual-"
            if (Date.now() >= endTime) {
                clearInterval(intervalId); // Hentikan animasi angka acak
                setTimeout(fetchData, 1000); // Tunggu 1 detik sebelum memanggil fetchData lagi
            }
        }, 100); // Update setiap 100ms
        //fetchData();
    }

    // Panggil fetchData untuk pertama kali saat halaman dimuat
    fetchData();
</script>

<!-- getdataToday -->
<script>
    // Inisialisasi variabel untuk menyimpan total
    //let totalData1 = 0;
    let totalData2 = 0;

    // Fungsi untuk mengupdate total
    function updateTotal() {
        const totalKeseluruhan = totalData2;
        $('#total_alt').text(totalKeseluruhan + ' Pcs');
    }

    // Permintaan AJAX pertama
    $.ajax({
        url: '<?= base_url('altline6/get/total/data/1') ?>',
        method: 'GET',
        success: function(response) {
            var dataArray = response.data; // Ambil data dari response
            const now = new Date();
            const formattedSeconds = now.toLocaleString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            if (formattedSeconds > '07.30.00' && formattedSeconds < '16.30.00') {
                // Tambahkan kode yang ingin dijalankan jika waktu kurang dari 07.30.00
                totalData1 = dataArray[0];
            } else if (formattedSeconds > '16.30.00' && formattedSeconds < '23.59.00') {
                totalData1 = dataArray[1];
            } else if (formattedSeconds > '00.00.00' && formattedSeconds < '07.29.00') {
                totalData1 = dataArray[2];
            }
            $('#total_pcs').val(totalData1);
            // totalData1 = response.data; // Simpan hasil data1
            //updateTotal(); // Update total setelah mendapatkan data1
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });

    // Permintaan AJAX kedua
    $.ajax({
        url: '<?= base_url('altline6/get/total/data/2') ?>',
        method: 'GET',
        success: function(response) {
            var dataArray = response.data; // Ambil data dari response
            const now = new Date();
            const formattedSeconds = now.toLocaleString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            if (formattedSeconds > '07.30.00' && formattedSeconds < '16.30.00') {
                // Tambahkan kode yang ingin dijalankan jika waktu kurang dari 07.30.00
                totalData2 = dataArray[0];
            } else if (formattedSeconds > '16.30.00' && formattedSeconds < '23.59.00') {
                totalData2 = dataArray[1];
            } else if (formattedSeconds > '00.00.00' && formattedSeconds < '07.29.00') {
                totalData2 = dataArray[2];
            }
            updateTotal(); // Update total setelah mendapatkan data2
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });


    $.ajax({
        url: '<?= base_url('altline6/get/total/ok/1') ?>',
        method: 'GET',
        success: function(response) {
            var dataArray = response.data;
            const now = new Date();
            const formattedSeconds = now.toLocaleString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            if (formattedSeconds > '07.30.00' && formattedSeconds < '16.30.00') {
                // Tambahkan kode yang ingin dijalankan jika waktu kurang dari 07.30.00
                $('#data_ok_parameter').val(dataArray[0]);
            } else if (formattedSeconds > '16.30.00' && formattedSeconds < '23.59.00') {
                $('#data_ok_parameter').val(dataArray[1]);
            } else if (formattedSeconds > '00.00.00' && formattedSeconds < '07.29.00') {
                $('#data_ok_parameter').val(dataArray[2]);
            }
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    })

    $.ajax({
        url: '<?= base_url('altline6/get/total/ng/1') ?>',
        method: 'GET',
        success: function(response) {
            var dataArray = response.data;
            const now = new Date();
            const formattedSeconds = now.toLocaleString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            if (formattedSeconds > '07.30.00' && formattedSeconds < '16.30.00') {
                // Tambahkan kode yang ingin dijalankan jika waktu kurang dari 07.30.00
                $('#data_ng_parameter').val(dataArray[0]);
            } else if (formattedSeconds > '16.30.00' && formattedSeconds < '23.59.00') {
                $('#data_ng_parameter').val(dataArray[1]);
            } else if (formattedSeconds > '00.00.00' && formattedSeconds < '07.29.00') {
                $('#data_ng_parameter').val(dataArray[2]);
            }
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    })


    $(document).ready(function() {
        const renderData = (dataArray, containerSelectors) => {
            // Clear content in all specified containers
            containerSelectors.forEach(selector => $(selector).empty());

            // Generate HTML for each item and append to containers
            dataArray.forEach(item => {
                const html = `
                <div class="bg-primary p-15 rounded10 mb-20">
                    <div>
                        <span class="badge badge-sm badge-dot badge-warning me-5"></span>
                        Battery NG
                    </div>
                    <h4 class="my-20">Actual Pressure Cell 1, 3, 5: ${item.L6_ALT1_ACTUAL_PRESSURE_CELL1}, ${item.L6_ALT1_ACTUAL_PRESSURE_CELL3}, ${item.L6_ALT1_ACTUAL_PRESSURE_CELL5}</h4>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <h6 class="my-20">Result Cell 1, 3, 5: ${item.L6_ALT1_RESULT_CELL1}, ${item.L6_ALT1_RESULT_CELL3}, ${item.L6_ALT1_RESULT_CELL5}</h6>
                        </div>
                        <p>${item.waktu}</p>
                    </div>
                </div>
            `;
                containerSelectors.forEach(selector => $(selector).append(html));
            });
        };

        const fetchData = (url, containerSelectors) => {
            $.ajax({
                url,
                method: 'GET',
                success: function(response) {
                    const dataArray = response.data;
                    renderData(dataArray, containerSelectors);
                },
                error: function(error) {
                    console.error('Ada masalah dengan pengambilan data:', error);
                }
            });
        };

        const baseUrl = '<?= base_url('altline6/get/ng/detail/1') ?>';

        // Default fetch for real-time data
        const getRealTimeData = () => fetchData(baseUrl, ['.act-div', '.box-body-notif-modal']);

        // Fetch data by date
        const getDataByDate = (date) => fetchData(`${baseUrl}/${date}`, ['.act-div', '.box-body-notif-modal']);

        // Initialize default data fetch
        getRealTimeData();

        // Handle filter selection change
        $('#data-source').on('change', function() {
            const isDateSelected = $(this).val() === 'date';
            $('#tanggal, #date-input, #fetch-data').toggle(isDateSelected);

            if (isDateSelected) {
                $('.act-div').empty(); // Clear previous content
            } else {
                getRealTimeData(); // Fetch real-time data
            }
        });

        // Fetch data for the selected date when the button is clicked
        $('#fetch-data').on('click', function() {
            const selectedDate = $('#date-input').val();
            if (selectedDate) getDataByDate(selectedDate);
        });

        // Fetch data when the "View all" button is clicked
        $('.view-all').on('click', function(e) {
            e.preventDefault();
            if ($('#data-source').val() === 'date') {
                const selectedDate = $('#date-input').val();
                if (selectedDate) getDataByDate(selectedDate);
            } else {
                getRealTimeData();
            }
            $('#dataModal').modal('show');
        });
    });
</script>


<!-- parameter -->
<script>
    $.ajax({
        url: '<?= base_url('hsmline6/get/type/1') ?>',
        method: 'GET',
        success: function(response) {
            // Filter data untuk tipe 1 dan 2
            const filteredData = response.data.filter(item =>
                item.L6_HSM1_TYPE_BATTERY === "0" || item.L6_HSM1_TYPE_BATTERY === "1" || item.L6_HSM1_TYPE_BATTERY === "2"
            );

            // Define the types and their corresponding input IDs
            const types = [{
                    type: 'N70LC375,LC238,LC300',
                    inputId: 'dandori1'
                },
                {
                    type: 'N70 MF',

                    inputId: 'dandori2'
                },
                {
                    type: 'N70LC375,LC238,LC300',
                    inputId: 'dandori3'
                }
            ];

            // Clear all input fields initially
            types.forEach(type => {
                $(`#${type.inputId}`).val('');
            });

            // Loop through filteredData and populate the inputs
            filteredData.forEach((item, index) => {
                if (index < types.length) {
                    $(`#type${index + 1}`).val(types[index].type);
                    $(`#${types[index].inputId}`).val(item.waktu);
                }
            });
            const now = new Date();
            const formattedDate = now.toLocaleString('id-ID', {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour12: false
            });
            const formattedSeconds = now.toLocaleString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            $('#tanggal_now').val(formattedDate);
            $('#jam_now').val(formattedSeconds + ' WIB');
            if (formattedSeconds < '07.30.00' && formattedSeconds > '00.30.00') {
                // Tambahkan kode yang ingin dijalankan jika waktu kurang dari 07.30.00
                $('#shift').text('Shift 3');
            } else if (formattedSeconds < '16.30.00' && formattedSeconds > '07.30.00') {
                $('#shift').text('Shift 1');
            } else if (formattedSeconds > '16.30.00' && formattedSeconds < '00.30.00') {
                $('#shift').text('Shift 2');
            }
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });
</script>

<!-- cpp/cpk -->
<script>
    $(document).ready(function() {

        // Fungsi untuk menghitung CP/PP, median, dan CPK/PPK
        function calculateMetrics(apiUrl, cpElementId, cpkElementId, resultCellName) {
            $.ajax({
                url: apiUrl, // Ganti dengan URL API yang sesuai
                type: 'GET',
                success: function(response) {
                    // Periksa apakah respons memiliki data
                    if (response.data && Array.isArray(response.data)) {
                        // Ekstrak nilai berdasarkan nama kolom yang diberikan dan konversi menjadi angka
                        const values = response.data.map(item => Number(item[resultCellName]));

                        // Temukan nilai maksimum dan minimum
                        const maxValue = Math.max(...values);
                        const minValue = Math.min(...values);

                        // Hitung CP/PP
                        let cp_pp = 3 / (maxValue - minValue);
                        $(cpElementId).text(cp_pp);


                        // Urutkan nilai
                        values.sort((a, b) => a - b);

                        // Hitung median
                        let median;
                        const mid = Math.floor(values.length / 2);

                        if (values.length % 2 === 0) {
                            // Jika jumlah angka genap
                            median = (values[mid - 1] + values[mid]) / 2;
                        } else {
                            // Jika jumlah angka ganjil
                            median = values[mid];
                        }

                        // Hitung CPK/PPK
                        let cpk_ppk = (median - minValue) / (0.5 * (maxValue - minValue));
                        $(cpkElementId).text(cpk_ppk);
                    } else {
                        console.error('No data found in response');
                        $(cpElementId).text('No data found');
                    }
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Panggil fungsi untuk cell1
        calculateMetrics('<?= base_url('altline6/get/distinct/cell1') ?>', '#cp_cell1', '#cpk_cell1', 'L6_ALT1_RESULT_CELL1');

        // Panggil fungsi untuk cell3
        calculateMetrics('<?= base_url('altline6/get/distinct/cell3') ?>', '#cp_cell3', '#cpk_cell3', 'L6_ALT1_RESULT_CELL3');

        // Panggil fungsi untuk cell5
        calculateMetrics('<?= base_url('altline6/get/distinct/cell5') ?>', '#cp_cell5', '#cpk_cell5', 'L6_ALT1_RESULT_CELL5');

        const fetchCPPbyDate = (date) => {
            calculateMetrics(`<?= base_url('altline6/get/distinct/cell1/date/') ?>${date}`, '#cp_cell1', '#cpk_cell1', 'L6_ALT1_RESULT_CELL1');

            // Panggil fungsi untuk cell3
            calculateMetrics(`<?= base_url('altline6/get/distinct/cell3/date/') ?>${date}`, '#cp_cell3', '#cpk_cell3', 'L6_ALT1_RESULT_CELL3');

            // Panggil fungsi untuk cell5
            calculateMetrics(`<?= base_url('altline6/get/distinct/cell5/date/') ?>${date}`, '#cp_cell5', '#cpk_cell5', 'L6_ALT1_RESULT_CELL5');

        }

        // Handle filter selection change
        $('#data-source').on('change', function() {
            if ($(this).val() === 'date') {
                $('#tanggal').show();
                $('#date-input').show();
                $('#fetch-data').show();

            } else {
                $('#tanggal').hide();
                $('#date-input').hide();
                $('#fetch-data').hide();
            }
        });
        // Fetch data for the selected date when the button is clicked
        $('#fetch-data').on('click', function() {
            const selectedDate = $('#date-input').val();
            if (selectedDate) {
                fetchCPPbyDate(selectedDate); // Fetch data by date
            }
        });
    });
</script>


<?= $this->endSection() ?>


