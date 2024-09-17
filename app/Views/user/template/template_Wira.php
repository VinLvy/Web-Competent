<!doctype html>
<html lang="en">

<head>
  <title>Compass Responsive Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="templatemo">
  <!-- 
    Compass Template
    http://www.templatemo.com/tm-454-compass
    -->
  <meta charset="UTF-8">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

  <!-- CSS Bootstrap & Custom -->
  <link href="<?= base_url('asset-user') ?>/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/templatemo-misc.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/animate.css">
  <link rel="stylesheet" href="<?= base_url('asset-user') ?>/css/templatemo-main.css">

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?= base_url('asset-user') ?>/images/ico/favicon.ico">

  <!-- JavaScripts -->
  <script src="<?= base_url('asset-user') ?>/js/jquery-1.10.2.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/modernizr.js"></script>
  <!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
        </div>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <?= $this->include('user/layout/header'); ?>

    <!-- render halaman konten -->
    <?= $this->renderSection('content'); ?>

    <!-- footer -->
    <?= $this->include('user/layout/footer');  ?>

    <!-- lang -->
    <div class="floating-container">
      <div class="floating-button">
        <img src="<?= base_url('asset-user') ?>/images/lang2.png" style="height: 40px;" alt="languange">
      </div>
      <div class="element-container">

        <!-- indonesia -->
        <a class="leng" href="<?= site_url('lang/in') ?>">
          <span class="float-element tooltip-left">
            <i class="material-icons">
              <img src="<?= base_url('asset-user') ?>/images/ind.png" style="height: 35px;" alt="">
            </i></a>
        </span>
        <!-- english -->
        <a class="leng" href="<?= site_url('lang/en') ?>">
          <span class="float-element">
            <i class="material-icons">
              <img src="<?= base_url('asset-user') ?>/images/en.png" style="height: 35px;" alt="">
            </i></a>
        </span>

      </div>
    </div>

    <!-- lang 2 -->
    <!-- .site-wrap -->

    <!-- icon wa -->
    <!-- <?php foreach ($profil as $iconwa) : ?>
      <a class="whats-app" href="<?= $iconwa->link_whatsapp ?>" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
      </a>
    <?php endforeach; ?> -->

    <!-- loader -->
    <!-- <div id="loader" class="show fullscreen">
      <img src="/asset-user/images/loading.gif" alt="Loading" class="gif-loader">
    </div> -->

    <script src="<?= base_url('asset-user') ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/plugins.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.lightbox.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/custom.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/lazysizes.min.js"></script>

    <!-- <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          scrollwheel: false,
          zoom: 15,
          center: new google.maps.LatLng(13.758468, 100.567481)
        };

        var map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);
      }

      function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
          'callback=initialize';
        document.body.appendChild(script);
      }

      window.onload = loadScript;
    </script> -->

    <!-- <script src="js/test.js"></script> -->

    <script src="<?= base_url('asset-user') ?>/js/main.js"></script>
</body>

</html>