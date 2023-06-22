<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ani Jaya Stationery</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets_front') ?>/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets_front') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets_front') ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets_front') ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Kelly - v4.7.0
  * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Kelly</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="" class="logo"><img src="<?= base_url('assets') ?>/dist/img/logo.jpg" alt="" class=" img-fluid">
                ANI JAYA STATIONERY
            </a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="<?= site_url('C_front') ?>">Home</a></li>
                    <li><a href="<?= site_url('C_front/tentang') ?>">Tentang Kami</a></li>
                    <li><a href="<?= site_url('C_front/layanan') ?>">Layanan</a></li>
                    <li><a href="<?= site_url('C_front/kontak') ?>">Contact</a></li>
                    <li><a href="<?= site_url('C_front/registrasi') ?>">Registrasi</a></li>
                    <li><a href="<?= site_url('C_login_pelanggan') ?>">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="header-social-links">
                <a href="https://www.facebook.com/pages/Toko-Buku-Ani-Jaya/350376739156020" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/ani.jaya_stationery/" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>

        </div>

    </header><!-- End Header -->
    <main id="main">
        <!-- ======= Hero Section ======= -->
        <?= $this->renderSection('content') ?>
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Ani Jaya Stationery</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets_front') ?>/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/aos/aos.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets_front') ?>/js/main.js"></script>

</body>

</html>