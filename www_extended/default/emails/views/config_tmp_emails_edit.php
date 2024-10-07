<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_config.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "izq_tmp_emails.php"; ?>
    </div>

    <div class="col-sm-12 col-md-5 col-lg-5">
        <?php include "nav.php"; ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>





        <?php
        include "form_tmp_emails_edit.php";
        ?>









    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include "der_config.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 
