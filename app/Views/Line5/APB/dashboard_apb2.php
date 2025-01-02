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
                                    <h2>Dashboard APB</h2>
                                    <p class="text-dark mb-0 fs-16">
                                        APB 2
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <div id="temp_left"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <div id="temp_right"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Real Time Temperatur APB 2</h4>
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
            </div>


        </section>
        <!-- /.content -->
    </div>
</div>


<?= $this->endSection() ?>


<?= $this->section('script'); ?>
<script src="<?= base_url('assets/js/jquery.flot.js') ?>"></script>
<!-- temp left -->
<!-- <script>
    let chart3;
    const updateInterval3 = 3000; // Interval dalam milidetik

    const fetchDataCell3 = () => {
        $.ajax({
            url: '<?= base_url('apbline5/get/temp/left2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu); // Mengakses waktu
                const valuesSet = data.data.map(item => parseFloat(item.L5_APB2_TEMP_LEFT_SETTING)); // Konversi ke angka
                const valuesLeft = data.data.map(item => parseFloat(item.L5_APB2_TEMP_LEFT_ACTUAL)); // Konversi ke angka
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                if (chart3) {
                    // Update chart jika sudah ada
                    chart3.xAxis[0].setCategories(labels);
                    chart3.series[0].setData(valuesLeft);
                    chart3.series[1].setData(valuesSet);
                    chart3.series[2].setData(valuesStandardMinimal);
                    chart3.series[3].setData(valuesStandardMaksimal);
                } else {
                    // Buat chart baru jika belum ada
                    chart3 = Highcharts.chart('container', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'L5_APB2_TEMP_LEFT_SETTING dan L5_APB2_TEMP_LEFT_ACTUAL'
                        },
                        xAxis: {
                            labels: {
                                enabled: false,
                            },
                            categories: labels,
                            title: {
                                text: 'Waktu'
                            }
                        },
                        yAxis: {
                            title: {
                                text: 'Nilai'
                            },
                            min: 0,
                            tickInterval: 5
                        },
                        series: [{
                            name: 'L5_APB2_TEMP_LEFT_ACTUAL',
                            data: valuesLeft
                        }, {
                            name: 'L5_APB2_TEMP_LEFT_SETTING',
                            data: valuesSet
                        }, {
                            name: 'Standard Minimal',
                            data: valuesStandardMinimal,
                            marker: {
                                enabled: false // Nonaktifkan titik untuk standar minimal
                            }
                        }, {
                            name: 'Standard Maksimal',
                            data: valuesStandardMaksimal,
                            marker: {
                                enabled: false // Nonaktifkan titik untuk standar minimal
                            }
                        }]
                    });
                }
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data:', textStatus, errorThrown);
            }
        });
    };

    const updateCell3 = () => {
        fetchDataCell3();
        setTimeout(updateCell3, updateInterval3);
    };

    // Ambil data pertama kali saat halaman dimuat dan mulai pembaruan otomatis
    fetchDataCell3();
    updateCell3();
</script> -->
<!-- temp right -->
<!-- <script>
    let chart4;
    const updateInterval4 = 3000; // Interval dalam milidetik

    const fetchDataCell4 = () => {
        $.ajax({
            url: '<?= base_url('apbline5/get/temp/right2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu); // Mengakses waktu
                const valuesRight = data.data.map(item => parseFloat(item.L5_APB2_TEMP_RIGHT_ACTUAL)); // Konversi ke angka
                const valuesSet = data.data.map(item => parseFloat(item.L5_APB2_TEMP_RIGHT_SETTING)); // Konversi ke angka
                const standarmin = data.data.map(item => 25); // Konversi ke angka
                const standarmaks = data.data.map(item => 50); // Konversi ke angka
                if (chart4) {
                    // Update chart jika sudah ada
                    chart4.xAxis[0].setCategories(labels);
                    chart4.series[0].setData(valuesLeft);
                    chart4.series[1].setData(valuesSet);
                    chart4.series[2].setData(standarmin);
                    chart4.series[3].setData(standarmaks);
                } else {
                    // Buat chart baru jika belum ada
                    chart4 = Highcharts.chart('container2', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'L5_APB2_TEMP_RIGHT_ACTUAL dan L5_APB2_TEMP_RIGHT_SETTING'
                        },
                        xAxis: {
                            labels: {
                                enabled: false,
                            },
                            categories: labels,
                            title: {
                                text: 'Waktu'
                            }
                        },
                        yAxis: {
                            title: {
                                text: 'Nilai'
                            },
                            min: 0,
                            tickInterval: 5
                        },
                        series: [{
                            name: 'L5_APB2_TEMP_RIGHT_ACTUAL',
                            data: valuesRight
                        }, {
                            name: 'L5_APB2_TEMP_RIGHT_SETTING',
                            data: valuesSet
                        }, {
                            name: 'Standar Minimal',
                            data: standarmin,
                            marker: {
                                enabled: false // Nonaktifkan titik untuk standar minimal
                            }
                        }, {
                            name: 'Standar Maksimal',
                            data: standarmaks,
                            marker: {
                                enabled: false // Nonaktifkan titik untuk standar minimal
                            }
                        }]
                    });
                }
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data:', textStatus, errorThrown);
            }
        });
    };

    const updateCell4 = () => {
        fetchDataCell4();
        setTimeout(updateCell4, updateInterval4);
    };

    // Ambil data pertama kali saat halaman dimuat dan mulai pembaruan otomatis
    fetchDataCell4();
    updateCell4();
</script> -->

<!-- distinct temp -->
<script>
    let maxCount = 0; // Variabel untuk menyimpan nilai maksimum

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
                // processedData.sort((a, b) => a.category - b.category);

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

    // Memanggil fungsi untuk masing-masing API dengan label yang sesuai
    createChart('temp_left', '<?= base_url('apbline5/distinct/left2') ?>', 'TEMP_Actual_LEFT_RANGE', 'Temperatur Left');
    createChart('temp_right', '<?= base_url('apbline5/distinct/right2') ?>', 'TEMP_Actual_RIGHT_RANGE', 'Temperatur Right');
</script>




<script>
    // Variabel untuk ketiga chart
    let chart, chart3;
    const updateInterval = 100000;

    // Fungsi untuk right
    const fetchDataRight1 = () => {
        $.ajax({
            url: '<?= base_url('apbline5/get/temp/right2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_APB2_TEMP_RIGHT_SETTING));
                const valuesRight = data.data.map(item => parseFloat(item.L5_APB2_TEMP_RIGHT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChart(valuesStandardMinimal, valuesStandardMaksimal, 'container', chart, 'APB2 - TEMP RIGHT Actual', labels, valuesSet, 'L5_APB2_TEMP_RIGHT_SETTING', valuesRight, 'L5_APB2_TEMP_RIGHT_ACTUAL', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right apb2:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk left
    const fetchDataLeft1 = () => {
        $.ajax({
            url: '<?= base_url('apbline5/get/temp/left2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_APB2_TEMP_LEFT_SETTING));
                const valuesLeft = data.data.map(item => parseFloat(item.L5_APB2_TEMP_LEFT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChart(valuesStandardMinimal, valuesStandardMaksimal, 'container2', chart3, 'APB2 - TEMP LEFT Actual', labels, valuesSet, 'L5_APB2_TEMP_LEFT_SETTING', valuesLeft, 'L5_APB2_TEMP_LEFT_ACTUAL', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for apb 2 temp left:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk cell5

    // Fungsi untuk mengambil data berdasarkan tanggal
    const fetchDataByDate = (date) => {
        // Fetch untuk cell1
        $.ajax({
            url: `<?= base_url('apbline5/get/temp/right2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_APB2_TEMP_RIGHT_SETTING));
                const valuesRight = data.data.map(item => parseFloat(item.L5_APB2_TEMP_RIGHT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChart(valuesStandardMinimal, valuesStandardMaksimal, 'container', chart, 'APB2 - TEMP RIGHT Actual', labels, valuesSet, 'L5_APB2_TEMP_RIGHT_SETTING', valuesRight, 'L5_APB2_TEMP_RIGHT_ACTUAL', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right apb 2:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell3
        $.ajax({
            url: `<?= base_url('apbline5/get/temp/left2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_APB2_TEMP_LEFT_SETTING));
                const valuesLeft = data.data.map(item => parseFloat(item.L5_APB2_TEMP_LEFT_ACTUAL));
                const valuesStandardMinimal = data.data.map(item => 25); // Konversi ke angka
                const valuesStandardMaksimal = data.data.map(item => 50); // Konversi ke angka

                updateOrCreateChart(valuesStandardMinimal, valuesStandardMaksimal, 'container2', chart3, 'APB2 - TEMP LEFT Actual', labels, valuesSet, 'L5_APB2_TEMP_LEFT_SETTING', valuesLeft, 'L5_APB2_TEMP_LEFT_ACTUAL', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left apb 2:', textStatus, errorThrown);
            }
        });

    };

    // Fungsi helper untuk membuat/update chart
    const updateOrCreateChart = (valuesStandardMinimalTemp, valuesStandardMaksimalTemp, containerId, chartInstance, title, labels, valuesSet, seriesName, valuesTemp, SeriesTemp, setChart) => {
        if (chartInstance) {
            chartInstance.series[0].setData(valuesSet);
            chartInstance.series[1].setData(valuesTemp);
            chartInstance.series[2].setData(valuesStandardMaksimalTemp);
            chartInstance.series[3].setData(valuesStandardMinimalTemp);
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

    // Fungsi update untuk realtime
    const updateCharts = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchDataRight1();
            fetchDataLeft1();
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
    fetchDataRight1();
    fetchDataLeft1();
    updateCharts();
</script>
<?= $this->endSection() ?>