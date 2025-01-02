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
                                        <h5 class="card-title">Output Battery APB Line 6</h5> <!-- Teks di tengah -->
                                        <h4 id="total_alt"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3-5">
                        <div class="box-body" style="background-color:#F2EFE5;">
                            <h5 class="text-center">APB 2 Line 6 Detail</h5>
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
            <section class=" content">
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
                                            <input type="text" value="Right Temp" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Left Temp" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Cooling Time" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="First Dipping Time" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Weld Head Down Time" class="form-control mb-3" disabled style="width:120px;">
                                            <input type="text" value="Flame Waiting Time" class="form-control mb-3" disabled style="width:120px;">


                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black;">
                                                <h4>Standar</h4>
                                            </label>
                                            <input type="text" id="standar_temp_right" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_temp_left" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_cooling_time" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_first_dipping_time" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_weld_head_down_time" class="form-control mb-3" disabled style="width:100px;">
                                            <input type="text" id="standar_flame_waiting_time" class="form-control mb-3" disabled style="width:100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" style="display: flex;align-items: center;justify-content: center;color:black;">
                                                <h4>Actual</h4>
                                            </label>
                                            <input type="text" id="actual_temp_right" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_temp_left" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_cooling_time" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_first_dipping_time" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_weld_head_down_time" class="form-control mb-3" disabled style="width:80px;">
                                            <input type="text" id="actual_flame_waiting_time" class="form-control mb-3" disabled style="width:80px;">
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
                    <div class="row" style="background-color:#03346E;">
                        <div class="col-xl-12 col-12">
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
                        <div class="col-xl-12 col-12">
                            <div class=" box">
                                <div class=" box-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <div id="container2" style="height: 300px;"></div>
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
<!-- temp left and right -->
<script>
    // Variabel untuk ketiga chart
    let chart, chart3;
    const updateInterval = 100000;
    // Fungsi untuk right
    const fetchDataRight1 = () => {
        $.ajax({
            url: '<?= base_url('apbline6/get/temp/right2') ?>',
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
                const valuesSet = data.data.map(item => parseFloat(item.L6_APB2_TEMP_RIGHT_SETTING));
                const valuesRight = data.data.map(item => parseFloat(item.L6_APB2_TEMP_RIGHT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChart2(valuesStandardMinimal, valuesStandardMaksimal, 'container', chart, 'APB2 - TEMP RIGHT Actual', labels, valuesSet, 'L6_APB2_TEMP_RIGHT_SETTING', valuesRight, 'L6_APB2_TEMP_RIGHT_ACTUAL', (newChart) => {
                    chart = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right apb1:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk left
    const fetchDataLeft1 = () => {
        $.ajax({
            url: '<?= base_url('apbline6/get/temp/left2') ?>',
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
                const valuesSet = data.data.map(item => parseFloat(item.L6_APB2_TEMP_LEFT_SETTING));
                const valuesLeft = data.data.map(item => parseFloat(item.L6_APB2_TEMP_LEFT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChart2(valuesStandardMinimal, valuesStandardMaksimal, 'container2', chart3, 'APB2 - TEMP LEFT Actual', labels, valuesSet, 'L6_APB2_TEMP_LEFT_SETTING', valuesLeft, 'L6_APB2_TEMP_LEFT_ACTUAL', (newChart) => {
                    chart3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for apb 2 temp left:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk mengambil data berdasarkan tanggal
    const fetchDataByDate = (date) => {
        // Fetch untuk cell1
        $.ajax({
            url: `<?= base_url('apbline6/get/temp/right2/date/') ?>${date}`,
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
                const valuesSet = data.data.map(item => parseFloat(item.L6_APB2_TEMP_RIGHT_SETTING));
                const valuesRight = data.data.map(item => parseFloat(item.L6_APB2_TEMP_RIGHT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChart2(valuesStandardMinimal, valuesStandardMaksimal, 'container', chart, 'APB2 - TEMP RIGHT Actual', labels, valuesSet, 'L6_APB2_TEMP_RIGHT_SETTING', valuesRight, 'L6_APB2_TEMP_RIGHT_ACTUAL', (newChart) => {
                    chart = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right apb 2:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell3
        $.ajax({
            url: `<?= base_url('apbline6/get/temp/left2/date/') ?>${date}`,
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
                const valuesSet = data.data.map(item => parseFloat(item.L6_APB2_TEMP_LEFT_SETTING));
                const valuesLeft = data.data.map(item => parseFloat(item.L6_APB2_TEMP_LEFT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChart2(valuesStandardMinimal, valuesStandardMaksimal, 'container2', chart3, 'APB2 - TEMP LEFT Actual', labels, valuesSet, 'L6_APB2_TEMP_LEFT_SETTING', valuesLeft, 'L6_APB2_TEMP_LEFT_ACTUAL', (newChart) => {
                    chart3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left apb 2:', textStatus, errorThrown);
            }
        });

    };

    // Fungsi helper untuk membuat/update chart
    const updateOrCreateChart2 = (valuesStandardMinimalTemp, valuesStandardMaksimalTemp, containerId, chartInstance, title, labels, valuesSet, seriesName, valuesTemp, SeriesTemp, setChart, filteredLabels, originalLabels) => {
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
            chartInstance.series[1].setData(valuesTemp);
            chartInstance.series[2].setData(valuesStandardMaksimalTemp);
            chartInstance.series[3].setData(valuesStandardMinimalTemp);
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
                        text: 'Melting'
                    },

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
                }, {
                    name: SeriesTemp,
                    data: valuesTemp
                }, {
                    name: 'Nilai Maksimal',
                    data: valuesStandardMaksimalTemp
                }, {
                    name: 'Nilai Minimal',
                    data: valuesStandardMinimalTemp
                }]
            });
            setChart(newChart);
        }
    };

    const updateOrCreateChartweek = (valuesStandardMinimalTemp, valuesStandardMaksimalTemp, containerId, chartInstance, title, labels, valuesSet, seriesName, valuesTemp, SeriesTemp, setChart, filteredLabels, originalLabels) => {

        if (chartInstance) {
            chartInstance.series[0].setData(valuesSet);
            chartInstance.series[1].setData(valuesTemp);
            chartInstance.series[2].setData(valuesStandardMaksimalTemp);
            chartInstance.series[3].setData(valuesStandardMinimalTemp);
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
                }, {
                    name: SeriesTemp,
                    data: valuesTemp
                }, {
                    name: 'Nilai Maksimal',
                    data: valuesStandardMaksimalTemp
                }, {
                    name: 'Nilai Minimal',
                    data: valuesStandardMinimalTemp
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
            url: `<?= base_url('apbline6/data/temp/left2/week') ?>`,
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
                const valuesSet = data.data.map(item => parseFloat(item.L6_APB2_TEMP_LEFT_SETTING));
                const valuesLeft = data.data.map(item => parseFloat(item.L6_APB2_TEMP_LEFT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChartweek(valuesStandardMinimal, valuesStandardMaksimal, 'container2', chart3, 'APB2 - TEMP LEFT Actual', labels, valuesSet, 'L6_APB2_TEMP_LEFT_SETTING', valuesLeft, 'L6_APB2_TEMP_LEFT_ACTUAL', (newChart) => {
                    chart3 = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right apb 2:', textStatus, errorThrown);
            }
        });

        $.ajax({
            url: `<?= base_url('apbline6/data/temp/right2/week') ?>`,
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
                const valuesSet = data.data.map(item => parseFloat(item.L6_APB2_TEMP_RIGHT_SETTING));
                const valuesRight = data.data.map(item => parseFloat(item.L6_APB2_TEMP_RIGHT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChartweek(valuesStandardMinimal, valuesStandardMaksimal, 'container', chart, 'APB2 - TEMP RIGHT Actual', labels, valuesSet, 'L6_APB2_TEMP_RIGHT_SETTING', valuesRight, 'L6_APB2_TEMP_RIGHT_ACTUAL', (newChart) => {
                    chart = newChart;
                }, filteredLabels, data.data.map(item => item.waktu.split(' ')[1]));
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right apb 2:', textStatus, errorThrown);
            }
        });



    };



    const updateCharts = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchDataRight1();
            fetchDataLeft1();
            setTimeout(updateCharts, updateInterval);
        }
    };

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
    fetchDataRight1();
    fetchDataLeft1();
    updateCharts();
</script>
<!-- distinct temp -->
<script>
    let chart_tempLeft, chart_tempRight;
    let maxCount = 0; // Variabel untuk menyimpan nilai maksimum
    const fetchData_tempLeft = () => {
        $.ajax({
            url: '<?= base_url('apbline6/distinct/left2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_left', '<?= base_url('apbline6/distinct/left2') ?>', 'TEMP_Actual_LEFT_RANGE', 'Temperatur Left');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left apb2:', textStatus, errorThrown);
            }
        });
    };

    const fetchData_tempRight = () => {
        $.ajax({
            url: '<?= base_url('apbline6/distinct/right2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_right', '<?= base_url('apbline6/distinct/right2') ?>', 'TEMP_Actual_RIGHT_RANGE', 'Temperatur Right');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right apb2:', textStatus, errorThrown);
            }
        });
    };

    // Function to fetch data by date
    const fetchData_tempByDate = (date) => {
        // Fetch for right temperature
        $.ajax({
            url: `<?= base_url('apbline6/distinct/right2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_right', `<?= base_url('apbline6/distinct/right2/date/') ?>${date}`, 'TEMP_Actual_RIGHT_RANGE', 'Temperatur Right');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right apb 2:', textStatus, errorThrown);
            }
        });

        // Fetch for left temperature
        $.ajax({
            url: `<?= base_url('apbline6/distinct/left2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                createChart('temp_left', `<?= base_url('apbline6/distinct/left2/date/') ?>${date}`, 'TEMP_Actual_LEFT_RANGE', 'Temperatur Left');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left apb 2:', textStatus, errorThrown);
            }
        });
    };

    function createChart(containerId, apiUrl, xAxisLabel, titlegrafik) {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                // Memproses data untuk kategori dan hitungan
                const processedData = data.data.map(item => ({
                    // category: parseFloat(item[xAxisLabel]), // Ubah kategori menjadi float
                    category: item[xAxisLabel],
                    count: parseInt(item.count)
                }));

                // Mengurutkan berdasarkan kategori
                processedData.sort((a, b) => a.category - b.category);

                // Mendapatkan kategori dan jumlah terurut
                const categories = processedData.map(item => item.category);
                const counts = processedData.map(item => item.count);

                // Update nilai maksimum
                const currentMaxCount = Math.max(...counts);
                if (currentMaxCount > maxCount) {
                    maxCount = currentMaxCount;
                }

                // Menyimpan data grafik untuk kemudian digunakan
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
                type: 'column'
            },
            title: {
                text: `Grafik Bar ` + result
            },
            xAxis: {
                categories: categories,
                title: {
                    text: 'Temprature Left' // Ganti sesuai kebutuhan
                }
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
<!-- parameter data -->
<script>
    let intervalId; // Untuk menyimpan ID interval

    function displayData(response) {
        // Proses data yang diterima
        $('#standar_temp_right').val('25-50');
        $('#standar_temp_left').val('25-50');
        $('#standar_cooling_time').val('8.0-12');
        $('#standar_first_dipping_time').val(response.data['L6_APB2_FIRST_DIPPING_TIME']);
        $('#standar_weld_head_down_time').val(response.data['L6_APB2_WELD_HEAD_DOWN_TIME']);
        $('#standar_flame_waiting_time').val(response.data['L6_APB2_FLAME_WAITING_TIME']);

        $('#actual_temp_right').val(response.data['L6_APB2_TEMP_RIGHT_ACTUAL']);
        $('#actual_temp_left').val(response.data['L6_APB2_TEMP_LEFT_ACTUAL']);
        $('#actual_cooling_time').val(response.data['L6_APB2_COOLING_TIME']);
        $('#actual_first_dipping_time').val(response.data['L6_APB2_FIRST_DIPPING_TIME']);
        $('#actual_weld_head_down_time').val(response.data['L6_APB2_WELD_HEAD_DOWN_TIME']);
        $('#actual_flame_waiting_time').val(response.data['L6_APB2_FLAME_WAITING_TIME']);

    }

    function fetchData() {
        $.ajax({
            url: '<?= base_url('apbline6/get/parameter/2') ?>',
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
    let totalData1 = 0;
    let totalData2 = 0;

    // Fungsi untuk mengupdate total
    function updateTotal() {
        const totalKeseluruhan = totalData1 + totalData2;
        $('#total_alt').text(totalKeseluruhan + ' Pcs');
    }

    // Permintaan AJAX pertama
    $.ajax({
        url: '<?= base_url('apbline6/get/total/data/1') ?>',
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
            updateTotal(); // Update total setelah mendapatkan data1
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });

    // Permintaan AJAX kedua
    $.ajax({
        url: '<?= base_url('apbline6/get/total/data/2') ?>',
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
            $('#total_pcs').val(totalData2);
            updateTotal(); // Update total setelah mendapatkan data2
        },
        error: function(error) {
            console.error('Ada masalah dengan pengambilan data:', error);
        }
    });
</script>

<!-- parameter -->
<script>
    $.ajax({
        url: '<?= base_url('hsmline6/get/type/2') ?>',
        method: 'GET',
        success: function(response) {
            // Filter data untuk tipe 1 dan 2
            const filteredData = response.data.filter(item =>
                item.L6_HSM2_TYPE_BATTERY === "0" || item.L6_HSM2_TYPE_BATTERY === "1" || item.L6_HSM2_TYPE_BATTERY === "2"
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
<?= $this->endSection() ?>