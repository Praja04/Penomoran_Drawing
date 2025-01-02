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
    // Variabel untuk chart
    let chart, chart3;
    const updateInterval = 100000; // Interval untuk update data

    // Fungsi untuk mengambil data suhu kanan
    const fetchDataRight1 = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/get/temp/right2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                // Ambil data dari response
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE) || 0);
                const valuesRight = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_RIGHT) || 0);

                // Update atau buat chart
                updateOrCreateChart('container', chart, 'TEMP RIGHT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesRight, 'L5_HSM2_TEMP_RIGHT', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm2:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk mengambil data suhu kiri
    const fetchDataLeft1 = () => {
        $.ajax({
            url: '<?= base_url('hsmline5/get/temp/left2') ?>',
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE) || 0);
                const valuesLeft = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_LEFT) || 0);

                updateOrCreateChart('container2', chart3, 'TEMP LEFT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesLeft, 'L5_HSM2_TEMP_LEFT', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm1:', textStatus, errorThrown);
            }
        });
    };

    // Fungsi untuk mengambil data berdasarkan tanggal
    const fetchDataByDate = (date) => {
        // Fetch untuk suhu kanan
        $.ajax({
            url: `<?= base_url('hsmline5/get/temp/right2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE) || 0);
                const valuesRight = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_RIGHT) || 0);

                updateOrCreateChart('container', chart, 'TEMP RIGHT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesRight, 'L5_HSM2_TEMP_RIGHT', (newChart) => {
                    chart = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp right hsm 1:', textStatus, errorThrown);
            }
        });

        // Fetch untuk suhu kiri
        $.ajax({
            url: `<?= base_url('hsmline5/get/temp/left2/date/') ?>${date}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                const labels = data.data.map(item => item.waktu);
                const valuesSet = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_SET_VALUE) || 0);
                const valuesLeft = data.data.map(item => parseFloat(item.L5_HSM2_TEMP_LEFT) || 0);

                updateOrCreateChart('container2', chart3, 'TEMP LEFT', labels, valuesSet, 'L5_HSM2_TEMP_SET_VALUE', valuesLeft, 'L5_HSM2_TEMP_LEFT', (newChart) => {
                    chart3 = newChart;
                });
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error('Error fetching data for temp left hsm 2:', textStatus, errorThrown);
            }
        });
    };
    // Fungsi helper untuk membuat atau memperbarui chart
    const updateOrCreateChart = (containerId, chartInstance, title, labels, valuesSet, seriesName, valuesTemp, seriesTemp, setChart) => {
        console.log('Creating or updating chart for:', containerId); // Log untuk debugging
        if (chartInstance) {
            // Jika chart sudah ada, update data
            chartInstance.series[0].setData(valuesSet);
            chartInstance.series[1].setData(valuesTemp);
            chartInstance.xAxis[0].setCategories(labels);
        } else {
            // Jika chart belum ada, buat chart baru
            const newChart = Highcharts.chart(containerId, {
                chart: {
                    type: 'line'
                },
                title: {
                    text: title
                },
                xAxis: {
                    labels: {
                        enabled: true, // Mengaktifkan label pada sumbu X
                    },
                    categories: labels,
                    title: {
                        text: 'Waktu'
                    },
                    reversed: true // Membalik urutan kategori
                },
                yAxis: {
                    title: {
                        text: 'Nilai'
                    },
                    min: 350 // Set nilai minimum sumbu Y
                },
                series: [{
                    name: seriesName,
                    data: valuesSet
                }, {
                    name: seriesTemp,
                    data: valuesTemp
                }]
            });
            setChart(newChart); // Set chart baru
        }
    };

    // Fungsi untuk memperbarui chart secara real-time
    const updateCharts = () => {
        const selectedSource = $('#data-source').val();
        if (selectedSource === 'realtime') {
            fetchDataRight1();
            fetchDataLeft1();
            setTimeout(updateCharts, updateInterval); // Set interval untuk update data
        }
    };

    // Event listener untuk dropdown
    $('#data-source').on('change', function() {
        const selectedSource = $(this).val();
        if (selectedSource === 'date') {
            $('#date-input').show(); // Tampilkan input tanggal
            $('#fetch-data').show(); // Tampilkan tombol fetch
            // Reset charts
            chart = chart3 = null; // Reset chart
        } else {
            $('#date-input').hide(); // Sembunyikan input tanggal
            $('#fetch-data').hide(); // Sembunyikan tombol fetch
            updateCharts(); // Mulai update chart
        }
    });

    // Event listener untuk tombol fetch
    $('#fetch-data').on('click', function() {
        const selectedDate = $('#date-input').val();
        if (selectedDate) {
            fetchDataByDate(selectedDate); // Ambil data berdasarkan tanggal
        } else {
            alert('Please select a date.'); // Peringatan jika tanggal tidak dipilih
        }
    });

    // Inisialisasi awal
    fetchDataRight1(); // Ambil data suhu kanan
    fetchDataLeft1(); // Ambil data suhu kiri
    updateCharts(); // Mulai update chart
</script>
<?= $this->endSection() ?>