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
                                                    <h1 class="fs-40 text-white">Drawing Published</h1>
                                                    <p class="text-white mb-0 fs-20">
                                                        PT.Century Batteries Indonesia
                                                    </p>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <img src="<?= base_url() ?>assets\images\custom-15.svg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3>List All Drawing Published</h3>
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
                                                    <table id="example122" class="table table-bordered table-separated text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Number Drawing</th>
                                                                <th>Nama Penulis</th>
                                                                <th>Produksi</th>
                                                                <th>Revisi ke-</th>
                                                                <th>Nama Drawing</th>
                                                                <th>File</th>
                                                                <th>Pengajuan Revisi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="user2">
                                                            <?php $i = 1; ?>
                                                            <?php foreach ($All as $user) : ?>
                                                                <?php if ($user['status'] == 'masspro' && $user['verifikasi_admin'] == 1) : ?>
                                                                    <tr>
                                                                        <td><?= $i++; ?></td>
                                                                        <td><?= $user['number']; ?></td>
                                                                        <td><?= $user['nama_penulis']; ?></td>
                                                                        <td><?= $user['proses_produksi']; ?></td>
                                                                        <td><?php if ($user['revisi'] == null) {
                                                                                echo ('0');
                                                                            } else {
                                                                                echo ($user['revisi']);
                                                                            } ?></td>
                                                                        <td><?= $user['nama_file']; ?></td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-link btn-pdf-modal" data-pdf="<?= base_url('uploads/' . $user['pdf_path']); ?>">
                                                                                <i class="fa fa-file-pdf-o"></i> Lihat PDF
                                                                            </button>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($user['komentar'] != null) : ?>
                                                                                <p>'<?= $user['komentar_pengaju'] ?>' dari <?=$user['nama_pengaju']?></p>
                                                                            <?php else : ?>
                                                                                <button style="margin: 3px;" type="button" class="btn btn-link btn-primary" onclick="PengajuanRevisi(<?php echo $user['id']; ?>)">
                                                                                    <i class="fa fa-commenting"></i>
                                                                                </button>
                                                                            <?php endif; ?>

                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
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

                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pengajuan Revisi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apa alasan untuk revisi drawing ini?</p>
                                <div class="form-group">
                                    <label for="omentar">Komentar:</label>
                                    <textarea id="komentar" class="form-control" rows="4" placeholder="Masukkan alasan..."></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <p>nama anda akan otomatis tercatat sebagai pengaju revisi !</p>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="confirmBtn">Ya, Tolak</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="alertModalLabel">Notif</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="modalMessage">
                                <!-- Message will be inserted here -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
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

        $('.btn-pdf-modal').on('click', function() {
            var pdfUrl = $(this).data('pdf');
            $('#pdfViewer').attr('src', pdfUrl);
            $('#pdfModal').modal('show');
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
            url: baseUrl + 'sub/proses',
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

    function updateTypeProses(selected_type) {
        if (!selected_type) return;

        $.ajax({
            url: baseUrl + 'type/sub',
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
            url: baseUrl + 'type/sub2',
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

    function resetFilters() {
        // Reset nilai semua dropdown ke default (value "")
        $('#filter-select').val('');
        $('#filter-select2').val('');
        $('#filter-select3').val('');
        $('#filter-select4').val('');

        // Panggil filterTable untuk menampilkan semua baris
        filterTable();
    }

    function filterTable() {
        // Ambil nilai dari setiap filter
        var filter1 = $('#filter-select').val().toLowerCase();
        var filter2 = $('#filter-select2').val().toLowerCase();
        var filter3 = $('#filter-select3').val().toLowerCase();
        var filter4 = $('#filter-select4').val().toLowerCase();

        // Ambil semua baris dari tabel
        var rows = $('#user2 tr');

        rows.each(function() {
            var produksi = $(this).find('td:nth-child(4)').text().toLowerCase(); // Kolom Produksi
            var proses = $(this).find('td:nth-child(5)').text().toLowerCase(); // Kolom Proses
            var proses3 = $(this).find('td:nth-child(5)').text().toLowerCase(); // Kolom Proses 3
            var proses4 = $(this).find('td:nth-child(5)').text().toLowerCase(); // Kolom Proses 4

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


    function PengajuanRevisi(idpdf) {
        // Show the confirmation modal
        $('#confirmModal').modal('show');

        // Handle the confirm button click
        $('#confirmBtn').off('click').on('click', function() {
            // Get the feedback
            var komentar = $('#komentar').val();

            // Proceed with AJAX request to update verification result
            $.ajax({
                url: baseUrl + 'pengajuan/revisi/' + idpdf,
                type: 'POST',
                data: {
                    komentar: komentar
                },
                success: function(response) {
                    if (response.success === true) {
                        showModal('Berhasil diajukan');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        showModal('Gagal mengubah hasil verifikasi!');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                },
                complete: function() {
                    $('#confirmModal').modal('hide');
                }
            });
        });
    }

    function showModal(message, callback) {
        $('#modalMessage').text(message);
        $('#alertModal').modal('show');

        if (callback) {
            $('#alertModal').on('hidden.bs.modal', function() {
                callback();
                $(this).off('hidden.bs.modal'); // Remove the callback to avoid multiple triggers
            });
        }
    }
</script>

<?= $this->endSection() ?>