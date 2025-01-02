<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Century Batteries Indonesia</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url() . 'assets/images/favicons/favicon.png' ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() . 'assets/images/favicons/favicon-192x192.png' ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() . 'assets/images/favicons/apple-touch-icon-180x180.png' ?>">
    <!-- END Icons -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/dataTables.dateTime.min.css">


    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/main/css/vendors_css.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/js/jquery.fancybox.css">

    <!-- Style-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/main/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/main/css/skin_color.css">
    <?= $this->renderSection('style') ?>
    <style>
        @keyframes blink {

            0%,
            100% {
                background-color: #ffffff;
                color: #000;
            }

            50% {
                background-color: #ff0000;
                color: #fff;
            }
        }

        .blinking-bg {
            animation: blink 0.5s infinite;
            z-index: 1;
        }

        .sidebar-closed {
            width: 0;
            transition: width 0.3s;
        }

        .col-md-1-5 {
            flex: 0 0 12.5%;
            /* 1.5 kolom dari 12 kolom */
            max-width: 12.5%;
        }

        .col-md-3-5 {
            flex: 0 0 29.17%;
            max-width: 29.08%;
        }

        .col-md-0-5 {
            flex: 0 0 4.17%;
            max-width: 4.17%;
        }
    </style>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed" style="background-image:url(<?= base_url('assets/images/digitalization.jpg') ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">

    <header class="main-header">
        <div class="d-flex align-items-center logo-box justify-content-start">
            <!-- Logo -->
            <a class="logo">
                <!-- logo-->
                <div class="logo-lg">
                    <!-- <span class="light-logo"><img src="<?= base_url() ?>eduadmin/images/logo-dark-text.png" alt="logo"></span>
          <span class="dark-logo"><img src="<?= base_url() ?>eduadmin/images/logo-light-text.png" alt="logo"></span> -->
                    <span class="light-logo"><img src="<?= base_url() ?>assets/images/logo1.png" alt="logo"></span>
                </div>
            </a>
            <div class="row" style="margin-top:10px;margin-right:10px;">
                <h4>PCE</h4>
                <p>Department</p>
            </div>
            <a href="<?= base_url('menu/utama')?>" style="display: flex; align-items: center; text-decoration: none; ">
                <span class="glyphicon glyphicon-chevron-left" style="margin-right: 10px; font-size: 24px;"></span>
                Back
            </a>

        </div>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top justify-content-center">
            <!-- Sidebar toggle button-->
            <div class="app-menu  d-none d-md-block">
                <h2>Digitalisasi - PT.Century Batteries Indonesia</h2>


            </div>
            <div class="navbar-custom-menu r-side" style="visibility:hidden;">
                <ul class="nav navbar-nav">

                </ul>
            </div>
            <!-- <div class="navbar-custom-menu r-side justify-content-end d-none d-md-block" style="padding-left:300px;">
        <h4>31/10/2024</h4>
        <p>14:08:09</p>
    </div> -->

        </nav>


    </header>
    <div class="wrapper">
        <?= $this->renderSection('content') ?>

    </div>




    <!-- Vendor JS -->
    <script src="<?= base_url() ?>assets/template/main/js/vendors.min.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/scan-qr.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.fancybox.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/pages/chat-popup.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/icons/feather-icons/feather.min.js"></script>

    <script src="<?= base_url() ?>assets/template/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor_components/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor_components/fullcalendar/fullcalendar.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="<?= base_url() ?>assets/template/assets/vendor_components/select2/dist/js/select2.full.js"></script>

    <!-- EduAdmin App -->
    <script src="<?= base_url() ?>assets/template/main/js/template.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/pages/dashboard.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/pages/calendar.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/pages/data-table.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/pages/advanced-form-element.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/pages/advanced-form-element.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/jquery-3.7.1.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/template/main/js/dataTables.editor.min.js"></script>
    <script src="<?= base_url() ?>assets/js/highcharts/highcharts.js"></script>



    <?= $this->renderSection('script') ?>


</body>

</html>