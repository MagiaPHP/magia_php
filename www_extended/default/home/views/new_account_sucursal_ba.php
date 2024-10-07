<?php include "header.php"; ?>
<p class="text-center">
    <?php logo(200, "img-responsive"); ?>
</p>
<hr>

<div class="container-fluid">
    <div class="col-lg-4">
        <?php include "izq_new.php"; ?>
    </div>
    <div class="col-lg-8">

        <h1>
            <?php _t("Billing Address"); ?>
        </h1>

        <p>
            <?php _t("You are registering a branch, you cannot change your billing address"); ?>            
        </p>

        <hr>
        <a href="index.php?c=home&a=new_account_sucursal_name" class="btn btn-primary"><?php _t("Next"); ?></a>





    </div>
    <div class="col-lg-4"></div>
</div>




<?php include "footer.php"; ?>
