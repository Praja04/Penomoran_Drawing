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
                                    <h1 class="fs-40 text-white">Update Sub Proses</h1>
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
                    <h3>List All Sub Proses</h3>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example122" class="table table-bordered table-separated">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Sub Proses</th>
                                                <th>Jenis Sub Proses</th>
                                                <th>Proses</th>

                                            </tr>
                                        </thead>
                                        <tbody id="user2">
                                            <?php $i = 1;
                                            foreach ($All as $user) : ?>
                                                <tr class="">
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $user['no_sub_proses']; ?></td>
                                                    <td><?= $user['jenis_sub_proses'] ?></td>
                                                    <td><?= $user['proses'] ?></td>


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
                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Form Update Sub Proses</h4>
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
    const baseUrl = "<?= base_url() ?>";

    $(document).ready(function() {
        $('#example122').DataTable({
            "paging": true, // Mengaktifkan pagination
            "lengthChange": true, // Mengaktifkan opsi untuk mengubah jumlah baris yang ditampilkan
            "searching": true, // Mengaktifkan pencarian
            "ordering": true, // Mengaktifkan pengurutan
            "info": true, // Mengaktifkan informasi footer
            "autoWidth": false // Menonaktifkan pengaturan otomatis lebar kolom
        });

        $('#submitBtn').on('click', function() {
            submitData(baseUrl);
        });
    });

    function submitData(baseUrl) {
        var formData = new FormData($('#updatesubproses')[0]);

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
                $(this).off('hidden.bs.modal'); // Remove the callback to avoid multiple triggers
            });
        }
    }
</script>
<?= $this->endSection() ?>