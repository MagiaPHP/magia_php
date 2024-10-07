<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include "head.php"; ?>
    </head>
    <body>

        <?php include "header.php"; ?>
        <?php include "hero.php"; ?>

        <main id="main">
            <?php include "about.php"; ?>
            <?php include "services.php"; ?>
            <?php include "why-us.php"; ?>
            <?php include "call-to-action.php"; ?>
            <?php include "features.php"; ?>
            <?php // include "portfolio.php"; ?>
            <?php // include "testimonials_logos.php"; ?>

            <?php include "call-to-action.php"; ?>
            <?php // include "team.php"; ?>
            <?php include "clients.php"; ?>
            <?php include "pricing.php"; ?>
            <?php include "faq.php"; ?>  
            <?php if (modules_field_module('status', 'shop')) { ?>                    
                <?php include "registrarse.php"; ?>    
            <?php } ?>
            <?php include "login.php"; ?>    
        </main>


        <?php include "footer.php"; ?>


        <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i>
        </a>

        <!-- Vendor JS Files -->
        <script src="www/public_html/Rapid/views/assets/vendor/purecounter/purecounter.js"></script>
        <script src="www/public_html/Rapid/views/assets/vendor/aos/aos.js"></script>
        <script src="www/public_html/Rapid/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="www/public_html/Rapid/views/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="www/public_html/Rapid/views/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="www/public_html/Rapid/views/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="www/public_html/Rapid/views/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="www/public_html/Rapid/views/assets/js/main.js"></script>

    </body>

</html>