<?= $this->extend('template/layout'); ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Konten utama -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bg-gradient-primary overflow-hidden pull-up">
                        <div class="box-body pe-0 ps-lg-50 ps-15 py-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-8">
                                    <h1 class="fs-40 text-white">Update Sub Proses</h1>
                                    <p class="text-white mb-0 fs-20">
                                        PT.Century Batteries Indonesia
                                    </p>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <img src="<?= base_url() ?>assets/images/custom-15.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3>Daftar Semua Sub Proses</h3>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example122" class="text-center table table-bordered table-separated">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Sub Proses</th>
                                                <th>Jenis Sub Proses</th>
                                                <th>Proses</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="user2">
                                            <?php $i = 1;
                                            foreach ($All as $user) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $user['no_sub_proses']; ?></td>
                                                    <td><?= $user['jenis_sub_proses'] ?></td>
                                                    <td><?= $user['proses'] ?></td>
                                                    <td>
                                                        <button class="btn btn-danger btn-hapus" data-id="<?= $user['no'] ?>">Hapus</button>
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-left" data-no="<?= $user['no'] ?>" data-sub="<?= $user['jenis_sub_proses'] ?>">Update</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12" id="form1" style="width: 90%;padding-left: 7%;">
                    <!-- Formulir Dasar -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Form Buat Sub Proses Baru</h4><br>
                            <span>Silakan cek nomor sub proses pada tabel!</span>
                        </div>
                        <!-- /.box-header -->
                        <form id="updatesubproses" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="form-label">Nomor Sub Proses :</label>
                                    <input type="text" id="nomor_sub" name="nomor_sub" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jenis Sub Proses :</label>
                                    <input type="text" id="jenis_sub" name="jenis_sub" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Proses :</label>
                                    <select class="form-select" id="proses" name="proses" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="Lead Part">Lead Part</option>
                                        <option value="Grid Casting">Grid Casting</option>
                                        <option value="Lead Powder Pasting">Lead Powder Pasting</option>
                                        <option value="Formation Drying Charging">Formation Drying Charging</option>
                                        <option value="Assembly">Assembly</option>
                                        <option value="Wet">Wet</option>
                                        <option value="MCB">MCB</option>
                                        <option value="Telecom">Telecom</option>
                                        <option value="Wide Strip & Punch Grid">Wide Strip & Punch Grid</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-success" id="submitBtn">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- Modal update -->
            <div class="modal modal-left fade" id="modal-left" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Sub Proses</h5>
                        </div>
                        <div class="modal-body">
                            <form id="update-form">
                                <input type="hidden" id="no" name="no">
                                <div class="form-group">
                                    <label class="form-label">Update :</label>
                                    <input class="form-control" type="text" id="sub_proses" name="sub_proses" required>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer modal-footer-uniform">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="save-update-button" class="btn btn-primary float-end">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus sub proses ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="confirmDeleteBtn">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Notifikasi -->
            <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="alertModalLabel">Notif</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalMessage">
                            <!-- Pesan akan dimasukkan di sini -->
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
    const baseUrl = "<?= base_url() ?>";
    let deleteId = null;

    $(document).ready(function() {
        $('#example122').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        // Submit untuk Create
        $('#submitBtn').on('click', function() {
            submitData(baseUrl);
        });

        $('#modal-left').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var no = button.data('no');
            var sub = button.data('sub');
            var modal = $(this);
            modal.find('#no').val(no);
            modal.find('#sub_proses').attr('placeholder', sub);
        });

        // Update
        $('#save-update-button').on('click', function() {
            var formData = new FormData($('#update-form')[0]);
            $.ajax({
                url: baseUrl + 'update/sub_proses',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showModal(response.message);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });


        // Hapus
        $(document).on('click', '.btn-hapus', function() {
            deleteId = $(this).data('id');
            $('#confirmDeleteModal').modal('show');
        });

        $('#confirmDeleteBtn').on('click', function() {
            if (deleteId) {
                deleteSubProses(baseUrl, deleteId);
            }
            $('#confirmDeleteModal').modal('hide');
        });
    });

    function submitData(baseUrl) {
        var formData = new FormData($('#updatesubproses')[0]);

        $.ajax({
            url: baseUrl + 'create/sub_proses',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                showModal(response.message);
                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function deleteSubProses(baseUrl, id) {
        $.ajax({
            url: baseUrl + 'delete/sub_proses/' + id,
            type: 'POST',
            success: function(response) {
                showModal(response.message);
                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function showModal(message, callback) {
        $('#modalMessage').text(message);
        $('#alertModal').modal('show');

        if (callback) {
            $('#alertModal').on('hidden.bs.modal', function() {
                callback();
                $(this).off('hidden.bs.modal'); // Hapus callback untuk menghindari trigger ganda
            });
        }
    }
</script>

<?= $this->endSection() ?>