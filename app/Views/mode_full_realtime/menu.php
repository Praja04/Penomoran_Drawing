<?= $this->extend('template_mode/layout_menu_utama'); ?>

<?= $this->section('content'); ?>
<div class="container-full">


    <!-- Main content -->
    <section class="content" style="margin-top: 10%;">

        <div class="row">
            <h1 class="text-center" style="color:white; margin-bottom:5%;">Digitalisasi Parameter Proses Battery</h1>
            <div class="col-12 col-lg-2 pull-up"></div>
            <div class="col-12 col-lg-3 pull-up">
                <div class="box ribbon-box" style="width:400px;">
                    <div class="box-header no-border p-5 text-center">
                        <a href="<?= base_url('produksi1') ?>">
                            <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="text-center">
                            <h3 class="my-10"><a href="<?= base_url('produksi1') ?>">Produksi 1</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 pull-up">
                <div class="box ribbon-box" style="width:400px;">
                    <div class="box-header no-border p-5 text-center">
                        <a href="<?= base_url('produksi2') ?>">
                            <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="text-center">
                            <h3 class="my-10"><a href="<?= base_url('produksi2') ?>">Produksi 2</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 pull-up">
                <div class="box ribbon-box" style="width:400px;">
                    <div class="box-header no-border p-5 text-center">
                        <a href="<?= base_url('charging') ?>">
                            <img style="width: 100px;" class="img-fluid" src="<?= base_url('assets/images/menu/factory-machine.png') ?>" alt="">
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="text-center">
                            <h3 class="my-10"><a href="<?= base_url('charging') ?>">Charging & Industrial Battery</a></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>