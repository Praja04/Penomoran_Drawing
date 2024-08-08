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
                                                <th>Nama Drafter</th>
                                                <th>Nama Part Drawing</th>
                                                <th>Order From </th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Order</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                            </tr>

                                        </thead>
                                        <tbody id="user">
                                            <?php $i = 1;
                                            foreach ($status as $user) : ?>

                                                <tr class="">
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $user['nama_drafter']; ?></td>
                                                    <td><?= $user['nama_part']; ?></td>
                                                    <td><?= $user['order_from'] ?></td>
                                                    <td><?= $user['keterangan'] ?></td>
                                                    <td><?= $user['tanggal_order'] ?></td>
                                                    <td><?= $user['tanggal_jatuh_tempo'] ?></td>
                                                    <td><?=$user['status']?></td>
                                                   
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
      
    });
</script>



<?= $this->endSection() ?>