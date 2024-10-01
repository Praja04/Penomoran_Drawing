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
                                                    <h1 class="fs-40 text-white">Drawing Trial</h1>
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
                                    <h3>List All Drawing Trial</h3>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="box">
                                            <div class="box-body">
                                                <div class="table-responsive">
                                                    <div class="row">
                                                        <div class="filter-buttons mb-3">
                                                            <h4>Filter Nama Drafter</h4>
                                                            <?php
                                                            // Extract distinct suppliers from the $molds array
                                                            $distinctdrafter = array_unique(array_column($data, 'nama_drafter'));
                                                            ?>
                                                            <select style="margin-top: 9px;" id="drafterFilter" class="form-control">
                                                                <option value="all">All drafters</option>
                                                                <?php foreach ($distinctdrafter as $drafter) : ?>
                                                                    <option value="<?= htmlspecialchars($drafter) ?>"><?= htmlspecialchars($drafter) ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div><br><br>
                                                    <table id="example122" class="table table-bordered table-separated">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Penulis</th>
                                                                <th>Tanggal Order</th>
                                                                <th>Nama Drawing</th>
                                                                <th>File</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="user2">
                                                            <?php $i = 1; ?>
                                                            <?php foreach ($data as $user) : ?>

                                                                <tr>
                                                                    <td><?= $i++; ?></td>
                                                                    <td><?= $user['nama_drafter']; ?></td>
                                                                    <td><?= $user['tanggal_order']; ?></td>
                                                                    <td><?= $user['nama_part']; ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-link btn-pdf-modal" data-pdf="<?= base_url('uploads/trial/' . $user['drawing_pdf']); ?>">
                                                                            <i class="fa fa-file-pdf-o"></i> Lihat PDF
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

        var table = $('#example122').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        $('.btn-pdf-modal').on('click', function() {
            var pdfUrl = $(this).data('pdf');
            $('#pdfViewer').attr('src', pdfUrl);
            $('#pdfModal').modal('show');
        });

        $('#drafterFilter').on('change', function() {
            var filterValue = $(this).val();

            if (filterValue === 'all') {
                // Show all rows
                table.column(1).search('').draw(); // Column 2 for Supplier
            } else {
                // Filter rows by selected supplier
                table.column(1).search('^' + filterValue + '$', true, false).draw(); // Column 2 for Supplier
            }
        });


    });
</script>

<?= $this->endSection() ?>