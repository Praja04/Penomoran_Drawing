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


    table tr {
        font-size: smaller;
    }

    /* HP (Smartphone) - Portrait Mode (<= 576px) */
    @media (max-width: 576px) {
        .table1 {
            display: flex;

            justify-content: center;

            align-items: center;

        }

        .table2 {
            display: flex;
            /* Aktifkan Flexbox di dalam box (opsional) */
            justify-content: center;
            /* Tengahkan konten dalam box secara horizontal */
            align-items: center;
            /* Tengahkan konten dalam box secara vertikal */
            text-align: center;
        }

        .table3 {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: fit-content;

        }

        .head3-5 {
            flex: 0 0 100%;
            max-width: 100%;
            margin-top: 10px;
        }

        .head1-5 {
            display: none;
        }

        .head1 {
            display: none;
        }

    }

    /* Tablet (Landscape & Portrait) - (> 576px and <= 768px) */
    @media (min-width: 577px) and (max-width: 768px) {
        .table1 {
            display: flex;

            justify-content: center;

            align-items: center;

        }

        .table2 {
            display: flex;
            /* Aktifkan Flexbox di dalam box (opsional) */
            justify-content: center;
            /* Tengahkan konten dalam box secara horizontal */
            align-items: center;
            /* Tengahkan konten dalam box secara vertikal */
            text-align: center;
        }

        .table3 {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: fit-content;

        }

        .head3-5 {
            flex: 0 0 100%;
            max-width: 100%;
            margin-top: 10px;
        }

        .head1-5 {
            display: none;
        }

        .head1 {
            display: none;
        }
    }

    /* Laptop & Small Desktop (> 768px and <= 992px) */
    @media (min-width: 769px) and (max-width: 992px) {
        .table1 {
            display: flex;

            justify-content: center;

            align-items: center;

        }

        .table2 {
            display: flex;
            /* Aktifkan Flexbox di dalam box (opsional) */
            justify-content: center;
            /* Tengahkan konten dalam box secara horizontal */
            align-items: center;
            /* Tengahkan konten dalam box secara vertikal */
            text-align: center;
        }

        .table3 {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;

        }

        .head1-5 {
            display: none;
        }

        .head1 {
            display: none;
        }

        .head3 {
            width: max-content;
        }

        .head3-5 {
            flex: 0 0 100%;
            max-width: 37.08%;
        }
    }
</style>

<?= $this->endSection() ?>
<?= $this->section('content'); ?>
<div class="content-wrapper" style="margin-left:0px;margin-top:10px; background-color:#03346E;">
    <div class="container-full">
        <div class="row align-items-start">

            <div class="col-xl-12 col-12" style="background-color:#03346E;">
                <div class="row d-flex flex-row" style="margin: 10px;">
                    <div class="col-md-1 head1">
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
                    <div class="col-md-1-5 head1-5">
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

                        <h5 style="color:white;" id="battery_now"></h5>
                    </div>
                    <div class="col-md-1-5 head1-5">
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
                    <div class="col-md-1-5 head1-5">
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
                    <div class="col-md-3 head3">
                        <div class="box-body" style="background-color:#C7C8CC; ">
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
                                        <h5 class="card-title">Output Battery HSM Line 6</h5> <!-- Teks di tengah -->
                                        <h4 id="total_hsm"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3-5 head3-5">
                        <div class="box-body" style="background-color:#C7C8CC;">
                            <h5 class="text-center">HSM 1 Line 6 Detail</h5>
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

                <div class="row table1">
                    <div class="col-lg-12 col-12 table2">
                        <div class="box table3">
                            <div class="box-body py-0">
                                <div class="table-responsive">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="fw-600">Parameter</td>
                                                <td class="fw-600">Standar</td>
                                                <td class="fw-600">Set Val</td>
                                                <td class="fw-600">Actual</td>

                                            </tr>
                                            <tr>
                                                <td class="fw-800">Temp Left</td>
                                                <td class="fw-600">
                                                    <input type="text" id="set_val_left" class="form-control mb-3" disabled style="width:60px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="set_value1" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="temp_left1" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Temp Right</td>
                                                <td class="fw-600">
                                                    <input type="text" id="set_val_right" class="form-control mb-3" disabled style="width:60px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="set_value2" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="temp_right1" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-900"> <span class="badge badge-sm  badge-warning me-10">Lid Holder</span></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Melting Pos</td>
                                                <td class="fw-600">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="standar_lid_holder_melting_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="actual_lid_holder_melting_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Sealing Pos</td>
                                                <td class="fw-600">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="standar_lid_holder_sealing_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="actual_lid_holder_sealing_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-1000"></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-900"> <span class="badge badge-sm  badge-warning me-10">Box Lifter</span></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Melting Pos</td>
                                                <td class="fw-600">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="standar_box_lifter_melting_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="actual_box_lifter_melting_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Sealing Pos</td>
                                                <td class="fw-600">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="standar_box_lifter_sealing_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="actual_box_lifter_sealing_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-900"> <span class="badge badge-sm  badge-warning me-10">Mirror</span></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Melting Pos</td>
                                                <td class="fw-600">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="standar_mirror_melting_pos" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                                <td class="fw-600">
                                                    <input type="text" id="actual_mirror_melting_pos" class="form-control mb-3" disabled style="width:50px;">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-900"> <span class="badge badge-sm  badge-warning me-10">Time</span></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Lid Melting</td>
                                                <td class="fw-600">
                                                </td>
                                                <td class="fw-600"></td>
                                                <td class="fw-600">
                                                    <input type="text" id="actual_lid_melting_time" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Box Melting</td>
                                                <td class="fw-600">
                                                </td>
                                                <td class="fw-600"></td>
                                                <td class="fw-600">
                                                    <input type="text" id="actual_box_melting_time" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-800">Sealing</td>
                                                <td class="fw-600">
                                                </td>
                                                <td class="fw-600"></td>
                                                <td class="fw-600">
                                                    <input type="text" id="actual_sealing_time" class="form-control mb-3" disabled style="width:50px;">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xl-9 col-12" style="background-color:#03346E; ">
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
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CP/PP</span>
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
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CP/PP</span>
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
                </div>
            </section>
        </div>
        <div class="row">
            <div class="col-xl-12 col-12" style="margin:10px;">
                <div class="box">
                    <div class=" box-header with-border">
                    </div>
                    <div class="box-body">
                        <!-- <div id="interactive" style="height: 300px;"></div> -->
                        <div id="container" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
            </div>
            <div class="col-xl-12 col-12" style="margin:10px;">
                <div class=" box">
                    <div class=" box-body">
                        <!-- <div id="interactive" style="height: 300px;"></div> -->
                        <div id="container2" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
            </div>
            <div class="col-xl-12 col-12" style="margin:10px;">
                <div class=" box">
                    <div class=" box-body">
                        <!-- <div id="interactive" style="height: 300px;"></div> -->
                        <div id="lidholder" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
            </div>
            <div class="col-xl-12 col-12" style="margin:10px;">
                <div class=" box">
                    <div class=" box-body">
                        <!-- <div id="interactive" style="height: 300px;"></div> -->
                        <div id="boxlifter" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
            </div>
            <div class="col-xl-12 col-12" style="margin:10px;">
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
    let chart, chart3, chart_lidholder, chart_boxlifter, chart_mirror, chart_tempLeft, chart_tempRight;
    let maxCount = 0;
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
            url: '<?= base_url('hsmline6/get/data/lid_holder_melting/1') ?>',
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
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_LID_HOLDER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_LID_HOLDER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('lidholder', chart_lidholder, 'Lid Holder Position', labels, valuesActual, 'L6_HSM1_LID_HOLDER_ACTUAL_POS', valuesMelting, 'L6_HSM1_LID_HOLDER_MELTING_POS', (newChart) => {
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
            url: '<?= base_url('hsmline6/get/data/box_lifter_melting/1') ?>',
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
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_BOX_LIFTER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_BOX_LIFTER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('boxlifter', chart_boxlifter, 'Box Lifter Position', labels, valuesActual, 'L6_HSM1_BOX_LIFTER_ACTUAL_POS', valuesMelting, 'L6_HSM1_BOX_LIFTER_MELTING_POS', (newChart) => {
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
            url: '<?= base_url('hsmline6/get/data/mirror_pos/1') ?>',
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
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_MIRROR_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_MIRROR_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('mirrorpos', chart_mirror, 'Mirror Position', labels, valuesActual, 'L6_HSM1_MIRROR_ACTUAL_POS', valuesMelting, 'L6_HSM1_MIRROR_MELTING_POS', (newChart) => {
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
            url: `<?= base_url('hsmline6/get/temp/right1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                if (!data.data || data.data.length === 0) {
                    alert('Data Kosong tanggal : ' + date);
                    console.log('No data received or data is empty');
                    updateOrCreateChart(
                        'container', chart, 'TEMP RIGHT',
                        [], [], 'L6_HSM1_TEMP_SET_VALUE',
                        [], 'L6_HSM1_TEMP_RIGHT',
                        (newChart) => {
                            chart = newChart;
                        },
                        [], [], [], []
                    );
                    return;
                }

                // Filter data yang valid
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);

                const labels = validData.map(item => item.waktu);
                const valuesSet = validData.map(item => parseFloat(item.L6_HSM1_TEMP_SET_VALUE));
                const valuesRight = validData.map(item => parseFloat(item.L6_HSM1_TEMP_RIGHT));
                const valuesStandar = validData.map(item => parseFloat(item.L6_HSM1_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);

                updateOrCreateChart(
                    'container', chart, 'TEMP RIGHT',
                    labels, valuesSet, 'L6_HSM1_TEMP_SET_VALUE',
                    valuesRight, 'L6_HSM1_TEMP_RIGHT',
                    (newChart) => {
                        chart = newChart;
                    },
                    upper, lower, filteredLabels, validData.map(item => item.waktu.split(' ')[1])
                );
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell3
        $.ajax({
            url: `<?= base_url('hsmline6/get/temp/left1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                if (!data.data || data.data.length === 0) {
                    console.log('No data received or data is empty');
                    updateOrCreateChart(
                        'container2', chart3, 'TEMP LEFT',
                        [], [], 'L6_HSM1_TEMP_SET_VALUE',
                        [], 'L6_HSM1_TEMP_LEFT',
                        (newChart) => {
                            chart3 = newChart;
                        },
                        [], [], [], []
                    );
                    return;
                }

                // Filter data yang valid
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja


                console.log(filteredLabels);
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_SET_VALUE));
                const valuesLeft = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_LEFT));
                const valuesStandar = data.data.map(item => parseFloat(item.L6_HSM1_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChart('container2', chart3, 'TEMP LEFT', labels, valuesSet, 'L6_HSM1_TEMP_SET_VALUE', valuesLeft, 'L6_HSM1_TEMP_LEFT', (newChart) => {
                    chart3 = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1:', textStatus, errorThrown);
            }
        });

        //lidholder
        $.ajax({
            url: `<?= base_url('hsmline6/get/data/lid_holder_melting1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                if (!data.data || data.data.length === 0) {
                    console.log('No data received or data is empty');
                    updateOrCreateChartMelting(
                        'lidholder', chart_lidholder, 'Lid Holder Position',
                        [], [], 'L6_HSM1_LID_HOLDER_ACTUAL_POS',
                        [], 'L6_HSM1_LID_HOLDER_MELTING_POS',
                        (newChart) => {
                            chart_lidholder = newChart;
                        },
                        [], []
                    );
                    return;

                }

                // Filter data yang valid
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);



                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_LID_HOLDER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_LID_HOLDER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('lidholder', chart_lidholder, 'Lid Holder Position', labels, valuesActual, 'L6_HSM1_LID_HOLDER_ACTUAL_POS', valuesMelting, 'L6_HSM1_LID_HOLDER_MELTING_POS', (newChart) => {
                    chart_lidholder = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1:', textStatus, errorThrown);
            }
        });
        //boxlifter
        $.ajax({
            url: `<?= base_url('hsmline6/get/data/box_lifter_melting1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                if (!data.data || data.data.length === 0) {
                    console.log('No data received or data is empty');
                    updateOrCreateChartMelting(
                        'boxlifter', chart_boxlifter, 'Box Lifter Position',
                        [], [], 'L6_HSM1_BOX_LIFTER_ACTUAL_POS',
                        [], 'L6_HSM1_BOX_LIFTER_MELTING_POS',
                        (newChart) => {
                            chart_boxlifter = newChart;
                        },
                        [], []
                    );
                    return;

                }

                // Filter data yang valid
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_BOX_LIFTER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_BOX_LIFTER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('boxlifter', chart_boxlifter, 'Box Lifter Position', labels, valuesActual, 'L6_HSM1_BOX_LIFTER_ACTUAL_POS', valuesMelting, 'L6_HSM1_BOX_LIFTER_MELTING_POS', (newChart) => {
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
            url: `<?= base_url('hsmline6/get/data/mirror_pos1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                if (!data.data || data.data.length === 0) {
                    console.log('No data received or data is empty');
                    updateOrCreateChartMelting(
                        'mirrorpos', chart_mirror, 'Mirror Position',
                        [], [], 'L6_HSM1_MIRROR_ACTUAL_POS',
                        [], 'L6_HSM1_MIRROR_MELTING_POS',
                        (newChart) => {
                            chart_mirror = newChart;
                        },
                        [], []
                    );

                }

                // Filter data yang valid
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_MIRROR_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_MIRROR_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMelting('mirrorpos', chart_mirror, 'Mirror Position', labels, valuesActual, 'L6_HSM1_MIRROR_ACTUAL_POS', valuesMelting, 'L6_HSM1_MIRROR_MELTING_POS', (newChart) => {
                    chart_mirror = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1:', textStatus, errorThrown);
            }
        });


        //distinct
        // Fetch for right temperature
        $.ajax({
            url: `<?= base_url('hsmline6/distinct/right1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_right', `<?= base_url('hsmline6/distinct/right1/date/') ?>${date}`, 'TEMP_RIGHT_RANGE', 'Temperatur Right');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        // Fetch for left temperature
        $.ajax({
            url: `<?= base_url('hsmline6/distinct/left1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_left', `<?= base_url('hsmline6/distinct/left1/date/') ?>${date}`, 'TEMP_LEFT_RANGE', 'Temperatur Left');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1:', textStatus, errorThrown);
            }
        });
        //end distinct
    };


    // Fungsi untuk right
    const fetchDataRight1 = () => {
        $.ajax({
            url: '<?= base_url('hsmline6/get/temp/right1') ?>',
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
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_SET_VALUE));
                const valuesRight = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_RIGHT));
                const valuesStandar = data.data.map(item => parseFloat(item.L6_HSM1_TYPE_BATTERY));

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
                    'L6_HSM1_TEMP_SET_VALUE',
                    valuesRight,
                    'L6_HSM1_TEMP_RIGHT',
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
            url: '<?= base_url('hsmline6/get/temp/left1') ?>',
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
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_SET_VALUE));
                const valuesLeft = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_LEFT));
                const valuesStandar = data.data.map(item => parseFloat(item.L6_HSM1_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChart('container2', chart3, 'TEMP LEFT', labels, valuesSet, 'L6_HSM1_TEMP_SET_VALUE', valuesLeft, 'L6_HSM1_TEMP_LEFT', (newChart) => {
                    chart3 = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });
    };


    const fetchDataByWeek = (selectedDate, selectedDate2) => {
        // Fetch 
        var fd = new FormData();
        fd.append('date1', selectedDate);
        fd.append('date2', selectedDate2);

        $.ajax({
            url: `<?= base_url('hsmline6/data/temp/right1/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (!data.data || data.data.length === 0) {
                    alert('Data Kosong tanggal : ' + selectedDate + ' s/d ' + selectedDate2);
                    console.log('No data received or data is empty');
                    updateOrCreateChart(
                        'container', chart, 'TEMP RIGHT',
                        [], [], 'L6_HSM1_TEMP_SET_VALUE',
                        [], 'L6_HSM1_TEMP_RIGHT',
                        (newChart) => {
                            chart = newChart;
                        },
                        [], [], [], []
                    );
                    return;
                }

                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_SET_VALUE));
                const valuesRight = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_RIGHT));
                const valuesStandar = data.data.map(item => parseFloat(item.L6_HSM1_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChartweek('container', chart, 'TEMP RIGHT', labels, valuesSet, 'L6_HSM1_TEMP_SET_VALUE', valuesRight, 'L6_HSM1_TEMP_RIGHT', (newChart) => {
                    chart = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('hsmline6/data/temp/left1/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (!data.data || data.data.length === 0) {
                    console.log('No data received or data is empty');
                    updateOrCreateChart(
                        'container2', chart3, 'TEMP LEFT',
                        [], [], 'L6_HSM1_TEMP_SET_VALUE',
                        [], 'L6_HSM1_TEMP_LEFT',
                        (newChart) => {
                            chart3 = newChart;
                        },
                        [], [], [], []
                    );
                    return;
                }
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_SET_VALUE));
                const valuesLeft = data.data.map(item => parseFloat(item.L6_HSM1_TEMP_LEFT));
                const valuesStandar = data.data.map(item => parseFloat(item.L6_HSM1_TYPE_BATTERY));

                // Create upper and lower arrays based on valuesStandar
                const upper = valuesStandar.map(value => (value === 0 || value === 2) ? 435 : 425);
                const lower = valuesStandar.map(value => (value === 0 || value === 2) ? 415 : 405);
                updateOrCreateChartweek('container2', chart, 'TEMP LEFT', labels, valuesSet, 'L6_HSM1_TEMP_SET_VALUE', valuesLeft, 'L6_HSM1_TEMP_LEFT', (newChart) => {
                    chart = newChart;
                }, upper, lower, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('hsmline6/data/lid_holder1/pos/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (!data.data || data.data.length === 0) {
                    console.log('No data received or data is empty');
                    updateOrCreateChartMelting(
                        'lidholder', chart_lidholder, 'Lid Holder Position',
                        [], [], 'L6_HSM1_LID_HOLDER_ACTUAL_POS',
                        [], 'L6_HSM1_LID_HOLDER_MELTING_POS',
                        (newChart) => {
                            chart_lidholder = newChart;
                        },
                        [], []
                    );
                    return;

                }
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);

                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_LID_HOLDER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_LID_HOLDER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMeltingweek('lidholder', chart_lidholder, 'Lid Holder Position', labels, valuesActual, 'L6_HSM1_LID_HOLDER_ACTUAL_POS', valuesMelting, 'L6_HSM1_LID_HOLDER_MELTING_POS', (newChart) => {
                    chart_lidholder = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));

            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('hsmline6/data/box_lifter1/pos/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (!data.data || data.data.length === 0) {
                    console.log('No data received or data is empty');
                    updateOrCreateChartMelting(
                        'boxlifter', chart_boxlifter, 'Box Lifter Position',
                        [], [], 'L6_HSM1_BOX_LIFTER_ACTUAL_POS',
                        [], 'L6_HSM1_BOX_LIFTER_MELTING_POS',
                        (newChart) => {
                            chart_boxlifter = newChart;
                        },
                        [], []
                    );
                    return;

                }
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);

                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_BOX_LIFTER_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_BOX_LIFTER_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMeltingweek('boxlifter', chart_boxlifter, 'Box Lifter Position', labels, valuesActual, 'L6_HSM1_BOX_LIFTER_ACTUAL_POS', valuesMelting, 'L6_HSM1_BOX_LIFTER_MELTING_POS', (newChart) => {
                        chart_boxlifter = newChart;
                    },
                    filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));

            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('hsmline6/data/mirror1/pos/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (!data.data || data.data.length === 0) {
                    console.log('No data received or data is empty');
                    updateOrCreateChartMelting(
                        'mirrorpos', chart_mirror, 'Mirror Position',
                        [], [], 'L6_HSM1_MIRROR_ACTUAL_POS',
                        [], 'L6_HSM1_MIRROR_MELTING_POS',
                        (newChart) => {
                            chart_mirror = newChart;
                        },
                        [], []
                    );

                }
                const validData = data.data.filter(item => item && item.waktu);

                const time = validData.map(item => item.waktu);
                const targets = ['07:30', '16:30', '00:30']; // Target waktu

                // Fungsi untuk mencari waktu paling dekat dengan target
                const findClosestTime = (data, target) => {
                    let closest = null;
                    let closestDiff = Infinity;

                    data.forEach(item => {
                        if (!item || !item.waktu) return;
                        const itemTime = item.waktu.split(' ')[1];
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
                const filteredData = targets.map(target => findClosestTime(validData, target));

                // Ambil label untuk sumbu x dari data yang difilter
                const filteredLabels = filteredData.map(item => item?.waktu?.split(' ')[1] || 'N/A'); // Jam saja
                console.log(filteredLabels);


                const labels = data.data.map(item => item.waktu);
                const valuesActual = data.data.map(item => parseFloat(item.L6_HSM1_MIRROR_ACTUAL_POS));
                const valuesMelting = data.data.map(item => parseFloat(item.L6_HSM1_MIRROR_MELTING_POS));


                // Create upper and lower arrays based on valuesStandar

                updateOrCreateChartMeltingweek('mirrorpos', chart_mirror, 'Mirror Position', labels, valuesActual, 'L6_HSM1_MIRROR_ACTUAL_POS', valuesMelting, 'L6_HSM1_MIRROR_MELTING_POS', (newChart) => {
                    chart_mirror = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));

            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        //distinct
        $.ajax({
            url: `<?= base_url('hsmline6/distinct/left1/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {

                const processedData = data.data.map(item => ({
                    category: item['TEMP_LEFT_RANGE'],
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
                    containerId: 'temp_left',
                    categories: categories,
                    counts: counts,
                    result: 'Temperatur LEFT'
                };

                drawChart(chartData);
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 1 distinct:', textStatus, errorThrown);
            }
        });
        $.ajax({
            url: `<?= base_url('hsmline6/distinct/right1/week') ?>`,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                const processedData = data.data.map(item => ({
                    category: item['TEMP_RIGHT_RANGE'],
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
                    containerId: 'temp_right',
                    categories: categories,
                    counts: counts,
                    result: 'Temperatur RIGHT'
                };

                drawChart(chartData);
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1 distinct:', textStatus, errorThrown);
            }
        });
        //end distinct

    };

    //distinct
    const fetchData_tempLeft = () => {
        $.ajax({
            url: '<?= base_url('hsmline6/distinct/left1') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_left', '<?= base_url('hsmline6/distinct/left1') ?>', 'TEMP_LEFT_RANGE', 'Temperatur Left');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm1:', textStatus, errorThrown);
            }
        });
    };

    const fetchData_tempRight = () => {
        $.ajax({
            url: '<?= base_url('hsmline6/distinct/right1') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_right', '<?= base_url('hsmline6/distinct/right1') ?>', 'TEMP_RIGHT_RANGE', 'Temperatur Right');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm1:', textStatus, errorThrown);
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
                height: 400
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
                max: maxCount, // Set maximum Y-axis value
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
    //end distinct


    // Fungsi update untuk realtime
    const updateCharts = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchDataRight1();
            fetchDataLeft1();
            fetchDataLidHolder();
            fetchDataBoxLifter();
            fetchDataMirrorPos();
            fetchData_tempLeft();
            fetchData_tempRight();
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
            chart = chart3 = chart5 = chartresult1 = chartresult3 = chartresult5 = chart_tempLeft = chart_tempRight = null;
        } else if (selectedSource === 'week') {
            $('#date-input').hide();
            $('#fetch-data').hide();
            $('#tanggal').hide();
            $('#date-input-week').show();
            $('#tanggal-week').show();
            $('#date-input-week2').show();
            $('#tanggal-week2').show();
            $('#fetch-data-week').show();
            chart = chart3 = chart5 = chartresult1 = chartresult3 = chartresult5 = chart_tempLeft = chart_tempRight = null;
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
    fetchDataRight1();
    fetchDataLeft1();
    fetchDataLidHolder();
    fetchDataBoxLifter();
    fetchDataMirrorPos();
    updateCharts();
    fetchData_tempLeft();
    fetchData_tempRight();
</script>

<script>
    $.ajax({
        url: '<?= base_url('hsmline6/get/type/1') ?>',
        method: 'GET',
        success: function(response) {
            // Filter data untuk tipe 1 dan 2
            const filteredData = response.data.filter(item =>
                item.L6_HSM1_TYPE_BATTERY === 0 || item.L6_HSM1_TYPE_BATTERY === 1 || item.L6_HSM1_TYPE_BATTERY === 2
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
        url: '<?= base_url('hsmline6/get/total/data1') ?>',
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
            updateTotal(); // Update total setelah mendapatkan data1
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });

    // Permintaan AJAX kedua
    $.ajax({
        url: '<?= base_url('hsmline6/get/total/data2') ?>',
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
        url: '<?= base_url('hsmline6/get/data/ok/1') ?>',
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
    });
</script>

<script>
    let intervalId; // Untuk menyimpan ID interval

    function displayData(response) {
        // Proses data yang diterima
        if (response.data['L6_HSM1_TYPE_BATTERY'] == '2' || response.data['L6_HSM1_TYPE_BATTERY'] == '0') {
            $('#set_val_left').val('415-435');
            $('#set_val_right').val('415-435');
            $('#standar_lid_melting_time').val('1-1.5');
            $('#standar_box_melting_time').val('4-6');
            $('#standar_sealing_time').val('4-8');
            $('#battery_now').text('Produksi Battery Type (Now) : N70LC375,LC238,LC300');
        } else if (response.data['L6_HSM1_TYPE_BATTERY'] == '1') {
            $('#set_val_left').val('395-410');
            $('#set_val_right').val('395-410');
            $('#standar_lid_melting_time').val('1-1.5');
            $('#standar_box_melting_time').val('4-6');
            $('#standar_sealing_time').val('4-8');
            $('#battery_now').text('Produksi Battery Type (Now) : N70 MF');

        }

        $('#temp_left1').val(response.data['L6_HSM1_TEMP_LEFT']);
        $('#temp_right1').val(response.data['L6_HSM1_TEMP_RIGHT']);
        $('#set_value1').val(response.data['L6_HSM1_TEMP_SET_VALUE']);
        $('#set_value2').val(response.data['L6_HSM1_TEMP_SET_VALUE']);
        $('#standar_lid_holder_melting_pos').val(response.data['L6_HSM1_LID_HOLDER_MELTING_POS']);
        $('#actual_lid_holder_melting_pos').val(response.data['L6_HSM1_LID_HOLDER_MELTING_POS']);
        $('#actual_lid_holder_sealing_pos').val(response.data['L6_HSM1_LID_HOLDER_SEALING_POS']);
        $('#standar_lid_holder_sealing_pos').val(response.data['L6_HSM1_LID_HOLDER_SEALING_POS']);
        $('#standar_box_lifter_melting_pos').val(response.data['L6_HSM1_BOX_LIFTER_MELTING_POS']);
        $('#actual_box_lifter_melting_pos').val(response.data['L6_HSM1_BOX_LIFTER_MELTING_POS']);
        $('#standar_box_lifter_sealing_pos').val(response.data['L6_HSM1_BOX_LIFTER_SEALING_POS']);
        $('#actual_box_lifter_sealing_pos').val(response.data['L6_HSM1_BOX_LIFTER_SEALING_POS']);
        $('#standar_mirror_melting_pos').val(response.data['L6_HSM1_MIRROR_MELTING_POS']);
        $('#actual_mirror_melting_pos').val(response.data['L6_HSM1_MIRROR_MELTING_POS']);
        $('#actual_lid_melting_time').val(response.data['L6_HSM1_LID_MELTING_TIME']);
        $('#actual_box_melting_time').val(response.data['L6_HSM1_BOX_MELTING_TIME']);
        $('#actual_sealing_time').val(response.data['L6_HSM1_SEALING_TIME']);


    }

    function fetchData() {
        $.ajax({
            url: '<?= base_url('hsmline6/get/data/parameter/1') ?>',
            method: 'GET',
            success: function(response) {
                console.log(response);
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
        //Tampilkan animasi angka acak selama 3 detik
        const endTime = Date.now() + 3000; // 3 detik dari sekarang
        intervalId = setInterval(() => {
            const randomNum = Math.floor(Math.random() * 100); // Angka acak antara 0-100
            $('[id^="actual_"]').val(randomNum); // Update semua elemen dengan ID yang diawali dengan "actual-"
            if (Date.now() >= endTime) {
                clearInterval(intervalId); // Hentikan animasi angka acak
                setTimeout(fetchData, 10000); // Tunggu 1 detik sebelum memanggil fetchData lagi
            }
        }, 100); // Update setiap 100ms
        // fetchData();
    }

    // Panggil fetchData untuk pertama kali saat halaman dimuat
    fetchData();
</script>

<?= $this->endSection() ?>