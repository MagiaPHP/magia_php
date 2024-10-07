<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-md-3">
        <?php //include "izq_address.php"; ?>
        <?php include "izq_myInfo.php"; ?>
    </div>


    <div class="col-xs-12 col-md-9 col-lg-9">        
        <?php include "nav_adresses.php"; ?>

        <ul class="nav nav-tabs">
            <li role="presentation"><a href="#"><?php _t("Details"); ?></a></li>
            <li role="presentation" class="active"><a href="#"><?php _t("Addresses"); ?></a></li>
            <li role="presentation"><a href="#"><?php _t("Directory"); ?></a></li>
            <li role="presentation"><a href="#"><?php _t("Users"); ?></a></li>
            <li role="presentation"><a href="#"><?php _t("Orders"); ?></a></li>
        </ul>

        <?php include "table_adresses.php"; ?>

    </div>
</div>

<?php include view("home", "footer"); ?>