<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include "body_new_mail.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "der_new_mail.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 
