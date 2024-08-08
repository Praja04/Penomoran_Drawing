<?= $this->extend('template/layout'); ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bg-gradient-secondary overflow-hidden pull-up">
                        <div class="box-body pe-0 ps-lg-50 ps-15 py-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-8">
                                    <h1 class="fs-40 text-white">Status Order Has Been Generate</h1>
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
                                                <th>Keterangan </th>
                                                <th>Tanggal Order</th>
                                                <th>Due Date</th>
                                                <th>File</th>
                                                <th>Number Generate</th>
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
                                                    <td>
                                                        <button type="button" class="btn btn-link btn-pdf-modal" data-pdf="<?= base_url('uploads/trial/' . $user['drawing_pdf']); ?>">
                                                            <i class="fa fa-file-pdf-o"></i> Lihat PDF
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <?= $user['number_pdf'] ?>
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
</script>



<?= $this->endSection() ?>