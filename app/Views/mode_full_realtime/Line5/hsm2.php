<?= $this->extend('template_mode/layout_mode'); ?>

<?= $this->section('content'); ?>
<style>
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

                        <h5 style="color: #fff;" id="battery_now"></h5>
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
                            <input type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" disabled>
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
                                        <h5 class="card-title">Output Battery HSM Line 5</h5> <!-- Teks di tengah -->
                                        <h4 id="total_hsm"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3-5">
                        <div class="box-body" style="background-color:#F2EFE5;">
                            <h5 class="text-center">HSM 2 Line 5 Detail</h5>
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
                                        <input type="text" class="form-control" disabled>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black; ">
                                                <h4>Parameter</h4>
                                            </label>
                                            <input type="text" value="Temp Left" class="form-control mb-3" disabled style="width:110px;">
                                            <input type="text" value="Temp Right" class="form-control mb-3" disabled style="width:110px;">
                                            <label for="">LID HOLDER </label>
                                            <input type="text" value="Melting Pos" class="form-control mb-3" disabled style="width:110px;">
                                            <input type="text" value="Sealing Pos" class="form-control mb-3" disabled style="width:110px;">
                                            <label for="">BOX LIFTER </label>
                                            <input type="text" value="Melting Pos" class="form-control mb-3" disabled style="width:110px;">
                                            <input type="text" value="Sealing Pos" class="form-control mb-3" disabled style="width:110px;">
                                            <label for="">MIRROR</label>
                                            <input type="text" value="Melting Pos" class="form-control mb-3" disabled style="width:110px;">
                                            <label for="">TIME</label>
                                            <input type="text" value="Lid Melting (s)" class="form-control mb-3" disabled style="width:110px;">
                                            <input type="text" value="Box Melting (s)" class="form-control mb-3" disabled style="width:110px;">
                                            <input type="text" value="Sealing (s)" class="form-control mb-3" disabled style="width:110px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black;">
                                                <h4>Standar</h4>
                                            </label>
                                            <input type="text" id="set_val_left" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="set_val_right" class="form-control mb-3" disabled style="width:80px;">
                                            <label for=""></label>
                                            <input type="text" id="standar_lid_holder_melting_pos" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="standar_lid_holder_sealing_pos" class="form-control mb-3" disabled style="width:80px;">
                                            <label for=""></label>
                                            <input type="text" id="standar_box_lifter_melting_pos" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="standar_box_lifter_sealing_pos" class="form-control mb-3" disabled style="width:80px;">
                                            <label for=""></label>
                                            <input type="text" id="standar_mirror_melting_pos" class="form-control mb-3" disabled style="width:80px;">
                                            <label for=""></label>
                                            <input type="text" id="standar_lid_melting_time" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="standar_box_melting_time" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="standar_sealing_time" class="form-control mb-3" disabled style="width:80px;">

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black;">
                                                <h4>SetVal</h4>
                                            </label>
                                            <input type="text" id="set_value1" class="form-control mb-3" disabled style="width:60px;">
                                            <input type="text" id="set_value2" class="form-control mb-3" disabled style="width:60px;">
                                            <label for=""></label>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black;">
                                                <h4>Actual</h4>
                                            </label>
                                            <input type="text" id="temp_left" class="form-control mb-3" disabled style="width:60px;">
                                            <input type="text" id="temp_right" class="form-control mb-3" disabled style="width:60px;">
                                            <label for=""></label>
                                            <input type="text" id="actual_lid_holder_melting_pos" class="form-control mb-3" disabled style="width:60px;">
                                            <input type="text" id="actual_lid_holder_sealing_pos" class="form-control mb-3" disabled style="width:60px;">
                                            <label for=""></label>
                                            <input type="text" id="actual_box_lifter_melting_pos" class="form-control mb-3" disabled style="width:60px;">
                                            <input type="text" id="actual_box_lifter_sealing_pos" class="form-control mb-3" disabled style="width:60px;">
                                            <label for=""></label>
                                            <input type="text" id="actual_mirror_melting_pos" class="form-control mb-3" disabled style="width:60px;">
                                            <label for=""></label>
                                            <input type="text" id="actual_lid_melting_time" class="form-control mb-3" disabled style="width:60px;">
                                            <input type="text" id="actual_box_melting_time" class="form-control mb-3" disabled style="width:60px;">
                                            <input type="text" id="actual_sealing_time" class="form-control mb-3" disabled style="width:60px;">

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
                    <div class="col-xl-4 col-12">
                        <div class="box">
                            <div class="box-body">
                                <div id="temp_left2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="box">
                            <div class="box-body">
                                <div id="temp_right2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <h3 class="text-center">Notification</h3>
                                    <div id="data-display" style="border: 1px solid #ccc; padding: 10px; margin-top: 20px;">
                                        <strong>Data akan ditampilkan di sini</strong>
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
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">1</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-12">
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPK/PPK</span>
                                    </div>
                                    <div class="col-xl-6 col-12">
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">1,5</span>
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
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">1</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-12">
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPK/PPK</span>
                                    </div>
                                    <div class="col-xl-6 col-12">
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">1,5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="box">
                                <div class=" box-header with-border">
                                    <!-- <h4 class="box-title">Real Time Temperatur HSM 1</h4>
                                    <div class="row">
                                        <label for="data-source">Select Data Source:</label>
                                        <div class="col-xl-3 col-12">
                                            <select id="data-source" class="form-select">
                                                <option value="realtime">Real-time</option>
                                                <option value="date">By Date</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-12">
                                            <input type="date" id="date-input" class="form-control" style="display: none;" />
                                        </div>
                                        <div class="col-xl-3 col-12">
                                            <button class="btn btn-primary" id="fetch-data" style="display: none;">Fetch Data</button>
                                        </div>

                                    </div> -->
                                </div>
                                <div class="box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container2" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="lidholder" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="boxlifter" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="mirrorpos" style="height: 300px;"></div>
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


<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    let chart, chart3, chart_lidholder, chart_boxlifter, chart_mirror;
    const updateInterval = 100000;

    // Fungsi helper untuk membuat atau memperbarui chart

    const updateOrCreateChart = (container, chart, title, labels, valuesSet, seriesName, valuesTemp, SeriesTemp, chartCallback, upper, lower, filteredLabels, originalLabels) => {
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

        // Create or update the chart
        if (!chart) {
            chart = Highcharts.chart(container, {
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
                        text: 'Temperature'
                    },

                },
                tooltip: {
                    shared: true, // Show tooltip for all series at once
                    crosshairs: true, // Show crosshairs for hovering over
                    formatter: function() {
                        let tooltipText = '<b>' + this.x + '</b><br>';
                        this.points.forEach(function(point) {
                            tooltipText += point.series.name + ': ' + point.y + '<br>';
                        });
                        return tooltipText;
                    }
                },
                series: [{
                    name: seriesName,
                    data: valuesSet
                }, {
                    name: SeriesTemp,
                    data: valuesTemp
                }, {
                    name: 'Upper Limit',
                    data: upper
                }, {
                    name: 'Lower Limit',
                    data: lower
                }],
                annotations: [{
                    labels: filteredLabels.map(time => {
                        const timeIndex = originalLabels.findIndex(label => label === time);
                        return {
                            point: {
                                x: timeIndex,
                                y: valuesTemp[timeIndex] // Position at the corresponding Y value
                            },
                            text: time,
                            style: {
                                color: 'red'
                            }
                        };
                    })
                }],
            });
        } else {
            // Update chart if already created
            chart.xAxis[0].update({
                plotLines: plotLines
            });
            chart.series[0].setData(valuesSet);
            chart.series[1].setData(valuesTemp);
        }
    };

    //fungsi chart melting
    const updateOrCreateChartMelting = (container, chart, title, labels, valuesActual, seriesActual, valuesMelting, SeriesMelting, setChart, filteredLabels, originalLabels) => {
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

        // Create or update the chart
        if (!chart) {
            chart = Highcharts.chart(container, {
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
                        text: 'Melting'
                    },

                },
                tooltip: {
                    shared: true, // Show tooltip for all series at once
                    crosshairs: true, // Show crosshairs for hovering over
                    formatter: function() {
                        let tooltipText = '<b>' + this.x + '</b><br>';
                        this.points.forEach(function(point) {
                            tooltipText += point.series.name + ': ' + point.y + '<br>';
                        });
                        return tooltipText;
                    }
                },
                series: [{
                    name: seriesActual,
                    data: valuesActual
                }, {
                    name: SeriesMelting,
                    data: valuesMelting
                }],
                annotations: [{
                    labels: filteredLabels.map(time => {
                        const timeIndex = originalLabels.findIndex(label => label === time);
                        return {
                            point: {
                                x: timeIndex,
                                y: valuesMelting[timeIndex] // Position at the corresponding Y value
                            },
                            text: time,
                            style: {
                                color: 'red'
                            }
                        };
                    })
                }],
            });
        } else {
            // Update chart if already created
            chart.xAxis[0].update({
                plotLines: plotLines
            });
            chart.series[0].setData(valuesActual);
            chart.series[1].setData(valuesMelting);
        }

    };
    //untuk week
    // Fungsi helper untuk membuat atau memperbarui chart
    const updateOrCreateChartweek = (container, chart, title, labels, valuesSet, seriesName, valuesTemp, SeriesTemp, chartCallback, upper, lower, filteredLabels, originalLabels) => {
        // Create or update the chart
        if (!chart) {
            chart = Highcharts.chart(container, {
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
                    labels: {
                        enabled: false // Disables the labels on the x-axis
                    },
                    title: {
                        text: 'Output'
                    },
                    reversed: true
                },
                yAxis: {
                    title: {
                        text: 'Temperature'
                    },

                },
                tooltip: {
                    shared: true, // Show tooltip for all series at once
                    crosshairs: true, // Show crosshairs for hovering over
                    formatter: function() {
                        let tooltipText = '<b>' + this.x + '</b><br>';
                        this.points.forEach(function(point) {
                            tooltipText += point.series.name + ': ' + point.y + '<br>';
                        });
                        return tooltipText;
                    }
                },
                series: [{
                    name: seriesName,
                    data: valuesSet
                }, {
                    name: SeriesTemp,
                    data: valuesTemp
                }, {
                    name: 'Upper Limit',
                    data: upper
                }, {
                    name: 'Lower Limit',
                    data: lower
                }]
            });
        } else {
            // Update chart if already created
            chart.xAxis[0].update({
                plotLines: plotLines
            });
            chart.series[0].setData(valuesSet);
            chart.series[1].setData(valuesTemp);
        }
    };

    const updateOrCreateChartMeltingweek = (container, chart, title, labels, valuesActual, seriesActual, valuesMelting, SeriesMelting, setChart, filteredLabels, originalLabels) => {

        // Create or update the chart
        if (!chart) {
            chart = Highcharts.chart(container, {
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
                        enabled: false,
                    },
                    reversed: true
                },
                yAxis: {
                    title: {
                        text: 'Melting'
                    },

                },
                tooltip: {
                    shared: true, // Show tooltip for all series at once
                    crosshairs: true, // Show crosshairs for hovering over
                    formatter: function() {
                        let tooltipText = '<b>' + this.x + '</b><br>';
                        this.points.forEach(function(point) {
                            tooltipText += point.series.name + ': ' + point.y + '<br>';
                        });
                        return tooltipText;
                    }
                },
                series: [{
                    name: seriesActual,
                    data: valuesActual
                }, {
                    name: SeriesMelting,
                    data: valuesMelting
                }],

            });
        } else {
            // Update chart if already created
            chart.xAxis[0].update({
                plotLines: plotLines
            });
            chart.series[0].setData(valuesActual);
            chart.series[1].setData(valuesMelting);
        }

    };


    // Fungsi untuk lidholder
    const fetchDataLidHolder = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/get/data/lid_holder_melting/2') ?>',
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
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_LID_HOLDER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_LID_HOLDER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('lidholder', chart_lidholder, 'Lid Holder Position', labels, valuesActual, 'L5_HSM2_LID_HOLDER_ACTUAL_POS', valuesMelting, 'L5_HSM2_LID_HOLDER_MELTING_POS', (newChart) => {
                    chart_lidholder = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm1:', textStatus, errorThrown);
            }
        });
    };

    //Fungsi untuk Box Lifter
    const fetchDataBoxLifter = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/get/data/box_lifter_melting/2') ?>',
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
                console.log(filteredLabels);

                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_BOX_LIFTER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_BOX_LIFTER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('boxlifter', chart_boxlifter, 'Box Lifter Position', labels, valuesActual, 'L5_HSM2_BOX_LIFTER_ACTUAL_POS', valuesMelting, 'L5_HSM2_BOX_LIFTER_MELTING_POS', (newChart) => {
                        chart_boxlifter = newChart;
                    },
                    filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm1:', textStatus, errorThrown);
            }
        });
    };

    //Fungsi untuk Box Lifter
    const fetchDataMirrorPos = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/get/data/mirror_pos/2') ?>',
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
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_MIRROR_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_MIRROR_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('mirrorpos', chart_mirror, 'Mirror Position', labels, valuesActual, 'L5_HSM2_MIRROR_ACTUAL_POS', valuesMelting, 'L5_HSM2_MIRROR_MELTING_POS', (newChart) => {
                    chart_mirror = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm1:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk mengambil data berdasarkan tanggal
    const fetchDataByDate = (date) => {
        // Fetch untuk cell1
        $.ajax({
            url: `<?= base_url('hsmline5/get/temp/right2/date/') ?>${date}`,
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
                console.log(filteredLabels);
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE));
                const valuesRight = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_RIGHT));
                const valuesStandar = data.data.map(item => parseFloat(item.L5_HSM2_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChart('container', chart, 'TEMP RIGHT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesRight, 'L5_HSM2_TEMP_RIGHT', (newChart) => {
                    chart = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell3
        $.ajax({
            url: `<?= base_url('hsmline5/get/temp/left2/date/') ?>${date}`,
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
                console.log(filteredLabels);
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE));
                const valuesLeft = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_LEFT));
                const valuesStandar = data.data.map(item => parseFloat(item.L5_HSM2_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChart('container2', chart3, 'TEMP LEFT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesLeft, 'L5_HSM2_TEMP_LEFT', (newChart) => {
                    chart3 = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1:', textStatus, errorThrown);
            }
        });

        //lidholder
        $.ajax({
            url: `<?= base_url('hsmline5/get/data/lid_holder_melting2/date/') ?>${date}`,
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
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_LID_HOLDER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_LID_HOLDER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('lidholder', chart_lidholder, 'Lid Holder Position', labels, valuesActual, 'L5_HSM2_LID_HOLDER_ACTUAL_POS', valuesMelting, 'L5_HSM2_LID_HOLDER_MELTING_POS', (newChart) => {
                    chart_lidholder = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1:', textStatus, errorThrown);
            }
        });
        //boxlifter
        $.ajax({
            url: `<?= base_url('hsmline5/get/data/box_lifter_melting2/date/') ?>${date}`,
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
                console.log(filteredLabels);

                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_BOX_LIFTER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_BOX_LIFTER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('boxlifter', chart_boxlifter, 'Box Lifter Position', labels, valuesActual, 'L5_HSM2_BOX_LIFTER_ACTUAL_POS', valuesMelting, 'L5_HSM2_BOX_LIFTER_MELTING_POS', (newChart) => {
                        chart_boxlifter = newChart;
                    },
                    filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1:', textStatus, errorThrown);
            }
        });

        //mirror pos
        $.ajax({
            url: `<?= base_url('hsmline5/get/data/mirror_pos2/date/') ?>${date}`,
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
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_MIRROR_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_MIRROR_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('mirrorpos', chart_mirror, 'Mirror Position', labels, valuesActual, 'L5_HSM2_MIRROR_ACTUAL_POS', valuesMelting, 'L5_HSM2_MIRROR_MELTING_POS', (newChart) => {
                    chart_mirror = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1:', textStatus, errorThrown);
            }
        });

    };

    // Fungsi untuk right
    const fetchDataRight1 = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/get/temp/right2') ?>',
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

                // Ambil data lainnya
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE));
                const valuesRight = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_RIGHT));
                const valuesStandar = data.data.map(item => parseFloat(item.L5_HSM2_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);

                // Kirimkan data ke chart untuk ditampilkan
                updateOrCreateChart(
                    'container',
                    chart,
                    'TEMP RIGHT',
                    labels,
                    valuesSet,
                    'L5_HSM2_TEMP_SET_VALUE',
                    valuesRight,
                    'L5_HSM2_TEMP_RIGHT',
                    (newChart) => {
                        chart = newChart;
                    },
                    upper,
                    lower,
                    filteredLabels,
                    data.data.map(item => item.waktu.split(' ')[1])
                );
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm1:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk left
    const fetchDataLeft1 = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/get/temp/left2') ?>',
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
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE));
                const valuesLeft = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_LEFT));
                const valuesStandar = data.data.map(item => parseFloat(item.L5_HSM2_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChart('container2', chart3, 'TEMP LEFT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesLeft, 'L5_HSM2_TEMP_LEFT', (newChart) => {
                    chart3 = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi update untuk realtime
    const updateCharts = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchDataRight1();
            fetchDataLeft1();
            fetchDataLidHolder();
            fetchDataBoxLifter();
            fetchDataMirrorPos();
            setTimeout(updateCharts, updateInterval);
        }
    };
    const fetchDataByWeek = (selectedDate, selectedDate2) => {
        // Fetch 
        var fd = new FormData();
        fd.append('date1', selectedDate);
        fd.append('date2', selectedDate2);

        $.ajax({
            url: `<?= base_url('hsmline5/data/temp/right2/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
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
                console.log(filteredLabels);
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE));
                const valuesRight = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_RIGHT));
                const valuesStandar = data.data.map(item => parseFloat(item.L5_HSM2_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChartweek('container', chart, 'TEMP RIGHT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesRight, 'L5_HSM2_TEMP_RIGHT', (newChart) => {
                    chart = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 2:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('hsmline5/data/temp/left2/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
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
                console.log(filteredLabels);
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE));
                const valuesLeft = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_LEFT));
                const valuesStandar = data.data.map(item => parseFloat(item.L5_HSM2_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChartweek('container2', chart, 'TEMP LEFT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesLeft, 'L5_HSM2_TEMP_LEFT', (newChart) => {
                    chart = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 2:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('hsmline5/data/lid_holder2/pos/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
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
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_LID_HOLDER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_LID_HOLDER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMeltingweek('lidholder', chart_lidholder, 'Lid Holder Position', labels, valuesActual, 'L5_HSM2_LID_HOLDER_ACTUAL_POS', valuesMelting, 'L5_HSM2_LID_HOLDER_MELTING_POS', (newChart) => {
                    chart_lidholder = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));

            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 2:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('hsmline5/data/box_lifter2/pos/week') ?>`,
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
                console.log(filteredLabels);

                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_BOX_LIFTER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_BOX_LIFTER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMeltingweek('boxlifter', chart_boxlifter, 'Box Lifter Position', labels, valuesActual, 'L5_HSM2_BOX_LIFTER_ACTUAL_POS', valuesMelting, 'L5_HSM2_BOX_LIFTER_MELTING_POS', (newChart) => {
                        chart_boxlifter = newChart;
                    },
                    filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));

            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 2:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('hsmline5/data/mirror2/pos/week') ?>`,
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
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L5_HSM2_MIRROR_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L5_HSM2_MIRROR_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMeltingweek('mirrorpos', chart_mirror, 'Mirror Position', labels, valuesActual, 'L5_HSM2_MIRROR_ACTUAL_POS', valuesMelting, 'L5_HSM2_MIRROR_MELTING_POS', (newChart) => {
                    chart_mirror = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));

            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 2:', textStatus, errorThrown);
            }
        });

    };


    // Event listener untuk dropdown
    $('#data-source').on('change', function() {
        const selectedSource = $(this).val();
        if (selectedSource === 'date') {
            $('#date-input').show();
            $('#fetch-data').show();
            $('#tanggal').show();
            // Reset charts
            chart = chart3 = chart5 = null;
        } else if (selectedSource === 'week') {
            $('#date-input-week').show();
            $('#tanggal-week').show();
            $('#date-input-week2').show();
            $('#tanggal-week2').show();
            $('#fetch-data-week').show();
            chart = chart3 = chart5 = null;
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

    $('#fetch-data-week').on('click', function() {
        const selectedDate = $('#date-input-week').val();
        const selectedDate2 = $('#date-input-week2').val();
        if (selectedDate < selectedDate2) {
            fetchDataByWeek(selectedDate, selectedDate2);
        } else {
            alert('Pilih tanggal awal dan akhir dengan benar');
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


    // Inisialisasi awal
    fetchDataRight1();
    fetchDataLeft1();
    fetchDataLidHolder();
    fetchDataBoxLifter();
    fetchDataMirrorPos();
    updateCharts();
</script>


<!-- distinct temp -->
<script>
    let chart_tempLeft, chart_tempRight;
    let maxCount = 0; // Variable to store maximum count

    const fetchData_tempLeft = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/distinct/left2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_left2', '<?= base_url('hsmline5/distinct/left2') ?>', 'TEMP_LEFT_RANGE', 'Temperatur Left');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm2:', textStatus, errorThrown);
            }
        });
    };

    const fetchData_tempRight = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/distinct/right2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_right2', '<?= base_url('hsmline5/distinct/right2') ?>', 'TEMP_RIGHT_RANGE', 'Temperatur Right');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm2:', textStatus, errorThrown);
            }
        });
    };

    // Function to fetch data by date
    const fetchData_tempByDate = (date) => {
        // Fetch for right temperature
        $.ajax({
            url: `<?= base_url('hsmline5/distinct/right2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_right2', `<?= base_url('hsmline5/distinct/right2/date/') ?>${date}`, 'TEMP_RIGHT_RANGE', 'Temperatur Right');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 2:', textStatus, errorThrown);
            }
        });

        // Fetch for left temperature
        $.ajax({
            url: `<?= base_url('hsmline5/distinct/left2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_left2', `<?= base_url('hsmline5/distinct/left2/date/') ?>${date}`, 'TEMP_LEFT_RANGE', 'Temperatur Left');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 2:', textStatus, errorThrown);
            }
        });
    };

    function createChart(containerId, apiUrl, xAxisLabel, titlegrafik) {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                // Process data for categories and counts
                const processedData = data.data.map(item => ({
                    category: item[xAxisLabel],
                    count: parseInt(item.count)
                }));

                // Get categories and counts
                const categories = processedData.map(item => item.category);
                const counts = processedData.map(item => item.count);

                // Update maximum count
                const currentMaxCount = Math.max(...counts);
                if (currentMaxCount > maxCount) {
                    maxCount = currentMaxCount;
                }

                // Prepare chart data
                const chartData = {
                    containerId: containerId,
                    categories: categories,
                    counts: counts,
                    result: titlegrafik
                };

                drawChart(chartData);
            })
            .catch(error => console.error(`Error fetching data for ${containerId}:`, error));
    }

    function drawChart({
        containerId,
        categories,
        counts,
        result
    }) {
        Highcharts.chart(containerId, {
            chart: {
                type: 'column',
                height: 300
            },
            title: {
                text: `Grafik Bar ${result}`
            },
            xAxis: {
                categories: categories,
                title: {
                    text: result
                }
            },
            yAxis: {
                min: 0,
                //max: maxCount, // Set maximum Y-axis value
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

    // Function for real-time updates
    const updateCharts2 = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchData_tempLeft();
            fetchData_tempRight();
        }
    };

    // Event listener for dropdown
    $('#data-source').on('change', function() {
        const selectedSource = $(this).val();
        if (selectedSource === 'date') {
            $('#date-input').show();
            $('#fetch-data').show();
            $('#tanggal').show();
            // Reset charts
            chart_tempLeft = chart_tempRight = null;
        } else {
            $('#date-input').hide();
            $('#fetch-data').hide();
            $('#tanggal').hide();
            updateCharts2();
        }
    });

    // Event listener for fetch button
    $('#fetch-data').on('click', function() {
        const selectedDate = $('#date-input').val();
        if (selectedDate) {
            fetchData_tempByDate(selectedDate);
        } else {
            alert('Please select a date.');
        }
    });

    // Initial data fetch
    fetchData_tempLeft();
    fetchData_tempRight();
    updateCharts2();
</script>

<script>
    //belum digunakan karena data typenya belum ditarik
    $.ajax({
        url: '<?= base_url('hsmline5/get/type/2') ?>',
        method: 'GET',
        success: function(response) {
            // Filter data untuk tipe 1 dan 2
            // const filteredData = response.data.filter(item =>
            //     item.L5_HSM2_TYPE_BATTERY === "1" || item.L5_HSM2_TYPE_BATTERY === "2"
            // );

            // // Mengisi input dengan data yang telah difilter
            // if (filteredData.length > 0) {
            //     $('#type1').val('N70LC375,LC238,LC300');
            //     $('#dandori1').val(filteredData[0].waktu);
            // }

            // if (filteredData.length > 1) {
            //     $('#type2').val('N70 MF');
            //     $('#dandori2').val(filteredData[1].waktu);
            // }

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

    // Inisialisasi variabel untuk menyimpan total
    let totalData1 = 0;
    let totalData2 = 0;

    // Fungsi untuk mengupdate total
    function updateTotal() {
        const totalKeseluruhan = totalData1 + totalData2;
        $('#total_hsm').text(totalKeseluruhan + ' Pcs');
    }

    // Permintaan AJAX pertama
    $.ajax({
        url: '<?= base_url('hsmline5/get/total/data1') ?>',
        method: 'GET',
        success: function(response) {
            console.log(response.data);

            totalData1 = response.data; // Simpan hasil data1
            updateTotal(); // Update total setelah mendapatkan data1
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });

    // Permintaan AJAX kedua
    $.ajax({
        url: '<?= base_url('hsmline5/get/total/data2') ?>',
        method: 'GET',
        success: function(response) {
            console.log(response.data);
            $('#total_pcs').val(response.data);
            totalData2 = response.data; // Simpan hasil data2
            updateTotal(); // Update total setelah mendapatkan data2
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });

    $.ajax({
        url: '<?= base_url('hsmline5/get/data/ok/2') ?>',
        method: 'GET',
        success: function(response) {
            // Misalnya, response adalah objek JSON yang Anda berikan
            var dataArray = response.data; // Ambil data dari response

            // Jika Anda ingin memastikan dataArray adalah array
            if (Array.isArray(dataArray)) {
                // Menampilkan data dengan indeks
                for (var i = 0; i < dataArray.length; i++) {
                    console.log('Index ' + i + ': ' + dataArray[i]);
                }
            } else {
                console.log('Data tidak dalam format array');
            }
            const now = new Date();
            const formattedSeconds = now.toLocaleString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            if (formattedSeconds < '07.30.00' && formattedSeconds > '00.30.00') {
                // Tambahkan kode yang ingin dijalankan jika waktu kurang dari 07.30.00
                $('#data_ok_parameter').val(dataArray[2]);
            } else if (formattedSeconds < '16.30.00' && formattedSeconds > '07.30.00') {
                $('#data_ok_parameter').val(dataArray[0]);
            } else if (formattedSeconds > '16.30.00' && formattedSeconds < '00.30.00') {
                $('#data_ok_parameter').val(dataArray[1]);
            }
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });
</script>

<script>
    let intervalId; // Untuk menyimpan ID interval

    function displayData(response) {
        // Proses data yang diterima
        // if (response.data['L5_HSM2_TYPE_BATTERY'] == '2') {
        //     $('#set_val_left').val('415-435');
        //     $('#set_val_right').val('415-435');
        // } else if (response.data['L5_HSM2_TYPE_BATTERY'] == '1') {
        //     $('#set_val_left').val('395-410');
        //     $('#set_val_right').val('395-410');
        // }
        $('#temp_left').val(response.data['L5_HSM2_TEMP_LEFT']);
        $('#temp_right').val(response.data['L5_HSM2_TEMP_RIGHT']);
        $('#set_value1').val(response.data['L5_HSM2_TEMP_SET_VALUE']);
        $('#set_value2').val(response.data['L5_HSM2_TEMP_SET_VALUE']);
        $('#standar_lid_holder_melting_pos').val(response.data['L5_HSM2_LID_HOLDER_MELTING_POS']);
        $('#actual_lid_holder_melting_pos').val(response.data['L5_HSM2_LID_HOLDER_MELTING_POS']);
        $('#actual_lid_holder_sealing_pos').val(response.data['L5_HSM2_LID_HOLDER_SEALING_POS']);
        $('#standar_lid_holder_sealing_pos').val(response.data['L5_HSM2_LID_HOLDER_SEALING_POS']);
        $('#standar_box_lifter_melting_pos').val(response.data['L5_HSM2_BOX_LIFTER_MELTING_POS']);
        $('#actual_box_lifter_melting_pos').val(response.data['L5_HSM2_BOX_LIFTER_MELTING_POS']);
        $('#standar_box_lifter_sealing_pos').val(response.data['L5_HSM2_BOX_LIFTER_SEALING_POS']);
        $('#actual_box_lifter_sealing_pos').val(response.data['L5_HSM2_BOX_LIFTER_SEALING_POS']);
        $('#standar_mirror_melting_pos').val(response.data['L5_HSM2_MIRROR_MELTING_POS']);
        $('#actual_mirror_melting_pos').val(response.data['L5_HSM2_MIRROR_MELTING_POS']);
        $('#actual_lid_melting_time').val(response.data['L5_HSM2_LID_MELTING_TIME']);
        $('#actual_box_melting_time').val(response.data['L5_HSM2_BOX_MELTING_TIME']);
        $('#actual_sealing_time').val(response.data['L5_HSM2_SEALING_TIME']);

        // if (response.data['L5_HSM2_TYPE_BATTERY'] == '2') {
        //     $('#standar_lid_melting_time').val('1-1.5');
        //     $('#standar_box_melting_time').val('4-6');
        //     $('#standar_sealing_time').val('4-8');
        //     // $('#battery_now').text('Produksi Battery Type (Now) : N70LC375,LC238,LC300');
        // } else if (response.data['L5_HSM2_TYPE_BATTERY'] == '1') {
        //     $('#standar_lid_melting_time').val('1-1.5');
        //     $('#standar_box_melting_time').val('4-6');
        //     $('#standar_sealing_time').val('4-8');
        //     // $('#battery_now').text('Produksi Battery Type (Now) : N70 MF');
        // }
    }

    function fetchData() {
        $.ajax({
            url: '<?= base_url('hsmline5/get/data/parameter/2') ?>',
            method: 'GET',
            success: function(response) {
                console.log(response)
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
        // const endTime = Date.now() + 3000; // 3 detik dari sekarang
        // intervalId = setInterval(() => {
        //     const randomNum = Math.floor(Math.random() * 100); // Angka acak antara 0-100
        //     $('[id^="actual_"]').val(randomNum); // Update semua elemen dengan ID yang diawali dengan "actual-"
        //     if (Date.now() >= endTime) {
        //         clearInterval(intervalId); // Hentikan animasi angka acak
        //         setTimeout(fetchData, 1000); // Tunggu 1 detik sebelum memanggil fetchData lagi
        //     }
        // }, 100); // Update setiap 100ms
        fetchData();
    }

    // Panggil fetchData untuk pertama kali saat halaman dimuat
    fetchData();
</script>
<?= $this->endSection() ?>