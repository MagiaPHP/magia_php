<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php //include "izq_address.php"; ?>
    </div>
    <div class="col-md-6">              
        <?php //include "nav_address.php"; ?>
        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>
        <h1>
            <i class="fas fa-map-marker"></i>
            <?php _t("New Address"); ?>
        </h1>  

        <?php include "formAddressNew.php"; ?>
    </div>
</div>
<?php include view("home", "footer"); ?>