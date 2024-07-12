<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <title>PT. Century Batteries Indonesia - Pilih Peran</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/main/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/main/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/main/css/skin_color.css">
</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(<?= base_url() ?>assets/images/download1.jpg)">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="text-primary">Pilih Peran</h2>
                                <p class="mb-0">Silahkan pilih peran yang sesuai</p>
                            </div>
                            <div class="p-40">
                                <?= form_open('auth/set_role') ?>
                                <div class="form-group">
                                    <label for="role">Peran:</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="uploader">Uploader</option>
                                        <option value="reader">Reader</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary mt-10">Pilih</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="mt-20 text-white">- PT. Century Batteries Indonesia -</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="<?= base_url() ?>assets/template/main/js/vendors.min.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/pages/chat-popup.js"></script>
    <script src="<?= base_url() ?>assets/icons/feather-icons/feather.min.js"></script>
</body>

</html>