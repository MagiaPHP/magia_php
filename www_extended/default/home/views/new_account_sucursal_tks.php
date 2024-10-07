<?php include view("home", "header"); ?>

<p class="text-center">
    <?php logo(200, "img-responsive"); ?>
</p>
<hr>

<div class="container-fluid">
    <div class="col-lg-4">
        <?php include "izq_new.php"; ?>
    </div>
    <div class="col-lg-4">

        <h1><?php _t("Thank you for your registration"); ?></h1>

        <p>            
            <?php _t("The registration request has been submitted, it must be approved by us before you can start using it."); ?>
        </p>

        <p>
            <?php _t("An email will be sent to prevent you from activating your account"); ?>
        </p>







    </div>
    <div class="col-lg-4"></div>
</div>




<?php include "footer.php"; ?>
