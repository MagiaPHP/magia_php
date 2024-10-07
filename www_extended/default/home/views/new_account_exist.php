<?php include "header.php"; ?>


<div class="container-fluid">
    <div class="col-lg-3">
        <?php //include "izq_new.php";?>
    </div>
    <div class="col-lg-6">
        <?php // include "form_login.php";?>


        <p class="text-center">
            <?php logo(200, "img-responsive"); ?>
        </p>

        <h2 class="form-signin-heading text-center"><?php _t("TVA exists in our system"); ?></h2>


        <h3><?php echo $company['name']; ?></h3>

        <p>
            <?php
            if (isset($ba)) {
                echo " $ba[number], $ba[address] <br> ";
                echo " $ba[postcode] $ba[barrio] <br> ";
                echo " $ba[city] $ba[country] <br> ";
            }
            ?>                   
        </p>

        <p><?php _t("TVA"); ?>: <?php echo $tva; ?></p>




        <?php
        message('info', 'Do you want to register as a branch of this company?');
        ?>



        <?php include view("home", "form_new_account_exist"); ?>

    </div>
    <div class="col-lg-4"></div>
</div>



<?php include "footer.php"; ?>
