<?= $this->extend('template/layout'); ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bg-gradient-primary overflow-hidden pull-up">
                        <div class="box-body pe-0 ps-lg-50 ps-15 py-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-8">
                                    <h1 class="fs-40 text-white">Status Order Drawing <?= $nama ?></h1>
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
            <div class="row">
                <div class="text-center col-lg-12 col-12">
                    <h2>Status Order Anda</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        <div class="col-6">
                            <a class="box box-link-shadow text-center" href="<?= base_url('status/open') ?>">
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
                            <a class="box box-link-shadow text-center" href="<?= base_url('status/over') ?>">
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
                            <a class="box box-link-shadow text-center" href="<?= base_url('status/proses') ?>">
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
                            <a class="box box-link-shadow text-center" href="<?= base_url('status/done') ?>">
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
                        <div class="col-6">

                            <a class="box box-link-shadow text-center" href="<?= base_url('status/generate') ?>">
                                <div class="box-body">
                                    <div class="fs-24">
                                        <h3>Has been Generate</h3>
                                    </div>
                                    <br>
                                    <span>(Sudah Digenerate)</span>
                                </div>
                                <div class="box-body bg-secondary btsr-0 bter-0">
                                    <p>
                                        <span class="mdi mdi-briefcase fs-30"></span>
                                    </p>
                                </div>
                            </a>
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
                                                <th>Upload</th>
                                                <th>Generate Number Drawing</th>

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
                                                            <button style="margin: 2px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-id-status="<?= $user['id'] ?>" data-bs-target="#modal-center-proses">
                                                                ubah
                                                            </button>
                                                        <?php elseif ($user['status'] == 'proses') : ?>
                                                            <button style="margin: 2px;" class="btn btn-warning">On Progress</button>
                                                            <button style="margin: 2px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-id-status="<?= $user['id'] ?>" data-bs-target="#modal-center-done">
                                                                ubah
                                                            </button>
                                                        <?php elseif ($user['status'] == 'selesai') : ?>
                                                            <button class="btn btn-success">Done</button>
                                                        <?php else : ?>
                                                            -
                                                        <?php endif; ?>

                                                    </td>

                                                    <td>
                                                        <?php if ($user['status'] == 'selesai' && $user['drawing_pdf'] == null) : ?>

                                                            <button type="button" class="btn btn-primary upload-button" data-bs-toggle="modal" data-bs-target="#modal-right" data-id-pdf="<?= $user['id'] ?>">
                                                                Upload Pdf
                                                            </button>

                                                        <?php elseif ($user['status'] == 'selesai' && $user['drawing_pdf'] != null) : ?>

                                                            <button type="button" class="btn btn-success btn-pdf-modal" data-pdf="<?= base_url('uploads/trial/' . $user['drawing_pdf']); ?>">
                                                                <i class="fa fa-file-pdf-o"></i> Lihat PDF
                                                            </button>
                                                            <button type="button" class="btn btn-warning ganti-button" data-bs-toggle="modal" data-bs-target="#modal-left" data-id-pdf="<?= $user['id'] ?>">Ganti PDF</button>

                                                        <?php else : ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($user['drawing_pdf'] != null && $user['number_pdf'] == null) : ?>
                                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-id-status="<?= $user['id'] ?>" data-bs-target="#modal-generate">
                                                                Generate
                                                            </button>
                                                        <?php else : ?>
                                                            -
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

            <!-- modal-->
            <div class="modal center-modal fade" id="modal-generate" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Generate Number Drawing</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form1-content">
                                <div class="box-body">
                                    <input type="hidden" id="id-order" name="id-order">
                                    <div class="form-group">
                                        <label class="form-label">Nama File :</label>
                                        <input type="text" id="nama_file" name="nama_file" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Kategori Drawing :</label>
                                        <select class="form-select" name="group2" id="group2" required>
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <option value="0" data-group2="Other">Other</option>
                                            <option value="1" data-group2="Jig & Tools">Jig & Tools</option>
                                            <option value="2" data-group2="Mesin">Mesin</option>
                                            <option value="3" data-group2="Layout">Layout</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="proses-produksi-group">
                                        <label class="form-label">Proses Produksi :</label>
                                        <select class="form-select" name="group3" id="group3" required>
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <option value="0" data-type="Other" data-proses="Other">Other</option>
                                            <option value="1" data-type="Produksi 1" data-proses="Lead Part">Lead Part</option>
                                            <option value="2" data-type="Produksi 1" data-proses="Grid Casting">Grid Casting</option>
                                            <option value="3" data-type="Produksi 1" data-proses="Lead Powder Pasting">Lead Powder Pasting</option>
                                            <option value="4" data-type="Produksi 1" data-proses="Formation Drying Charging">Formation Drying Charging</option>
                                            <option value="5" data-type="Produksi 2" data-proses="Assembly">Assembly</option>
                                            <option value="6" data-type="Produksi 2" data-proses="Wet">Wet</option>
                                            <option value="7" data-type="Produksi 2" data-proses="MCB">MCB</option>
                                            <option value="8" data-type="Produksi 2" data-proses="Telecom">Telecom</option>
                                            <option value="9" data-type="Produksi 1" data-proses="Wide Strip & Punch Grid">Wide Strip & Punch Grid</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="sub-proses-produksi-group">
                                        <label class="form-label">Sub Proses Produksi:</label>
                                        <select class="form-select" name="sub_proses" id="sub_proses" required>
                                            <option value="" disabled selected>Pilih Opsi</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="type-sub-proses-produksi-group">
                                        <label class="form-label">Type Sub Proses Produksi:</label>
                                        <select class="form-select" name="type_sub" id="type_sub" required>
                                            <option value="">Pilih Item</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="nomor_mesin">
                                        <label class="form-label">Nomer mesin :</label>
                                        <select class="form-select" name="no_mesin" id="no_mesin" required>
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <option value="L1" data-mesin="Line 1(A)">Line 1 A</option>
                                            <option value="L2" data-mesin="Line 2(A)">Line 2 A</option>
                                            <option value="L3" data-mesin="Line 3(A)">Line 3 A</option>
                                            <option value="L4" data-mesin="Line 4(G)">Line 4 G</option>
                                            <option value="L5" data-mesin="Line 5(G)">Line 5 G</option>
                                            <option value="L6" data-mesin="Line 6(G)">Line 6 G</option>
                                            <option value="L7" data-mesin="Line 7(G)">Line 7 G</option>
                                            <option value="M1" data-mesin="Mesin 1">Mesin 1</option>
                                            <option value="M2" data-mesin="Mesin 2">Mesin 2</option>
                                            <option value="M3" data-mesin="Mesin 3">Mesin 3</option>
                                            <option value="00" data-mesin="">General</option>
                                            <option value="M(N)" data-mesin="">Nomor Mesin Lainnya</option>
                                        </select>
                                        <div id="additional-input-container"></div>
                                    </div>
                                    <div class="form-group" id="nomor_mesin2">
                                        <label class="form-label">Nomer mesin :</label>
                                        <select class="form-select" name="no_mesin2" id="no_mesin2" required>
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <option value="PCE" data-mesin="Proses Eng">Proses Eng</option>
                                            <option value="PDE" data-mesin="Product Eng">Product Eng</option>
                                            <option value="QC0" data-mesin="Quality">Quality</option>
                                            <option value="MTN" data-mesin="Maintenance">Maintenance</option>
                                            <option value="PR1" data-mesin="Produksi 1">Produksi 1</option>
                                            <option value="PR2" data-mesin="Produksi 2">Produksi 2</option>
                                            <option value="GA0" data-mesin="General Affair">General Affair</option>
                                            <option value="EHS" data-mesin="EHS">EHS</option>
                                            <option value="000" data-mesin="">Other</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-success" id="submitBtn">Submit</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal center-modal fade" id="modal-center-proses" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Status Order Drawing</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="upload-form-proses">
                                <input type="hidden" id="id-order" name="id-order">
                                <div class="form-group">
                                    <label class="form-label">Status Order Drawing :</label>
                                    <select class="form-select" name="status" id="status" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="proses">On Progress</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" id="save-button-proses" class="btn btn-primary float-end">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal center-modal fade" id="modal-center-done" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Status Order Drawing</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="upload-form-done">
                                <input type="hidden" id="id-order" name="id-order">
                                <div class="form-group">
                                    <label class="form-label">Status Order Drawing :</label>
                                    <select class="form-select" name="status" id="status" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="selesai">Done</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" id="save-button-done" class="btn btn-primary float-end">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-left fade" id="modal-left" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Ulang Drawing</h5>
                        </div>
                        <div class="modal-body">
                            <form id="upload-ulang-form">
                                <input type="hidden" id="id-pdf" name="id_pdf">
                                <div class="form-group">
                                    <label class="form-label">Upload Drawing:</label>
                                    <input class="form-control" type="file" id="pdf_drawing" name="pdf_drawing" required>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="save-ulang-button" class="btn btn-primary float-end">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-right fade" id="modal-right" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Drawing</h5>

                        </div>
                        <div class="modal-body">
                            <form id="upload-form-pdf">
                                <input type="hidden" id="id-pdf" name="id_pdf">
                                <div class="form-group">
                                    <label class="form-label">Upload Drawing:</label>
                                    <input class="form-control" type="file" id="pdf_drawing" name="pdf_drawing" required>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="save-button-pdf" class="btn btn-primary float-end">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

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
                            <button type="button" class="btn btn-primary" id="modalok" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        const baseUrl = "<?= base_url() ?>";

        // Initialize DataTable with options
        var table = $('#example121').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
        $('#modal-generate').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idstatus = button.data('id-status');
            var modal = $(this);
            modal.find('#id-order').val(idstatus);
        });
        // Tangkap event saat modal akan ditampilkan
        $('#modal-center-proses').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idstatus = button.data('id-status');
            var modal = $(this);
            modal.find('#id-order').val(idstatus);
        });
        $('#modal-center-done').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idstatus = button.data('id-status');
            var modal = $(this);
            modal.find('#id-order').val(idstatus);
        });

        // Event untuk tombol "Save changes"
        $('#save-button-proses').on('click', function() {
            var form = $('#upload-form-proses')[0];
            var formData = new FormData(form);

            $.ajax({
                url: baseUrl + 'update/status',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.message) {
                        showModal('Data berhasil diperbarui!');
                        $('#modal-center').modal('hide');

                    } else if (response.error) {
                        showModal('Gagal memperbarui data: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    showModal('Terjadi kesalahan saat mengirim data.');
                }
            });
            $('#modalok').on('click', function() {
                location.reload();
            });
        });

        $('#save-button-done').on('click', function() {
            var form = $('#upload-form-done')[0];
            var formData = new FormData(form);

            $.ajax({
                url: baseUrl + 'update/status',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.message) {
                        showModal('Data berhasil diperbarui!');
                        $('#modal-center').modal('hide');

                    } else if (response.error) {
                        showModal('Gagal memperbarui data: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    showModal('Terjadi kesalahan saat mengirim data.');
                }
            });
            $('#modalok').on('click', function() {
                location.reload();
            });
        });

        $('.btn-pdf-modal').on('click', function() {
            var pdfUrl = $(this).data('pdf');
            $('#pdfViewer').attr('src', pdfUrl);
            $('#pdfModal').modal('show');
        });

        // Tangkap event saat modal akan ditampilkan
        $('#modal-right').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); 
            var idpdf = button.data('id-pdf');
            var modal = $(this);
            modal.find('#id-pdf').val(idpdf); 
        });

        $('#modal-left').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var idpdf = button.data('id-pdf'); // Ekstrak informasi dari atribut data-*
            var modal = $(this);
            modal.find('#id-pdf').val(idpdf); // Set nilai id_perbaikan di dalam form
        });

        // Event untuk tombol "Save changes"
        $('#save-ulang-button').on('click', function() {
            var formData = new FormData($('#upload-ulang-form')[0]);
            $.ajax({
                url: baseUrl + 'trial/pdf/' + $('#id-pdf').val(),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // $('$modal-left').modal('hide');
                        showModal(response.message);
                    } else {
                        showModal(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
            $('#modalok').on('click', function() {
                location.reload();
            });
        });

        $('#save-button-pdf').on('click', function() {
            var form = $('#upload-form-pdf')[0];
            var formData = new FormData(form);

            $.ajax({
                url: baseUrl + 'trial/update',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.message) {
                        showModal('Data berhasil diperbarui!');
                        $('#modal-right').modal('hide');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else if (response.error) {
                        showModal('Gagal memperbarui data: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    showModal('Terjadi kesalahan saat mengirim data.');
                }
            });
        });

        $('#group2').change(function() {
            if ($(this).val() == '0') { // 0 adalah nilai untuk "Other"
                $('#sub-proses-produksi-group').hide();
                $('#type-sub-proses-produksi-group').hide();
                $('#nomor_mesin').hide();
                $('#nomor_mesin2').show();

                $('#sub_proses').prop('required', false);
                $('#type_sub').prop('required', false);
                $('#no_mesin').prop('required', false);
                $('#no_mesin2').prop('required', true);
            } else {
                $('#sub-proses-produksi-group').show();
                $('#type-sub-proses-produksi-group').show();
                $('#nomor_mesin').show();
                $('#nomor_mesin2').hide();

                $('#sub_proses').prop('required', true);
                $('#type_sub').prop('required', true);
                $('#no_mesin').prop('required', true);
                $('#no_mesin2').prop('required', false);
            }
        });
        initializeDocument(baseUrl);
    });


    function initializeDocument(baseUrl) {
        handleProsesChange(baseUrl);
        handleItemChange(baseUrl);
        handleNoMesinChange();
        $('#submitBtn').on('click', function() {
            handleSubmit(baseUrl);
        });
    }

    function handleNoMesinChange() {
        $('#no_mesin').on('change', function() {
            const selectedOption = $(this).val();
            const additionalInputContainer = $('#additional-input-container');

            if (selectedOption === 'M(N)') {
                additionalInputContainer.html(
                    `<div class="form-group">
                        <label class="form-label">Masukkan Nomor Mesin:</label>
                        <input type="text" id="input_no_mesin" name="input_no_mesin" class="form-control" placeholder="Masukkan Nomor Mesin" required>
                    </div>`
                );
            } else {
                additionalInputContainer.empty();
            }
        });
    }

    function handleProsesChange(baseUrl) {
        $('#group3').on('change', function() {
            const proses = $(this).find('option:selected');
            var selected_sub = proses.data('proses');
            updateSubProses(baseUrl, selected_sub);
        });
    }

    function updateSubProses(baseUrl, selected_sub) {
        if (!selected_sub) return;

        $.ajax({
            url: baseUrl + 'sub/proses',
            type: 'GET',
            data: {
                proses: selected_sub
            },
            success: function(response) {
                const sub_proses = $('#sub_proses');
                sub_proses.empty();
                sub_proses.append('<option value="" disabled selected>Pilih Opsi</option>');
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

                // Tambahkan opsi 'Other'
                const otherOption = $('<option></option>')
                    .val('Other')
                    .text('Other')
                    .data('no_subProses', '00');
                sub_proses.append(otherOption);

            },
            error: function(xhr, status, error) {
                console.error('Error in AJAX request:', status, error);
            }
        });
    }

    function handleItemChange(baseUrl) {
        $('#sub_proses').on('change', function() {
            var selectedOption2 = $(this).find('option:selected');
            var selectedOption = $('#group3').find('option:selected');
            var data = selectedOption.data('proses');
            var selected_type = selectedOption2.val();
            if (selected_type == 'Connector' || selected_type == 'Pole' || selected_type == 'Bushing') {
                updateTypeProses2(baseUrl, selected_type);
            } else {
                updateTypeProses(baseUrl, data);
            }
        });
    }

    function updateTypeProses(baseUrl, selected_type) {
        if (!selected_type) return;

        $.ajax({
            url: baseUrl + 'type/sub',
            type: 'GET',
            data: {
                typesub: selected_type
            },
            success: function(response) {
                console.log(response);
                const type_sub = $('#type_sub');
                type_sub.empty();
                type_sub.append('<option value="" disabled selected>Pilih Opsi</option>');
                if (response.error) {
                    console.error(response.error);
                    return;
                }
                // Tambahkan opsi 'Other'
                const otherOption = $('<option></option>')
                    .val('Other')
                    .text('Other')
                    .data('no_type', '00');
                type_sub.append(otherOption);
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

    function updateTypeProses2(baseUrl, selected_type) {
        if (!selected_type) return;

        $.ajax({
            url: baseUrl + 'type/sub2',
            type: 'GET',
            data: {
                subProses: selected_type
            },
            success: function(response) {
                console.log(response);
                const type_sub = $('#type_sub');
                type_sub.empty();
                type_sub.append('<option value="" disabled selected>Pilih Opsi</option>');
                if (response.error) {
                    console.error(response.error);
                    return;
                }
                // Tambahkan opsi 'Other'
                const otherOption = $('<option></option>')
                    .val('Other')
                    .text('Other')
                    .data('no_type', '00');
                type_sub.append(otherOption);

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

    function handleSubmit(baseUrl) {
        const inputs = $('#form1-content').find('input, select');
        let isValid = true;

        inputs.each(function() {
            if ($(this).prop('required') && !$(this).val()) {
                showModal('Semua inputan harus diisi.');
                $(this).focus();
                isValid = false;
                return false;
            }
        });

        if (isValid) {
            submitData(baseUrl);
        }
    }

    function submitData(baseUrl) {
        var formData = new FormData();
        formData.append('nama_file', $('#nama_file').val());
        let group2 = $('#group2').val();
        formData.append('group2', group2);

        let no_mesin_string = '';

        if (group2 == '0') {
            formData.append('group3', $('#group3').val());
            formData.append('sub_proses', '00');
            formData.append('type_sub', '00');
            formData.append('no_mesin', $('#no_mesin2').val());
            no_mesin_string = $('#no_mesin2').find(':selected').data('mesin') || '';
            formData.append('no_mesin-string', no_mesin_string);
            formData.append('group2-string', $('#group2').find(':selected').data('group2'));
            formData.append('group3-string', $('#group3').find(':selected').data('proses'));
            formData.append('sub_proses-string', 'other');
            formData.append('type_sub-string', 'other');

        } else {
            formData.append('group3', $('#group3').val());
            let no_mesin = $('#no_mesin').val();
            let no_mesin_string = $('#no_mesin').find(':selected').data('mesin');

            if (no_mesin === 'M(N)') {
                no_mesin = $('#input_no_mesin').val();
                no_mesin_string = 'Mesin ke ' + no_mesin; // Change this line
            }
            formData.append('no_mesin', no_mesin);
            formData.append('sub_proses', $('#sub_proses').find(':selected').data('no_subProses'));
            formData.append('type_sub', $('#type_sub').find(':selected').data('no_type'));
            formData.append('proses_produksi', $('#group3').find(':selected').data('type'));

            formData.append('no_mesin-string', no_mesin_string);
            formData.append('group2-string', $('#group2').find(':selected').data('group2'));
            formData.append('group3-string', $('#group3').find(':selected').data('proses'));
            formData.append('sub_proses-string', $('#sub_proses').val());
            formData.append('type_sub-string', $('#type_sub').val());
            formData.append('id-order', $('#id-order').val());
        }

        $.ajax({
            url: baseUrl + 'pdfnumber/generate',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const pdfnumber = response.generated_number;
                updateStatus(baseUrl, pdfnumber);
                showModal(response.message);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                showModal('Terjadi kesalahan saat mengirim data.');
            }
        });
    }

    //update status menjadi nomor generate
    function updateStatus(baseUrl, pdfnumber) {
        var formData = new FormData();
        formData.append('status', pdfnumber);
        formData.append('id-order', $('#id-order').val());
        $.ajax({
            url: baseUrl + 'update/status/number',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.message) {
                    $('#modal-center').modal('hide');
                    $('#modal-generate').modal('show');
                } else if (response.error) {
                    showModal('Gagal memperbarui data: ' + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                showModal('Terjadi kesalahan saat mengirim data.');
            }
        });
        $('#modalok').on('click', function() {
            location.reload();
        });
    }

    function showModal(message, callback) {
        $('#modalMessage').text(message);
        $('#alertModal').modal('show');

        if (callback) {
            $('#alertModal').on('hidden.bs.modal', function() {
                callback();
                $(this).off('hidden.bs.modal'); 
            });
        }
    }
</script>

<?= $this->endSection() ?>