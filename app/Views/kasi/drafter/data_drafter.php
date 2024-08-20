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
                                    <h2><?= $nama['nama_drafter'] ?></h2>
                                    <p class="text-dark mb-0 fs-16">
                                        Berikut Progress Drafter ini!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container for the chart -->
            <div class="row">

                <div class="col-xl-9 col-12">
                    <div class="box">
                        <div class="box-body">
                            <p class="text-fade">Progress Order Drawing </p>
                            <h3 class="mt-0 mb-20">
                                Drafter <?= $nama['nama_drafter'] ?>
                            </h3>
                            <div id="charts_widget_1_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Total Order</h4>

                        </div>
                        <div class="box-body">
                            <div id="total_order"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3>List Order Drawing</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example121" class="table text-center table-bordered table-separated">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Part Drawing</th>
                                                <th>Order From </th>
                                                <th>Keterangan </th>
                                                <th>Tanggal Order</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>File</th>
                                            </tr>

                                        </thead>
                                        <tbody id="user">
                                            <?php $i = 1;
                                            foreach ($drawing as $user) : ?>

                                                <tr class="">
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $user['nama_part']; ?></td>
                                                    <td><?= $user['order_from'] ?></td>
                                                    <td><?= $user['keterangan'] ?></td>
                                                    <td><?= $user['tanggal_order'] ?></td>
                                                    <td><?= $user['tanggal_jatuh_tempo'] ?></td>
                                                    <td>
                                                        <?php if ($user['status'] == 'open') : ?>
                                                            <button style="margin: 2px;" class="btn btn-info">Open</button>

                                                        <?php elseif ($user['status'] == 'proses') : ?>
                                                            <button style="margin: 2px;" class="btn btn-warning">On Progress</button>

                                                        <?php elseif ($user['status'] == 'selesai') : ?>
                                                            <button class="btn btn-success">Done</button>
                                                        <?php else : ?>
                                                            -
                                                        <?php endif; ?>

                                                    </td>
                                                    <td>
                                                        <?php if ($user['drawing_pdf'] != null) : ?>
                                                            <button type="button" class="btn btn-link btn-pdf-modal" data-pdf="<?= base_url('uploads/' . $user['drawing_pdf']); ?>">
                                                                <i class="fa fa-file-pdf-o"></i> Lihat PDF
                                                            </button>
                                                        <?php else : ?>
                                                            Belum Upload
                                                        <?php endif; ?>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->

        <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pdfModalLabel">Drawing Viewer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <embed id="pdfViewer" src="" type="application/pdf" width="100%" height="600px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {

        $('.btn-pdf-modal').on('click', function() {
            var pdfUrl = $(this).data('pdf');
            $('#pdfViewer').attr('src', pdfUrl);
            $('#pdfModal').modal('show');
        });
    });
    $(function() {
        "use strict";

        // Data from PHP
        var data = <?= json_encode($data) ?>;

        // Function to render the chart
        function renderChart(data) {
            var options = {
                series: [{
                    name: "Drawing Count",
                    data: [data.open, data.selesai, data.proses, data.overdue], // Data from PHP
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
                colors: ["#6993ff", "#28a745", "#ffc107", "#6c757d"], // Custom colors
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
                    enabled: false,
                },
                xaxis: {
                    categories: ["Open", "Completed", "In Progress", "Overdue"], // Categories based on data keys
                },
                legend: {
                    show: false,
                },
                fill: {
                    opacity: 1,
                },
            };

            var chart = new ApexCharts(
                document.querySelector("#charts_widget_1_chart"),
                options,
            );
            chart.render();
        }

        // Render the chart with the PHP data
        renderChart(data);
    });
</script>
<script>
    $(function() {
        "use strict";

        // Data from PHP
        var orderData = <?= json_encode($order) ?>;

        // Donut chart options
        var options = {
            series: [orderData.internal, orderData.eksternal],
            chart: {
                type: 'donut',
                height: 300,
            },
            labels: ['Internal', 'Eksternal'],
            colors: ['#ffc107', '#28a745'], // Customize colors
            plotOptions: {
                pie: {
                    donut: {
                        size: '60%',
                        labels: {
                            show: true,
                            name: {
                                fontSize: '16px',
                                fontFamily: 'Helvetica, Arial, sans-serif',
                                color: '#666',
                                offsetY: -10,
                            },
                            value: {
                                fontSize: '14px',
                                fontFamily: 'Helvetica, Arial, sans-serif',
                                color: '#333',
                                offsetY: 10,
                                formatter: function(val) {
                                    return val;
                                }
                            }
                        }
                    }
                }
            },
            legend: {
                show: true,
                position: 'bottom',
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#total_order"),
            options
        );
        chart.render();
    });
</script>
<?= $this->endSection() ?>