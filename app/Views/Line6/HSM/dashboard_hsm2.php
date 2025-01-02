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
                                    <h2>Dashboard HSM</h2>
                                    <p class="text-dark mb-0 fs-16">
                                        HSM 2
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
                            <h4 class="box-title">Real Time Temperatur HSM 2</h4>
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
                            <div id="container" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                </div>
                <div class="col-xl-12 col-12">
                    <div class="box">
                        <div class="box-body">
                            <!-- <div id="interactive" style="height: 300px;"></div> -->
                            <div id="container2" style="height: 300px;"></div>
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
    const updateInterval3 = 500; // Interval dalam milidetik

    const fetchDataCell3 = () => {
        $.ajax({
            url: '<?= base_url('hsmline6/get/temp/left2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu); // Mengakses waktu
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_SET_VALUE)); // Konversi ke angka
                const valuesLeft = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_LEFT)); // Konversi ke angka

                if (chart3) {
                    // Update chart jika sudah ada
                    chart3.xAxis[0].setCategories(labels);
                    chart3.series[0].setData(valuesLeft);
                    chart3.series[1].setData(valuesSet);
                } else {
                    // Buat chart baru jika belum ada
                    chart3 = Highcharts.chart('container', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'L6_HSM2_TEMP_SET_VALUE dan L6_HSM2_TEMP_LEFT'
                        },
                        xAxis: {
                            labels: {
                                enabled: false,
                            },
                            categories: labels,
                            title: {
                                text: 'Waktu'
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
                            name: 'L6_HSM2_TEMP_SET_VALUE',
                            data: valuesSet
                        }, {
                            name: 'L6_HSM2_TEMP_LEFT',
                            data: valuesLeft
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
    const updateInterval4 = 500; // Interval dalam milidetik

    const fetchDataCell4 = () => {
        $.ajax({
            url: '<?= base_url('hsmline6/get/temp/right2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu); // Mengakses waktu
                const valuesRight = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_RIGHT)); // Konversi ke angka
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_SET_VALUE)); // Konversi ke angka

                if (chart4) {
                    // Update chart jika sudah ada
                    chart4.xAxis[0].setCategories(labels);
                    chart4.series[0].setData(valuesRight);
                    chart4.series[1].setData(valuesSet);
                } else {
                    // Buat chart baru jika belum ada
                    chart4 = Highcharts.chart('container2', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'L6_HSM2_TEMP_RIGHT dan L6_HSM2_TEMP_SET_VALUE'
                        },
                        xAxis: {
                            labels: {
                                enabled: false,
                            },
                            categories: labels,
                            title: {
                                text: 'Waktu'
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
                            name: 'L6_HSM2_TEMP_RIGHT',
                            data: valuesRight
                        }, {
                            name: 'L6_HSM2_TEMP_SET_VALUE',
                            data: valuesSet
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
    createChart('temp_left', '<?= base_url('hsmline6/distinct/left2') ?>', 'TEMP_LEFT_RANGE', 'Temperatur Left');
    createChart('temp_right', '<?= base_url('hsmline6/distinct/right2') ?>', 'TEMP_RIGHT_RANGE', 'Temperatur Right');
</script>




<script>
    // Variabel untuk ketiga chart
    let chart, chart3;
    const updateInterval = 100000;

    // Fungsi untuk right
    const fetchDataRight1 = () => {
        $.ajax({
            url: '<?= base_url('hsmline6/get/temp/right2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_SET_VALUE));
                const valuesRight = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_RIGHT));

                updateOrCreateChart('container', chart, 'TEMP RIGHT', labels, valuesSet, 'L6_HSM2_TEMP_SET_VALUE', valuesRight, 'L6_HSM2_TEMP_RIGHT', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm1:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk left
    const fetchDataLeft1 = () => {
        $.ajax({
            url: '<?= base_url('hsmline6/get/temp/left2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_SET_VALUE));
                const valuesLeft = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_LEFT));
                updateOrCreateChart('container2', chart3, 'TEMP LEFT', labels, valuesSet, 'L6_HSM2_TEMP_SET_VALUE', valuesLeft, 'L6_HSM2_TEMP_LEFT', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk cell5

    // Fungsi untuk mengambil data berdasarkan tanggal
    const fetchDataByDate = (date) => {
        // Fetch untuk cell1
        $.ajax({
            url: `<?= base_url('hsmline6/get/temp/right2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_SET_VALUE));
                const valuesRight = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_RIGHT));

                updateOrCreateChart('container', chart, 'TEMP RIGHT', labels, valuesSet, 'L6_HSM2_TEMP_SET_VALUE', valuesRight, 'L6_HSM2_TEMP_RIGHT', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 2:', textStatus, errorThrown);
            }
        });

        // Fetch untuk cell3
        $.ajax({
            url: `<?= base_url('hsmline6/get/temp/left2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_SET_VALUE));
                const valuesLeft = data.data.map(item => parseFloat(item.L6_HSM2_TEMP_LEFT));
                updateOrCreateChart('container2', chart3, 'TEMP LEFT', labels, valuesSet, 'L6_HSM2_TEMP_SET_VALUE', valuesLeft, 'L6_HSM2_TEMP_LEFT', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 2:', textStatus, errorThrown);
            }
        });

    };

    // Fungsi helper untuk membuat/update chart
    const updateOrCreateChart = (containerId, chartInstance, title, labels, valuesSet, seriesName, valuesTemp, SeriesTemp, setChart) => {
        if (chartInstance) {
            chartInstance.series[0].setData(valuesSet);
            chartInstance.series[1].setData(valuesTemp);
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
                    min: 390
                },
                series: [{
                    name: seriesName,
                    data: valuesSet
                }, {
                    name: SeriesTemp,
                    data: valuesTemp
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