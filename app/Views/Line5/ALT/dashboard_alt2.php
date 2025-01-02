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
                                        ALT 2
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
                            <div id="result_cell2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-body">
                            <div id="result_cell4"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-body">
                            <div id="result_cell6"></div>
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
                                        <span class="badge badge-primary me-15">Result Cell 2</span>
                                    </div>
                                </div>
                                <h5 class="mt-25 mb-5">CP/PP : <span id="cp_cell2"></span></h5>
                                <h5 class="mt-25 mb-5">CPK/PPK : <span id="cpk_cell2"></span></h5>
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
                                        <span class="badge badge-primary me-15">Result Cell 4</span>
                                    </div>
                                </div>
                                <h5 class="mt-25 mb-5">CP/PP : <span id="cp_cell4"></span></h5>
                                <h5 class="mt-25 mb-5">CPK/PPK : <span id="cpk_cell4"></span></h5>
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
                                        <span class="badge badge-primary me-15">Result Cell 6</span>
                                    </div>
                                </div>
                                <h5 class="mt-25 mb-5">CP/PP : <span id="cp_cell6"></span></h5>
                                <h5 class="mt-25 mb-5">CPK/PPK : <span id="cpk_cell6"></span></h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Real Time Result ALT2</h4>
                            <div>
                                <label for="data-source">Select Data Source:</label>
                                <select id="data-source">
                                    <option value="realtime">Real-time</option>
                                    <option value="date">By Date</option>
                                </select>
                                <input type="date" id="date-input" style="display: none;" />
                                <button id="fetch-data" style="display: none;">Fetch Data</button>
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
                            <!-- <div id="interactive" style="height: 500px;"></div> -->
                            <div id="container2" style="height: 500px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                </div>
                <div class="col-xl-12 col-12">
                    <div class="box">
                        <div class="box-body">
                            <!-- <div id="interactive" style="height: 500px;"></div> -->
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
<script>
    // Variabel untuk ketiga chart
    let chart, chart3, chart5;
    const updateInterval = 100000;

    // Fungsi untuk cell1
    const fetchDataCell2 = () => {
        $.ajax({
            url: '<?= base_url('altline5/get/all/cell2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT2_ACTUAL_PRESSURE_CELL2));

                updateOrCreateChart('container', chart, 'Cell2', labels, valuesSet, 'L5_ALT2_ACTUAL_PRESSURE_CELL2', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell2:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk cell3
    const fetchDataCell4 = () => {
        $.ajax({
            url: '<?= base_url('altline5/get/all/cell4') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT2_ACTUAL_PRESSURE_CELL4));

                updateOrCreateChart('container2', chart3, 'Cell4', labels, valuesSet, 'L5_ALT2_ACTUAL_PRESSURE_CELL4', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell4:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk cell5
    const fetchDataCell6 = () => {
        $.ajax({
            url: '<?= base_url('altline5/get/all/cell6') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT2_ACTUAL_PRESSURE_CELL6));

                updateOrCreateChart('container3', chart5, 'Cell6', labels, valuesSet, 'L5_ALT2_ACTUAL_PRESSURE_CELL6', (newChart) => {
                    chart5 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell6:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk mengambil data berdasarkan tanggal
    const fetchDataByDate = (date) => {
        // Fetch untuk cell2
        $.ajax({
            url: `<?= base_url('altline5/get/cell2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT2_ACTUAL_PRESSURE_CELL2));

                updateOrCreateChart('container', chart, 'Cell2 ', labels, valuesSet, 'L5_ALT2_ACTUAL_PRESSURE_CELL2', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell2:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell4
        $.ajax({
            url: `<?= base_url('altline5/get/cell4/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT2_ACTUAL_PRESSURE_CELL4));

                updateOrCreateChart('container2', chart3, 'Cell4', labels, valuesSet, 'L5_ALT2_ACTUAL_PRESSURE_CELL4', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for Cell4:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell6
        $.ajax({
            url: `<?= base_url('altline5/get/cell6/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_ALT2_ACTUAL_PRESSURE_CELL6));

                updateOrCreateChart('container3', chart5, 'Cell6', labels, valuesSet, 'L5_ALT2_ACTUAL_PRESSURE_CELL6', (newChart) => {
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
                    min: 0
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
            fetchDataCell2();
            fetchDataCell4();
            fetchDataCell6();
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
    fetchDataCell2();
    fetchDataCell4();
    fetchDataCell6();
    updateCharts();
</script>


<!-- distinct -->
<!-- <script>
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
                // const currentMaxsumbuX = Math.max(...categories);
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
                        value:0,
                    },
                    {
                        color: 'blue',
                        width: 1,
                        value: 3,
                    }
                ],
                // max: maxsumbuX + 1
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
    createChart('result_cell2', '<?= base_url('altline5/get/distinct/cell2') ?>', 'L5_ALT2_RESULT_CELL2', 'Result Cell 2');
    createChart('result_cell4', '<?= base_url('altline5/get/distinct/cell4') ?>', 'L5_ALT2_RESULT_CELL4', 'Result Cell 4');
    createChart('result_cell6', '<?= base_url('altline5/get/distinct/cell6') ?>', 'L5_ALT2_RESULT_CELL6', 'Result Cell 6');
</script> -->

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
                // max: maxsumbuX + 1

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
    createChart('result_cell2', '<?= base_url('altline5/get/distinct/cell2') ?>', 'L5_ALT2_RESULT_CELL2', 'Result Cell 2');
    createChart('result_cell4', '<?= base_url('altline5/get/distinct/cell4') ?>', 'L5_ALT2_RESULT_CELL4', 'Result Cell 4');
    createChart('result_cell6', '<?= base_url('altline5/get/distinct/cell6') ?>', 'L5_ALT2_RESULT_CELL6', 'Result Cell 6');
</script>

<!-- cp/pp & cpk/ppk -->
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
        calculateMetrics('<?= base_url('altline5/get/distinct/cell2') ?>', '#cp_cell2', '#cpk_cell2', 'L5_ALT2_RESULT_CELL2');

        // Panggil fungsi untuk cell3
        calculateMetrics('<?= base_url('altline5/get/distinct/cell4') ?>', '#cp_cell4', '#cpk_cell4', 'L5_ALT2_RESULT_CELL4');

        // Panggil fungsi untuk cell5
        calculateMetrics('<?= base_url('altline5/get/distinct/cell6') ?>', '#cp_cell6', '#cpk_cell6', 'L5_ALT2_RESULT_CELL6');
    });
</script>
<?= $this->endSection() ?>