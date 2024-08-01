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
                                    <h1 class="fs-40 text-white">Number Drawing Pdf</h1>
                                    <p class="text-white mb-0 fs-20">
                                        PT.Century Batteries Indonesia
                                    </p>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <img src="<?php base_url() ?>assets\images\custom-15.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3>List Pdf Drawing</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example121" class="table table-bordered table-separated">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Number Drawing</th>
                                                <th>Nama Drawing</th>
                                                <th>Nama Penulis</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Upload Drawing</th>
                                                <th>Action</th>
                                            </tr>
                                            
                                        </thead>

                                        <tbody id="user">

                                            <?php $i = 1;

                                            foreach ($data as $user) : ?>
                                                <?php if ($user['status'] != 'masspro') : ?>
                                                    <tr class="">
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $user['number']; ?></td>
                                                        <td><?= $user['nama_file'] ?></td>
                                                        <td><?= $user['nama_penulis'] ?></td>
                                                        <td><?= $user['created_at'] ?></td>

                                                        <td>
                                                            <?php if ($user['pdf_path'] == null) : ?>
                                                                <button type="button" class="btn btn-primary upload-button" data-bs-toggle="modal" data-bs-target="#modal-right" data-id-pdf="<?= $user['id'] ?>">
                                                                    Upload Pdf
                                                                </button>
                                                            <?php else : ?>
                                                                <p>Sudah Upload</p>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($user['pdf_path'] != null) : ?>
                                                                <a href="<?= base_url('pdf/setStatusMasspro/' . $user['id']); ?>" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin mengubah status menjadi masspro?')">Set Masspro</a>
                                                            <?php else : ?>
                                                                <p>Upload Dahulu !</p>
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

            <!-- modal-->
            <div class="modal modal-right fade" id="modal-right" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Drawing</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="upload-form">
                                <input type="hidden" id="id-pdf" name="id_pdf">
                                <div class="form-group">
                                    <label class="form-label">Upload Drawing:</label>
                                    <input class="form-control" type="file" id="pdf_drawing" name="pdf_drawing" required>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="save-button" class="btn btn-primary float-end">Save changes</button>
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
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
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

        $('.btn-pdf-modal').on('click', function() {
            var pdfUrl = $(this).data('pdf');
            $('#pdfViewer').attr('src', pdfUrl);
            $('#pdfModal').modal('show');
        });

        // Tangkap event saat modal akan ditampilkan
        $('#modal-right').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var idpdf = button.data('id-pdf'); // Ekstrak informasi dari atribut data-*
            var modal = $(this);
            modal.find('#id-pdf').val(idpdf); // Set nilai id_perbaikan di dalam form
        });

        // Event untuk tombol "Save changes"
        $('#save-button').on('click', function() {
            var form = $('#upload-form')[0];
            var formData = new FormData(form);

            $.ajax({
                url: baseUrl + 'pdfnumber/update',
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
                        }, 4000);
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
    });
</script>


<?= $this->endSection() ?>