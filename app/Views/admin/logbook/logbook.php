<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box no-shadow mb-0 bg-transparent">
                        <div class="box-header no-border px-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="box bg-gradient-primary overflow-hidden pull-up">
                                        <div class="box-body pe-0 ps-lg-50 ps-15 py-0">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-lg-8">
                                                    <h1 class="fs-40 text-white">Log Book Drawing</h1>
                                                    <p class="text-white mb-0 fs-20">
                                                        PT.Century Batteries Indonesia
                                                    </p>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <img src="<?php base_url() ?>\assets\images\custom-15.svg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3>List All Drawing</h3>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="box">
                                            <div class="box-body">
                                                <div class="table-responsive">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Produksi</label>
                                                                <select class="form-select" id="filter-select" style="width: 100px; align-items:right">
                                                                    <option value="">Semua</option>
                                                                    <option value="Produksi 1">Produksi 1</option>
                                                                    <option value="Produksi 2">Produksi 2</option>
                                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Proses</label>
                                                                <select class="form-select" id="filter-select2" style="width: 100px; align-items:right">
                                                                    <option value="">Semua</option>
                                                                    <option value="Lead Part" data-type="Produksi 1" data-proses="Lead Part">Lead Part</option>
                                                                    <option value="Grid Casting" data-type="Produksi 1" data-proses="Grid Casting">Grid Casting</option>
                                                                    <option value="Lead Powder Pasting" data-type="Produksi 1" data-proses="Lead Powder Pasting">Lead Powder Pasting</option>
                                                                    <option value="Formation Drying Charging" data-type="Produksi 1" data-proses="Formation Drying Charging">Formation Drying Charging</option>
                                                                    <option value="Assembly" data-type="Produksi 2" data-proses="Assembly">Assembly</option>
                                                                    <option value="Wet" data-type="Produksi 2" data-proses="Wet">Wet</option>
                                                                    <option value="MCB" data-type="Produksi 2" data-proses="MCB">MCB</option>
                                                                    <option value="Telecom" data-type="Produksi 2" data-proses="Telecom">Telecom</option>
                                                                    <option value="Wide Strip & Punch Grid" data-type="Produksi 1" data-proses="Wide Strip & Punch Grid">Wide Strip & Punch Grid</option>
                                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Sub Proses</label>
                                                                <select class="form-select" id="filter-select3" style="width: 100px; align-items:right">
                                                                    <option value="">Semua</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label">Type Sub Proses</label>
                                                                <select class="form-select" id="filter-select4" style="width: 100px; align-items:right">
                                                                    <option value="">Semua</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button id="reset-button" class="btn btn-secondary mt-2">Reset Filter</button>
                                                        </div>
                                                    </div><br><br>
                                                    <table id="example122" class="table table-bordered table-separated">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Number Drawing</th>
                                                                <th>Nama Drawing</th>
                                                                <th>Nama Penulis</th>
                                                                <th>Tanggal Pengajuan</th>
                                                                <th>Path Drawing</th>
                                                                <th>Produksi</th>
                                                                <th>Drawing</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="user2">
                                                            <?php $i = 1; ?>
                                                            <?php foreach ($data as $user) : ?>

                                                                <tr>
                                                                    <td><?= $i++; ?></td>
                                                                    <td><?= $user['number']; ?></td>
                                                                    <td><?= $user['nama_file']; ?></td>
                                                                    <td><?= $user['nama_penulis']; ?></td>
                                                                    <td><?= $user['created_at']; ?></td>
                                                                    <td><?= $user['pdf_number_string']; ?></td>
                                                                    <td><?= $user['proses_produksi']; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-link" href=" <?= base_url('logbook/' . $user['id']) ?>">
                                                                            <i class="mdi mdi-eye"></i> Lihat
                                                                        </a>
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
                        </div>
                    </div>
                </div>

                <!-- Modal untuk menampilkan PDF -->
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
        </section>
        <!-- /.content -->
    </div>
</div>
<script src="<?= base_url() ?>assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<script>
    const baseUrl = "<?= base_url() ?>";
    $(document).ready(function() {


        $('.btn-pdf-modal').on('click', function() {
            var pdfUrl = $(this).data('pdf');
            $('#pdfViewer').attr('src', pdfUrl);
            $('#pdfModal').modal('show');
        });

        handleProsesChange();
        handleItemChange();

        // Event listener untuk setiap perubahan pada dropdown
        $('#filter-select, #filter-select2, #filter-select3, #filter-select4').change(function() {
            filterTable();
        });

        // Event listener untuk tombol reset
        $('#reset-button').click(function() {
            resetFilters();
        });

        $('#example122').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

    function filterTable() {
        // Ambil nilai dari setiap filter
        var filter1 = $('#filter-select').val().toLowerCase();
        var filter2 = $('#filter-select2').val().toLowerCase();
        var filter3 = $('#filter-select3').val().toLowerCase();
        var filter4 = $('#filter-select4').val().toLowerCase();

        // Ambil semua baris dari tabel
        var rows = $('#user2 tr');

        rows.each(function() {
            var produksi = $(this).find('td:nth-child(7)').text().toLowerCase(); // Kolom Produksi
            var proses = $(this).find('td:nth-child(6)').text().toLowerCase(); // Kolom Proses
            var proses3 = $(this).find('td:nth-child(6)').text().toLowerCase(); // Kolom Proses 3
            var proses4 = $(this).find('td:nth-child(6)').text().toLowerCase(); // Kolom Proses 4

            // Inisialisasi variabel untuk mengecek apakah baris sesuai dengan filter
            var match1 = filter1 === "" || produksi.includes(filter1);
            var match2 = filter2 === "" || proses.includes(filter2);
            var match3 = filter3 === "" || proses3.includes(filter3);
            var match4 = filter4 === "" || proses4.includes(filter4);

            // Hanya tampilkan baris yang sesuai dengan semua filter yang aktif
            if (match1 && match2 && match3 && match4) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    function handleProsesChange() {
        $('#filter-select2').on('change', function() {
            const proses = $(this).find('option:selected');
            var selected_sub = proses.data('proses');
            updateSubProses(selected_sub);
            console.log($('#nama_file').val());
        });
    }

    function updateSubProses(selected_sub) {
        if (!selected_sub) return;

        $.ajax({
            url: baseUrl + '/sub/proses',
            type: 'GET',
            data: {
                proses: selected_sub
            },
            success: function(response) {
                console.log(response);
                const sub_proses = $('#filter-select3');
                sub_proses.empty();
                sub_proses.append('<option value="">Semua</option>');
                if (response.error) {
                    console.error(response.error);
                    return;
                }

                response.forEach(function(item) {
                    const option = $('<option></option>')
                        .val(item.jenis_sub_proses)
                        .text(item.jenis_sub_proses)
                        .data('no_subProses', item.no_sub_proses);
                    sub_proses.append(option);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error in AJAX request:', status, error);
            }
        });
    }

    function handleItemChange() {
        $('#filter-select3').on('change', function() {
            var selectedOption2 = $(this).find('option:selected');
            var selectedOption = $('#filter-select2').find('option:selected');
            var data = selectedOption.data('proses');
            var selected_type = selectedOption2.val();
            if (selected_type == 'Connector' || selected_type == 'Pole' || selected_type == 'Bushing') {
                updateTypeProses2(selected_type);
            } else {
                updateTypeProses(data);
            }
        });
    }

    function updateTypeProses(selected_type) {
        if (!selected_type) return;

        $.ajax({
            url: baseUrl + '/type/sub',
            type: 'GET',
            data: {
                typesub: selected_type
            },
            success: function(response) {
                console.log(response);
                const type_sub = $('#filter-select4');
                type_sub.empty();
                type_sub.append('<option value="">Semua</option>');
                if (response.error) {
                    console.error(response.error);
                    return;
                }

                response.forEach(function(item) {
                    const option = $('<option></option>')
                        .val(item.type_sub_proses)
                        .text(item.type_sub_proses)
                        .data('no_type', item.no_type);
                    type_sub.append(option);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error in AJAX request:', status, error);
            }
        });
    }

    function updateTypeProses2(selected_type) {
        if (!selected_type) return;

        $.ajax({
            url: baseUrl + '/type/sub2',
            type: 'GET',
            data: {
                subProses: selected_type
            },
            success: function(response) {
                console.log(response);
                const type_sub = $('#filter-select4');
                type_sub.empty();
                type_sub.append('<option value="">Semua</option>');
                if (response.error) {
                    console.error(response.error);
                    return;
                }

                response.forEach(function(item) {
                    const option = $('<option></option>')
                        .val(item.type_sub_proses)
                        .text(item.type_sub_proses)
                        .data('no_type', item.no_type);
                    type_sub.append(option);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error in AJAX request:', status, error);
            }
        });
    }

    function resetFilters() {
        // Reset nilai semua dropdown ke default (value "")
        $('#filter-select').val('');
        $('#filter-select2').val('');
        $('#filter-select3').val('');
        $('#filter-select4').val('');

        // Panggil filterTable untuk menampilkan semua baris
        filterTable();
    }
</script>

<?= $this->endSection() ?>