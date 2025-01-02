view


<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row align-items-end">
                <div class="col-xl-12 col-12">
                    <div class="box bg-primary-light pull-up">
                        <div class="box-body p-xl-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-3"><img src="<?= base_url('assets/template/images/svg-icon/color-svg/custom-14.svg') ?>" alt=""></div>
                                <div class="col-12 col-lg-9">
                                    <h2>Dashboard ALT</h2>
                                    <p class="text-dark mb-0 fs-16">
                                        ALT 1
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box no-shadow mb-0 bg-transparent">
                        <div class="box-header no-border px-0">
                            <h4 class="box-title">CP/PP & CPK/PPK</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="box bg-secondary-light pull-up" style="background-image: url(<?= base_url('assets/template/images/svg-icon/color-svg/st-1.svg') ?>); background-position: right bottom; background-repeat: no-repeat;">
                        <div class="box-body">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center pe-2 justify-content-between">
                                    <div class="d-flex">
                                        <span class="badge badge-primary me-15">Result Cell 1</span>
                                    </div>
                                </div>
                                <h5 class="mt-25 mb-5">CP/PP : <span id="cp_cell1"></span></h5>
                                <h5 class="mt-25 mb-5">CPK/PPK : <span id="cpk_cell1"></span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="box bg-secondary-light pull-up" style="background-image: url(<?= base_url('assets/template/images/svg-icon/color-svg/st-2.svg') ?>); background-position: right bottom; background-repeat: no-repeat;">
                        <div class="box-body">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center pe-2 justify-content-between">
                                    <div class="d-flex">
                                        <span class="badge badge-primary me-15">Result Cell 3</span>
                                    </div>
                                </div>
                                <h5 class="mt-25 mb-5">CP/PP : <span id="cp_cell3"></span></h5>
                                <h5 class="mt-25 mb-5">CPK/PPK : <span id="cpk_cell3"></span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="box bg-secondary-light pull-up" style="background-image: url(<?= base_url('assets/template/images/svg-icon/color-svg/st-3.svg') ?>); background-position: right bottom; background-repeat: no-repeat;">
                        <div class="box-body">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center pe-2 justify-content-between">
                                    <div class="d-flex">
                                        <span class="badge badge-primary me-15">Result Cell 5</span>
                                    </div>
                                </div>
                                <h5 class="mt-25 mb-5">CP/PP : <span id="cp_cell5"></span></h5>
                                <h5 class="mt-25 mb-5">CPK/PPK : <span id="cpk_cell5"></span></h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Real Time Actual Pressure ALT1</h4>
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

                            </div>
                        </div>
                        <div class="box-body">
                            <!-- <div id="interactive" style="height: 300px;"></div> -->
                            <div id="container" style="height: 500px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                </div>
                <div class="col-xl-12 col-12">
                    <div class="box">
                        <div class="box-body">
                            <!-- <div id="interactive" style="height: 300px;"></div> -->
                            <div id="container2" style="height: 500px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                </div>
                <div class="col-xl-12 col-12">
                    <div class="box">
                        <div class="box-body">
                            <!-- <div id="interactive" style="height: 300px;"></div> -->
                            <div id="container3" style="height: 500px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
</div>


<?= $this->endSection() ?>


<?= $this->section('script'); ?>
<script src="<?= base_url('assets/js/jquery.flot.js') ?>"></script>
<script src="<?= base_url('assets/template/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
    // Variabel untuk ketiga chart
    let chart, chart3, chart5;
    const updateInterval = 100000;

    // Fungsi untuk cell1
    const fetchDataCell1 = () => {
        $.ajax({
            url: '<?= base_url('altline5/get/all/cell1') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT1_ACTUAL_PRESSURE_CELL1));

                updateOrCreateChart('container', chart, 'Cell1', labels, valuesSet, 'L5_ALT1_ACTUAL_PRESSURE_CELL1', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk cell3
    const fetchDataCell3 = () => {
        $.ajax({
            url: '<?= base_url('altline5/get/all/cell3') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT1_ACTUAL_PRESSURE_CELL3));

                updateOrCreateChart('container2', chart3, 'Cell3', labels, valuesSet, 'L5_ALT1_ACTUAL_PRESSURE_CELL3', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk cell5
    const fetchDataCell5 = () => {
        $.ajax({
            url: '<?= base_url('altline5/get/all/cell5') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT1_ACTUAL_PRESSURE_CELL5));

                updateOrCreateChart('container3', chart5, 'Cell5', labels, valuesSet, 'L5_ALT1_ACTUAL_PRESSURE_CELL5', (newChart) => {
                    chart5 = newChart;
                });
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
            url: `<?= base_url('altline5/get/cell1/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT1_ACTUAL_PRESSURE_CELL1));

                updateOrCreateChart('container', chart, 'Cell1 ', labels, valuesSet, 'L5_ALT1_ACTUAL_PRESSURE_CELL1', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell1:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell3
        $.ajax({
            url: `<?= base_url('altline5/get/cell3/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT1_ACTUAL_PRESSURE_CELL3));

                updateOrCreateChart('container2', chart3, 'Cell3', labels, valuesSet, 'L5_ALT1_ACTUAL_PRESSURE_CELL3', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell3:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell5
        $.ajax({
            url: `<?= base_url('altline5/get/cell5/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT1_ACTUAL_PRESSURE_CELL5));

                updateOrCreateChart('container3', chart5, 'Cell5', labels, valuesSet, 'L5_ALT1_ACTUAL_PRESSURE_CELL5', (newChart) => {
                    chart5 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell5:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi helper untuk membuat/update chart
    const updateOrCreateChart = (containerId, chartInstance, title, labels, valuesSet, seriesName, setChart) => {
        if (chartInstance) {
            chartInstance.series[0].setData(valuesSet);
            chartInstance.xAxis[0].setCategories(labels);
        } else {
            const newChart = Highcharts.chart(containerId, {
                chart: {
                    type: 'line'
                },
                title: {
                    text: title
                },
                xAxis: {
                    labels: {
                        enabled: false,
                    },
                    categories: labels,
                    title: {
                        text: 'Output'
                    },
                    reversed: true
                },
                yAxis: {
                    title: {
                        text: 'Nilai'
                    },
                    min: 0,
                },
                series: [{
                    name: seriesName,
                    data: valuesSet
                }]
            });
            setChart(newChart);
        }
    };

    // Fungsi update untuk realtime
    const updateCharts = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchDataCell1();
            fetchDataCell3();
            fetchDataCell5();
            setTimeout(updateCharts, updateInterval);
        }
    };

    // Event listener untuk dropdown
    $('#data-source').on('change', function() {
        const selectedSource = $(this).val();
        if (selectedSource === 'date') {
            $('#date-input').show();
            $('#fetch-data').show();
            // Reset charts
            chart = chart3 = chart5 = null;
        } else {
            $('#date-input').hide();
            $('#fetch-data').hide();
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

    // Inisialisasi awal
    fetchDataCell1();
    fetchDataCell3();
    fetchDataCell5();
    updateCharts();
</script>

<!-- distinct -->
<script>
    let maxCount = 0; // Variabel untuk menyimpan nilai maksimum
    // let maxsumbuX = 0;

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
                //   console.log('in' + maxsumbuX);
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
                type: 'column'
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
                max: maxCount, // Mengatur sumbu Y maksimum
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

    // Memanggil fungsi untuk masing-masing API dengan label yang sesuai
    createChart('result_cell1', '<?= base_url('altline5/get/distinct/cell1') ?>', 'L5_ALT1_RESULT_CELL1', 'Result Cell 1');
    createChart('result_cell3', '<?= base_url('altline5/get/distinct/cell3') ?>', 'L5_ALT1_RESULT_CELL3', 'Result Cell 3');
    createChart('result_cell5', '<?= base_url('altline5/get/distinct/cell5') ?>', 'L5_ALT1_RESULT_CELL5', 'Result Cell 5');
</script>


<!-- cp/pp &cpk/ppk -->
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

                        console.log(response);

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

                        console.log(`Median: ${median}`);

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
        calculateMetrics('<?= base_url('altline5/get/distinct/cell1') ?>', '#cp_cell1', '#cpk_cell1', 'L5_ALT1_RESULT_CELL1');

        // Panggil fungsi untuk cell3
        calculateMetrics('<?= base_url('altline5/get/distinct/cell3') ?>', '#cp_cell3', '#cpk_cell3', 'L5_ALT1_RESULT_CELL3');

        // Panggil fungsi untuk cell5
        calculateMetrics('<?= base_url('altline5/get/distinct/cell5') ?>', '#cp_cell5', '#cpk_cell5', 'L5_ALT1_RESULT_CELL5');
    });
</script>

<?= $this->endSection() ?>