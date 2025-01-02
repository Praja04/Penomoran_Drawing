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
<div class="content-wrapper" style="margin-left:0px;margin-top:10px; background-color:#B4B4B8;">
    <div class="container-full">
        <div class="row align-items-start">
            <div class="col-xl-12 col-12 d-none" style="background-color: yellow; height:100px;">
                <section class="content"></section>
            </div>
            <div class="col-xl-12 col-12" style="background-color:#C7C8CC;">
                <div class="row d-flex flex-row" style="margin: 10px;">
                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tipe Battery" disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Dandori Time" disabled>
                        </div>
                        <div class="form-group">
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

                        <h5 id="battery_now"></h5>
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
                                        <h5 class="card-title">Output Ballmill 3</h5> <!-- Teks di tengah -->
                                        <h4 id="total_hsm"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3-5">
                        <div class="box-body" style="background-color:#F2EFE5;">
                            <h5 class="text-center">Ballmill 3 Detail</h5>
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
        <div class="col-xl-3 col-12" style="background-color:#B4B4B8;">
            <section class="content">

                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class="box" style="background-color:#B4B4B8;">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-5">
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
                                    <div class="col-md-4">
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black;">
                                                <h4>Actual</h4>
                                            </label>
                                            <input type="text" id="temp_left1" class="form-control mb-3" disabled style="width:60px;">
                                            <input type="text" id="temp_right1" class="form-control mb-3" disabled style="width:60px;">
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
        <div class="col-xl-9 col-12" style="background-color:#E3E1D9; border-radius:10px;">
            <section class="content">
                <div class="row">
                    <div class="col-xl-4 col-12">
                        <div class="box">
                            <div class="box-body">
                                <div id="temp_left"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="box">
                            <div class="box-body">
                                <div id="temp_right"></div>
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
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-12" style="margin:5px;">
                                        <label id="tanggal" style="display: none;">Date :</label>
                                        <input type="date" id="date-input" class="form-control" style="display: none;" />
                                    </div>
                                    <div class="col-xl-6 col-12" style="margin:5px;">
                                        <button class="btn btn-primary" id="fetch-data" style="display: none;">Fetch Data</button>
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
                    <div class="row" style="background-color:#E3E1D9;">
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
                                    <div id="container3" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container4" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container5" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container6" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container7" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container8" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container9" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body-->
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container10" style="height: 300px;"></div>
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
<!-- berat silo leadlump -->
<script>
    // Utility function to fetch data from API
    function fetchData(apiUrl, successCallback) {
        $.ajax({
            url: apiUrl,
            method: 'GET',
            dataType: 'json',
            success: successCallback,
            error: function(xhr, status, error) {
                console.error('Gagal mengambil data:', error);
            }
        });
    }

    // Utility function to process data for charts
    function processChartData(data, valueKeys) {
        const categories = [];
        const seriesData = valueKeys.map(() => []); // Initialize array for each key

        data.forEach(item => {
            const [datePart, timePart] = item.created_at.split(' ');
            const [year, month, day] = datePart.split('-');
            const [hours, minutes, seconds] = timePart.split(':');
            const date = new Date(year, month - 1, day, hours, minutes, seconds);

            const timeLabel = date.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });

            if (date.getMinutes() >= 50 || date.getMinutes() <= 10) {
                categories.push(timeLabel);
            } else {
                categories.push('');
            }

            valueKeys.forEach((key, index) => {
                seriesData[index].push({
                    y: item[key],
                    created_at: item.created_at
                });
            });
        });

        return {
            categories: categories.reverse(),
            seriesData: seriesData.map(data => data.reverse())
        };
    }

    // Utility function to render Highcharts
    function renderChart(containerId, title, yAxisTitle, categories, series) {
        Highcharts.chart(containerId, {
            chart: {
                type: 'line'
            },
            title: {
                text: title
            },
            xAxis: {
                categories: categories,
                title: {
                    text: 'Waktu'
                },
                labels: {
                    formatter: function() {
                        return this.value || ''; // Tampilkan hanya label relevan
                    }
                }
            },
            yAxis: {
                title: {
                    text: yAxisTitle
                }
            },
            series: series,
            tooltip: {
                shared: true,
                formatter: function() {
                    const points = this.points.map(point => `${point.series.name}: ${point.y} `);
                    const createdAt = this.points[0]?.point.created_at || 'N/A';
                    return `${points.join('<br>')}<br>Waktu: ${createdAt}`;
                }
            }
        });
    }

    // Fetch and render chart for Berat Silo Leadlump
    const now = new Date();
    const today = now.toISOString().split('T')[0];
    const apiUrl = `https://portal3.incoe.astra.co.id/production_control_v2/api/get_data_par_ballmill/4/${today}`;

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_w_silo_leadlump']);
        renderChart('container', 'Berat Silo Leadlump (Kg)', 'Nilai p_w_silo_leadlump', categories, [{
            name: 'p_w_silo_leadlump',
            data: seriesData[0]
        }]);
    });



    // Fetch and render chart for Berat Drum
    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_w_drum', 's_w_drum']);
        renderChart('container2', 'Berat Powder Drum (Kg)', 'Nilai Berat Drum (Kg)', categories, [{
                name: 'p_w_drum',
                data: seriesData[0],
                tooltip: {
                    pointFormat: 'p_w_drum: {point.y} Kg<br>'
                }
            },
            {
                name: 's_w_drum',
                data: seriesData[1],
                tooltip: {
                    pointFormat: 's_w_drum: {point.y} Kg<br>'
                }
            }
        ]);
    });

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_p_motor_drum', 's_p_motor_drum']);
        renderChart('container3', 'Beban Motor Drum (kW)', 'Nilai Berat Motor Drum (kW)', categories, [{
                name: 'p_p_motor_drum',
                data: seriesData[0],
                tooltip: {
                    pointFormat: 'p_p_motor_drum: {point.y} kW<br>'
                }
            },
            {
                name: 's_p_motor_drum',
                data: seriesData[1],
                tooltip: {
                    pointFormat: 's_p_motor_drum: {point.y} kW<br>'
                }
            }
        ]);
    });

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_dp_inlet', 's_dp_inlet']);
        renderChart('container4', 'Pressure Inlet (mmH2O)', 'Nilai Pressure Inlet (mmH2O)', categories, [{
                name: 'p_dp_inlet',
                data: seriesData[0],
                tooltip: {
                    pointFormat: 'p_dp_inlet: {point.y} mmH2O<br>'
                }
            },
            {
                name: 's_dp_inlet',
                data: seriesData[1],
                tooltip: {
                    pointFormat: 's_dp_inlet: {point.y} mmH2O<br>'
                }
            }
        ]);
    });

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_dp_filter']);
        renderChart('container5', 'Differential Pressure Filter (mmH2O)', 'Nilai Differential Pressure Filter (mmH2O)', categories, [{
            name: 'p_dp_filter',
            data: seriesData[0]
        }]);
    });

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_dp_hepa']);
        renderChart('container6', 'Differential Pressure Hepa (mmH2O)', 'Nilai Differential Pressure Hepa (mmH2O)', categories, [{
            name: 'p_dp_hepa',
            data: seriesData[0]
        }]);
    });

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_dp_blower']);
        renderChart('container7', 'Pressure Blower (mmH2O)', 'Nilai Pressure Blower (mmH2O)', categories, [{
            name: 'p_dp_blower',
            data: seriesData[0]
        }]);
    });

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_t_bearing']);
        renderChart('container8', 'Temperature Bearing (Celcius)', 'Nilai Temperature Bearing (Celcius)', categories, [{
            name: 'p_t_bearing',
            data: seriesData[0]
        }]);
    });

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['s_t_neck', 'p_t_neck1', 'p_t_neck2']);
        renderChart('container9', 'Temperature Neck (Celcius)', 'Nilai Temperature Neck (Celcius)', categories, [{
                name: 's_t_neck',
                data: seriesData[0],
                tooltip: {
                    pointFormat: 's_t_neck: {point.y} Kg<br>'
                }
            },
            {
                name: 'p_t_neck1',
                data: seriesData[1],
                tooltip: {
                    pointFormat: 'p_t_neck1: {point.y} Kg<br>'
                }
            }, {
                name: 'p_t_neck2',
                data: seriesData[2],
                tooltip: {
                    pointFormat: 'p_t_neck2: {point.y} Kg<br>'
                }
            }
        ]);
    });

    fetchData(apiUrl, function(data) {
        const {
            categories,
            seriesData
        } = processChartData(data, ['p_t_baghouse']);
        renderChart('container10', 'Temperature Beghouse (Celcius)', 'Nilai Temperature Baghouse (Celcius)', categories, [{
            name: 'p_t_baghouse',
            data: seriesData[0]
        }]);
    });
</script>




<?= $this->endSection() ?>