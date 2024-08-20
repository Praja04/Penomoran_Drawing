<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row align-items-end">
                <div class="col-xl-12 col-12">
                    <div class="box bg-primary-light pull-up">
                        <div class="box-body p-xl-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-3">
                                    <img src="<?= base_url('assets/template/images/svg-icon/color-svg/custom-14.svg') ?>" alt="" />
                                </div>
                                <div class="col-12 col-lg-9">
                                    <h2>Hello <?= $nama ?>, Selamat datang!</h2>
                                    <p class="text-dark mb-0 fs-16">
                                        Mari cek progres para Drafter PCE!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $secretKey = bin2hex(random_bytes(32));
            echo $secretKey; ?>
            <div class="row">
                <?php foreach ($courses as $course) : ?>
                    <div class="col-xl-3 col-md-6 col-12">
                        <a href="<?= base_url('data/drafter/' . $course['user_id']) ?>" class="text-decoration-none">
                            <div class="box bg-secondary-light pull-up" style="
                    background-image: url(<?= base_url('assets/template/images/svg-icon/color-svg/' . $course['bg_image']) ?>);
                    background-position: right bottom;
                    background-repeat: no-repeat;
                ">
                                <div class="box-body">
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center pe-2 justify-content-between">
                                            <div class="d-flex">
                                                <span class="badge badge-primary me-15">Active</span>
                                                <span class="badge badge-primary me-5"><i class="fa fa-lock"></i></span>
                                                <span class="badge badge-primary"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                        </div>
                                        <h5 style="visibility: hidden;"><?= $course['user_id'] ?></h5>
                                        <h5 class="mt-25 mb-5"><?= $course['title'] ?></h5>
                                        <p class="text-fade mb-0 fs-12"><?= $course['days_left'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>


            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <p class="text-fade">Total Order Drawing</p>
                            <h3 class="mt-0 mb-20">
                                PCE Drafters
                            </h3>
                            <div id="charts_widget_2_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <p class="text-fade">Total Drawing PUblish & Trial</p>
                            <h3 class="mt-0 mb-20">
                                PCE Drafters
                            </h3>
                            <div id="charts_widget_1_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-12">
                    <div class="box">
                        <div class="box-body">
                            <p class="text-fade">Progress</p>
                            <h3 class="mt-0 mb-20">
                                PCE Drafters
                            </h3>
                            <div id="charts_widget_3_chart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        <div class="col-6">
                            <a class="box box-link-shadow text-center" href="<?= base_url('status/all/open') ?>">
                                <div class="box-body">
                                    <div class="fs-24"><?= $status['open'] ?></div>
                                    <h3>Open</h3><br>
                                    <span>(Sudah approved, belum dikerjakan)</span>
                                </div>
                                <div class="box-body bg-info btsr-0 bter-0">
                                    <p>
                                        <span class="mdi mdi-open-in-app fs-30"></span>
                                    </p>
                                </div>
                            </a>
                            <a class="box box-link-shadow text-center" href="<?= base_url('status/all/over') ?>">
                                <div class="box-body">
                                    <div class="fs-24"><?= $status['overdue'] ?></div>
                                    <h3>Over Due</h3><br>
                                    <span>(Order telah melewati tanggal jatuh tempo)</span>
                                </div>
                                <div class="box-body bg-danger btsr-0 bter-0">
                                    <p>
                                        <span class="mdi mdi-alert-circle fs-30"></span>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="box box-link-shadow text-center" href="<?= base_url('status/all/proses') ?>">
                                <div class="box-body">
                                    <div class="fs-24"><?= $status['proses'] ?></div>
                                    <h3>On Progress</h3><br>
                                    <span>(Sedang dikerjakan)</span>
                                </div>
                                <div class="box-body bg-warning btsr-0 bter-0">
                                    <p>
                                        <span class="mdi mdi-cached fs-30"></span>
                                    </p>
                                </div>
                            </a>
                            <a class="box box-link-shadow text-center" href="<?= base_url('status/all/done') ?>">
                                <div class="box-body">
                                    <div class="fs-24"><?= $status['selesai'] ?></div>
                                    <h3>Done</h3><br>
                                    <span>(Sudah Selesai dikerjakan)</span>
                                </div>
                                <div class="box-body bg-success btsr-0 bter-0">
                                    <p>
                                        <span class="mdi mdi-checkbox-marked-circle fs-30"></span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>
        <!-- /.content -->
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<!-- <script src="<?= base_url() ?>assets/template/main/js/pages/dashboard3.js" type="text/javascript"></script> -->
<script>
    $(document).ready(function() {
        // Fetch all required data from multiple endpoints
        $.when(
            $.ajax({
                url: "<?= base_url('/data/order') ?>",
                method: "GET",
                dataType: "json"
            }),
            $.ajax({
                url: "<?= base_url('data/drawing') ?>",
                method: "GET",
                dataType: "json"
            }),
            $.ajax({
                url: "<?= base_url('data/drawing/drafters') ?>",
                method: "GET",
                dataType: "json"
            })
        ).done(function(orderData, drawingData, drafterData) {
            // Handle response for orders chart
            var order = orderData[0];
            var donutOptions = {
                series: [order.open, order.selesai, order.proses, order.overdue],
                labels: ["Open", "Done", "In Progress", "Overdue"],
                chart: {
                    width: 328,
                    type: "donut",
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        const quantity = opts.w.globals.series[opts.seriesIndex];
                        return quantity + ' (' + val.toFixed(1) + '%)';
                    },
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 'bold',
                        colors: ['#000000'] // Set the color to black
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200,
                        },
                        legend: {
                            show: false,
                        },
                    },
                }],
                colors: ["#007bff", "#28a745", "#ffdd00", "#dc3545"], // Colors for the statuses
                legend: {
                    position: "right",
                    height: 230,
                },
            };

            var donutChart = new ApexCharts(
                document.querySelector("#charts_widget_2_chart"),
                donutOptions
            );
            donutChart.render();

            // Handle response for drawings chart
            var drawing = drawingData[0];
            var barOptions = {
                series: [{
                    name: "Drawing Count",
                    data: [drawing.trial, drawing.publish], // Data from JSON
                }],
                chart: {
                    foreColor: "#bac0c7",
                    type: "bar",
                    height: 200,
                    stacked: true,
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: true,
                    },
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: "bottom",
                            offsetX: -10,
                            offsetY: 0,
                        },
                    },
                }],
                grid: {
                    show: true,
                    borderColor: "#f7f7f7",
                },
                colors: ["#6993ff"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "20%",
                        colors: {
                            backgroundBarColors: ["#f0f0f0"],
                            backgroundBarOpacity: 1,
                        },
                    },
                },
                dataLabels: {
                    enabled: true, // Enable data labels
                    formatter: function(val) {
                        return val; // Display the value itself
                    },
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 'bold',
                        colors: ['#000000'] // Set the color to black
                    }
                },
                xaxis: {
                    categories: ["Trial", "Publish"], // Categories based on JSON keys
                },
                legend: {
                    show: false,
                },
                fill: {
                    opacity: 1,
                },
            };

            var barChart = new ApexCharts(
                document.querySelector("#charts_widget_1_chart"),
                barOptions
            );
            barChart.render();

            // Handle response for drafters chart
            var drafters = drafterData[0];
            var categories = drafters.map(item => item.nama_drafter);
            var openCounts = drafters.map(item => item.open_count);
            var selesaiCounts = drafters.map(item => item.selesai_count);
            var prosesCounts = drafters.map(item => item.proses_count);
            var overdueCounts = drafters.map(item => item.overdue_count);

            var stackedBarOptions = {
                series: [{
                        name: "Open",
                        data: openCounts,
                    },
                    {
                        name: "Done",
                        data: selesaiCounts,
                    },
                    {
                        name: "In Progress",
                        data: prosesCounts,
                    },
                    {
                        name: "Overdue",
                        data: overdueCounts,
                    }
                ],
                chart: {
                    foreColor: "#bac0c7",
                    type: "bar",
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: true,
                    },
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: "bottom",
                            offsetX: -10,
                            offsetY: 0,
                        },
                    },
                }],
                grid: {
                    show: true,
                    borderColor: "#f7f7f7",
                },
                colors: ["#007bff", "#28a745", "#ffdd00", "#dc3545"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "20%",
                        colors: {
                            backgroundBarColors: ["#f0f0f0"],
                            backgroundBarOpacity: 1,
                        },
                    },
                },
                dataLabels: {
                    enabled: true, // Enable data labels
                    formatter: function(val) {
                        return val; // Display the value itself
                    },
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 'bold',
                        colors: ['#000000'] // Set the color to black
                    }
                },
                xaxis: {
                    categories: categories,
                },
                legend: {
                    position: "right",
                    height: 230,
                },
                fill: {
                    opacity: 1,
                },
            };

            var stackedBarChart = new ApexCharts(
                document.querySelector("#charts_widget_3_chart"),
                stackedBarOptions
            );
            stackedBarChart.render();
        }).fail(function(xhr, status, error) {
            console.error("Error fetching data:", error);
        });
    });
</script>



<?= $this->endSection() ?>