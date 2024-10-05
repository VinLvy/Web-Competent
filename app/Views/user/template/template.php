<?php
$lang = session()->get('lang') ?? 'en';
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">

<head>
    <meta charset="utf-8">
    <?php foreach ($profil as $perusahaan) : ?>
        <link rel="shortcut icon" href="<?= base_url('asset-user/images/') ?><?= $perusahaan->favicon_website ?>">
    <?php endforeach; ?>
    <title>
        <?= 
            session()->get('lang') == 'id' 
            ? ($tbproduk->meta_title_id ?? $tbaktivitas->meta_title_id ?? $artikel->meta_title_id ?? $meta['meta_title_id'] ?? 'Judul Standar Bahasa Indonesia') 
            : ($tbproduk->meta_title_en ?? $tbaktivitas->meta_title_en ?? $artikel->meta_title_en ?? $meta['meta_title_en'] ?? 'Default English Title'); 
        ?>
    </title>

    <!-- Meta Tags -->
    <meta name="title" content="<?= 
        session()->get('lang') == 'id' 
        ? ($tbproduk->meta_title_id ?? $tbaktivitas->meta_title_id ?? $artikel->meta_title_id ?? $meta['meta_title_id'] ?? 'Judul Standar Bahasa Indonesia') 
        : ($tbproduk->meta_title_en ?? $tbaktivitas->meta_title_en ?? $artikel->meta_title_en ?? $meta['meta_title_en'] ?? 'Default English Title'); 
    ?>">
    <meta name="description" content="<?= 
        session()->get('lang') == 'id' 
        ? ($tbproduk->meta_description_id ?? $tbaktivitas->meta_description_id ?? $artikel->meta_description_id ?? $meta['meta_description_id'] ?? 'Deskripsi Standar Bahasa Indonesia') 
        : ($tbproduk->meta_description_en ?? $tbaktivitas->meta_description_en ?? $artikel->meta_description_en ?? $meta['meta_description_en'] ?? 'Default English Description'); 
    ?>">

    <!-- Canonical Tag -->
    <link rel="canonical" href="<?= current_url() ?>">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="<?= base_url('asset-user') ?>/img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('asset-user') ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/css/style.min.css" rel="stylesheet">

    <style>
        .whatsapp-logo {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #25d366;
            /* WhatsApp green color */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: transform 0.3s;
        }

        .whatsapp-logo:hover {
            transform: scale(1.1);
        }

        .whatsapp-logo img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="whatsapp-logo">
        <a href="https://wa.me/yourwhatsappnumber" target="_blank">
            <img src="<?= base_url('asset-user/images/whatsapp.jpeg') ?>" alt="WhatsApp">
        </a>
    </div>

    <!-- Navbar Start -->
    <?= $this->include('user/layout/navbar'); ?>
    <!-- Navbar End -->

    <!-- Content Start -->
    <?= $this->renderSection('content'); ?>
    <!-- Content End -->

    <!-- Footer Start -->
    <?= $this->include('user/layout/footer');  ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="<?= base_url('assets') ?>/js/lazysizes.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?= base_url('asset-user') ?>/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('asset-user') ?>/js/main.js"></script>
</body>

</html>