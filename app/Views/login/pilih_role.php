<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <title>Pilih Role - PT. Century Batteries Indonesia</title>

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
                <div class="row justify-content-center g-0">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0 text-center">
                                <img src="<?= base_url() ?>assets/images/logo_cbi_tulisan.png" alt="">
                                <h2 class="mt-3">Pilih Peran Anda</h2>
                            </div>
                            <div class="p-40">
                                <form action="<?= base_url('auth/proses_pilih_role') ?>" method="post">
                                    <input type="hidden" name="username" value="<?= $username ?>">
                                    <input type="hidden" name="nama" value="<?= $nama ?>">
                                    <input type="hidden" name="npk" value="<?= $npk ?>">
                                    <input type="hidden" name="id_divisi" value="<?= $id_divisi ?>">
                                    <input type="hidden" name="divisi" value="<?= $divisi ?>">
                                    <input type="hidden" name="id_departement" value="<?= $id_departement ?>">
                                    <input type="hidden" name="departement" value="<?= $departement ?>">
                                    <input type="hidden" name="id_section" value="<?= $id_section ?>">
                                    <input type="hidden" name="section" value="<?= $section ?>">
                                    <input type="hidden" name="id_sub_section" value="<?= $id_sub_section ?>">
                                    <input type="hidden" name="sub_section" value="<?= $sub_section ?>">
                                    <input type="hidden" name="kode_jabatan" value="<?= $kode_jabatan ?>">

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="adminRole" value="admin" required>
                                            <label class="form-check-label" for="adminRole">
                                                Admin
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="uploaderRole" value="uploader" required>
                                            <label class="form-check-label" for="uploaderRole">
                                                Uploader
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary mt-10">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="<?= base_url() ?>assets/template/main/js/vendors.min.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/pages/chat-popup.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/icons/feather-icons/feather.min.js"></script>

</body>

</html>