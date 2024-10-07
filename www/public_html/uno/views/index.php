<?php
$mc = new Contacts();
$mc->setContact(1022);

//vardump($mc);
?>
<!doctype html>

<html lang="en">
    <head>
        <?php include "head.php"; ?>
    </head>

    <body>
        <div class="navbar-wrapper">
            <div class="container">

                <?php include "nav.php"; ?>

            </div>
        </div>

        <?php include "carrusel.php"; ?>
        <?php include "marketing.php"; ?>
        <?php include "footer.php"; ?>
        <?php include "foot.php"; ?>

    </body>
</html>
