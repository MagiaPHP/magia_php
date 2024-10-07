<?php include view("home", "header"); ?>

<div class="row">




    <div class="col-md-2">
        <?php include "izq_users.php"; ?>
    </div>

    <div class="col-xs-12 col-md-8 col-lg-8"> 
        <?php include "nav_users.php"; ?>   


        <h2><?php _t("Users"); ?></h2>


        <?php include "nav_orders.php"; ?>


        <p><?php // _t("Show "); echo _options_option("shop_limit_orders"); _t(" orders");    ?></p>


        <?php
        include "table_users.php";
        ?>


    </div>
    <div class="col-md-3">
        <?php include "der_index.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>