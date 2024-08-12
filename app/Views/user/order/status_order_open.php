<?= $this->extend('template/layout'); ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bg-gradient-info overflow-hidden pull-up">
                        <div class="box-body pe-0 ps-lg-50 ps-15 py-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-8">
                                    <h1 class="fs-40 text-white">Status Order Open</h1>
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
                                                <th>Keterangan</th>
                                                <th>Tanggal Order</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody id="user">
                                            <?php $i = 1;
                                            foreach ($status as $user) : ?>

                                                <tr class="">
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $user['nama_part']; ?></td>
                                                    <td><?= $user['order_from'] ?></td>
                                                    <td><?= $user['keterangan'] ?></td>
                                                    <td><?= $user['tanggal_order'] ?></td>
                                                    <td><?= $user['tanggal_jatuh_tempo'] ?></td>
                                                    <td><?= $user['status'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-id-status="<?= $user['id'] ?>" data-bs-target="#modal-center">
                                                            Ubah Status
                                                        </button>
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
            <div class="modal center-modal fade" id="modal-center" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Status Order Drawing</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="upload-form">
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
                            <button type="button" id="save-button" class="btn btn-primary float-end">
                                Save changes
                            </button>
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

        // Tangkap event saat modal akan ditampilkan
        $('#modal-center').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idstatus = button.data('id-status');
            var modal = $(this);
            modal.find('#id-order').val(idstatus);
        });

        // Event untuk tombol "Save changes"
        $('#save-button').on('click', function() {
            var form = $('#upload-form')[0];
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