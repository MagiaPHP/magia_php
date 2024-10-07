<?php
$html = new Contacts();
$html->setContact(1022);
//vardump($html);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Factuz.com</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="www/public_html/UpConstruction/assets/img/favicon.png" rel="icon">
        <link href="www/public_html/UpConstruction/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="www/public_html/UpConstruction/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="www/public_html/UpConstruction/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="www/public_html/UpConstruction/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="www/public_html/UpConstruction/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="www/public_html/UpConstruction/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="www/public_html/UpConstruction/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="www/public_html/UpConstruction/assets/css/main.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: UpConstruction - v1.1.0
        * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->




    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header d-flex align-items-center">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    <h1><?php echo $config_company_name; ?><span>.</span></h1>
                </a>

                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>


                <?php include "nav.php"; ?>

            </div>
        </header><!-- End Header -->

        <?php include "hero.php"; ?>

        <main id="main">


            <?php
//            
            include "getstart.php";
            include "constructions.php";
            include "services.php";
//            include "alt-services.php"; 
            include "features.php";
            include "projects.php";
            include "testimonials.php";
//            include "recent-blog-posts.php"; 
            ?>

        </main><!-- End #main -->

        <?php include "footer.php"; ?>

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="www/public_html/UpConstruction/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="www/public_html/UpConstruction/assets/vendor/aos/aos.js"></script>
        <script src="www/public_html/UpConstruction/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="www/public_html/UpConstruction/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="www/public_html/UpConstruction/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="www/public_html/UpConstruction/assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="www/public_html/UpConstruction/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="www/public_html/UpConstruction/assets/js/main.js"></script>

    </body>

</html>