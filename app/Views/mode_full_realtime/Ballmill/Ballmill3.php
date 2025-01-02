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

    <!-- Main content -->
    <div class="row align-items-start">

        <div class="col-xl-12 col-12" style="background-color:#E3E1D9; border-radius:10px;">
            <section class="content">
                <div class="row">
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
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">not yet</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-12">
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPK/PPK</span>
                                    </div>
                                    <div class="col-xl-6 col-12">
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">not yet</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a data-bs-toggle="modal" data-bs-target="#modal-center5" title="Menu Line 5" class="waves-effect waves-light btn btn-success btn-flat mb-5 btn-sm">
                                <span class="icon-Menu"><span class="path1"></span><span class="path2"></span></span>Line5
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#modal-center6" title="Menu Line 6" class="waves-effect waves-light btn btn-primary btn-flat mb-5 btn-sm">
                                <span class="icon-Menu"><span class="path1"></span><span class="path2"></span></span>Line6
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#modal-center-ballmill" title="Menu Ballmill" class="waves-effect waves-light btn btn-warning btn-flat mb-5 btn-sm">
                                <span class="icon-Menu"><span class="path1"></span><span class="path2"></span></span>Ballmill
                            </a>
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
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">not yet</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-12">
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">CPK/PPK</span>
                                    </div>
                                    <div class="col-xl-6 col-12">
                                        <span class="waves-effect waves-light btn btn-outline btn-dark mb-5 w-140 d-block text-center">not yet</span>
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
<div class="modal center-modal fade" id="modal-center-ballmill" tabindex="-1">
    <div class="modal-dialog col-12 col-lg-12 ">
        <div class="modal-content" style="background-color:transparant;border-radius:10px;">
            <div class="modal-header">
                <h5 class="modal-title">Menu Ballmill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('ballmill/dashboard/3') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>Ballmill 3</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-6 pull-up">
                    <div class="box ribbon-box">
                        <div class="box-header no-border p-5 text-center">
                            <a href="<?= base_url('ballmill/dashboard/4') ?>">
                                <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                            </a>
                            <p>Ballmill 4</p>
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
                zoomType: 'x',
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

    // Default date (today)
    const now = new Date();
    const today = now.toISOString().split('T')[0];

    // Fetch and render charts for default date
    function fetchDefaultData() {
        const apiUrl = `https://portal3.incoe.astra.co.id/production_control_v2/api/get_data_par_ballmill2/3/${today}`;
        fetchAllCharts(apiUrl);
    }

    // Fetch and render charts for selected date
    function fetchDataByDate(selectedDate) {
        const apiUrl = `https://portal3.incoe.astra.co.id/production_control_v2/api/get_data_par_ballmill2/3/${selectedDate}`;
        fetchAllCharts(apiUrl);
    }

    // Fetch and render all charts
    function fetchAllCharts(apiUrl) {
        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_w_silo_leadlump', 's_w_silo_leadlump']);
            renderChart('container', 'Berat Silo Leadlump (kg)', 'Nilai Aktual Berat Silo Leadlump (kg)', categories, [{
                    name: 'p_w_silo_leadlump',
                    data: seriesData[0]
                },
                {
                    name: 's_w_silo_leadlump',
                    data: seriesData[1]
                }
            ]);
        });
        // Fetch and render chart for Berat Drum
        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_p_motor_drum', 's_p_motor_drum']);
            renderChart('container2', 'Beban Motor Drum (kW)', 'Nilai Beban Motor Drum (kW)', categories, [{
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

        // Fetch and render chart for Berat Drum
        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_dp_inlet']);
            renderChart('container3', 'Pressure Inlet (mmH2O)', 'Nilai Pressure Inlet(mmH2O)', categories, [{
                name: 'p_dp_inlet',
                data: seriesData[0],
                tooltip: {
                    pointFormat: 'p_dp_inlet: {point.y} mmH2O<br>'
                }
            }]);
        });

        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_dp_blower', 's_dp_blower']);
            renderChart('container4', 'Pressure Blower (mmH2O)', 'Nilai Pressure Blower (mmH2O)', categories, [{
                    name: 'p_dp_blower',
                    data: seriesData[0],
                    tooltip: {
                        pointFormat: 'p_dp_blower: {point.y} mmH2O<br>'
                    }
                },
                {
                    name: 's_dp_blower',
                    data: seriesData[1],
                    tooltip: {
                        pointFormat: 's_dp_blower: {point.y} mmH2O<br>'
                    }
                }
            ]);
        });

        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_t_drum1', 's_t_drum1']);
            renderChart('container5', 'Temperature Drum 1 (Celcius)', 'Nilai Temperature Drum 1 (Celcius)', categories, [{
                    name: 'p_t_drum1',
                    data: seriesData[0],
                    tooltip: {
                        pointFormat: 'p_t_drum1: {point.y} Celcius<br>'
                    }
                },
                {
                    name: 's_t_drum1',
                    data: seriesData[1],
                    tooltip: {
                        pointFormat: 's_t_drum1: {point.y} Celcius<br>'
                    }
                }
            ]);
        });

        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_t_drum2', 's_t_drum2']);
            renderChart('container6', 'Temperature Drum 2 (Celcius)', 'Nilai Temperature Drum 2 (Celcius)', categories, [{
                    name: 'p_t_drum2',
                    data: seriesData[0],
                    tooltip: {
                        pointFormat: 'p_t_drum2: {point.y} Celcius<br>'
                    }
                },
                {
                    name: 's_t_drum2',
                    data: seriesData[1],
                    tooltip: {
                        pointFormat: 's_t_drum2: {point.y} Celcius<br>'
                    }
                }
            ]);
        });

        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_t_drum3', 's_t_drum3']);
            renderChart('container7', 'Temperature Drum 3 (Celcius)', 'Nilai Temperature Drum 3 (Celcius)', categories, [{
                    name: 'p_t_drum3',
                    data: seriesData[0],
                    tooltip: {
                        pointFormat: 'p_t_drum3: {point.y} Celcius<br>'
                    }
                },
                {
                    name: 's_t_drum3',
                    data: seriesData[1],
                    tooltip: {
                        pointFormat: 's_t_drum3: {point.y} Celcius<br>'
                    }
                }
            ]);
        });

        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_t_bearing', 's_t_bearing']);
            renderChart('container8', 'Temperature bearing (Celcius)', 'Nilai Berat bearing (Celcius)', categories, [{
                    name: 'p_t_bearing',
                    data: seriesData[0],
                    tooltip: {
                        pointFormat: 'p_t_bearing: {point.y} Celcius<br>'
                    }
                },
                {
                    name: 's_t_bearing',
                    data: seriesData[1],
                    tooltip: {
                        pointFormat: 's_t_bearing: {point.y} Celcius<br>'
                    }
                }
            ]);
        });


        fetchData(apiUrl, function(data) {
            const {
                categories,
                seriesData
            } = processChartData(data, ['p_t_baghouse', 's_t_baghouse']);
            renderChart('container9', 'Temperature Baghouse (Celcius)', 'Nilai Temperature Baghouse (Celcius)', categories, [{
                    name: 'p_t_baghouse',
                    data: seriesData[0],
                    tooltip: {
                        pointFormat: 'p_t_baghouse: {point.y} Celcius<br>'
                    }
                },
                {
                    name: 's_t_baghouse',
                    data: seriesData[1],
                    tooltip: {
                        pointFormat: 's_t_baghouse: {point.y} Celcius<br>'
                    }
                }
            ]);
        });

    }

    // Initialize with default date
    $(document).ready(function() {
        $('#date-input').val(today); // Set default date in input field
        fetchDefaultData();
    });

    // Event listener for fetch button
    $('#fetch-data').on('click', function() {
        const selectedDate = $('#date-input').val();
        if (selectedDate) {
            fetchDataByDate(selectedDate);
        } else {
            alert('Please select a date.');
        }
    });

    $('#data-source').on('change', function() {
        const selectedSource = $(this).val();

        if (selectedSource === 'date') {
            $('#date-input').show();
            $('#fetch-data').show();
            $('#tanggal').show();

        } else {
            $('#date-input').hide();
            $('#fetch-data').hide();
            $('#tanggal').hide();
            // Fetch data realtime
            fetchDefaultData();
        }
    });
</script>

<?= $this->endSection() ?>