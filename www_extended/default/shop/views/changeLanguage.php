<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php include "izq_myInfo.php"; ?>
    </div>
    <div class="col-md-6">              
        <?php // include "nav_address.php"; ?>
        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>
        <h2><?php _t("Change language"); ?></h2>
        <p>
            <?php _t("The pdf files will also be translated into the selected language"); ?> 
        </p>
        <?php include "form_change_language.php"; ?>

    </div>
</div>
<?php include view("home", "footer"); ?>