<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title><?= $this->getTitle(); ?></title>
    <meta name="keywords" content="<?= $this->getKeywords(); ?>">
    <meta name="description" content="<?= $this->getDescription(); ?>">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    
    <link href="<?= DIRIMG; ?>/favicon.png" rel="icon">
    <link href="<?= DIRIMG; ?>/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
  <link href="<?= DIRVEN; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= DIRVEN; ?>/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= DIRVEN; ?>/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= DIRVEN; ?>/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= DIRVEN; ?>/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= DIRVEN; ?>/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= DIRCSS; ?>/style2.css" rel="stylesheet">

    <style>
      #hero {
        width: 100%;
        height: 100vh;
        background: url("<?= DIRIMG; ?>hero-carousel/hero-carousel-7.JPG") top center;
        background-size: cover;
        position: relative;
      }
      #hero2 {
        width: 100%;
        height: 54vh;
        background: url("<?= DIRIMG; ?>hero-carousel/hero-carousel-5.JPG") top center;
        background-position: 0%;
        background-size: cover;
        position: relative;
      }
      .cta {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("<?= DIRIMG; ?>projetos/17.jpg") fixed center center;
        background-size: cover;
        padding: 120px 0;
      }
    </style>
    <?= $this->addHead(); ?>
  
  </head>
  <body class="g-sidenav-show bg-gray-200">
    <?php 
      include_once(DIRREQ.'/app/view/include/header.php');
      if($params != null) {
        echo $this->addHeader($params);
      }
      else {echo $this->addHeader();}

      if($params != null) {echo $this->addMain($params);}
      else {echo $this->addMain();}
    ?>
    <?php
      if($params != null) {echo $this->addFooter($params);}
      else {echo $this->addFooter();}
      include_once(DIRREQ.'/app/view/include/footer.php');
    ?>

  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

    <!--   Core JS Files   -->
    <script src="<?= DIRVEN; ?>/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= DIRVEN; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= DIRVEN; ?>/glightbox/js/glightbox.min.js"></script>
    <script src="<?= DIRVEN; ?>/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= DIRVEN; ?>/swiper/swiper-bundle.min.js"></script>
    <script src="<?= DIRVEN; ?>/php-email-form/validate.js"></script>

    <?php
      if($params != null) {echo $this->addFoot($params);}
      else {echo $this->addFoot();}
    ?>

    <!-- Template Main JS File -->
  <script src="<?= DIRJS; ?>/main.js"></script>
  <!-- <script>
    var hero = document.querySelector(".bg-slide");
    var cta  = document.querySelector(".cta");

    hero.style.backgroundImage = `url(<?= DIRIMG; ?>hero-carousel/hero-carousel-7.JPG)`;
    var i = 1;
    const bgSlide = () => {
        i = ( i > 8) ? 1: i;
        hero.style.backgroundImage = `url(<?= DIRIMG; ?>hero-carousel/hero-carousel-${i}.JPG)`;
        i++;
    }

    // setInterval(function(){bgSlide()}, 5000);

  </script> -->

  </body>  
</html>
