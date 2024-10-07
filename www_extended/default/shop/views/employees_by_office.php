<?php include view("home", "header"); ?>

<div class="row">

    <div class="col-md-3">
        <?php include "izq_offices.php"; ?>
    </div>

    <div class="col-xs-9 col-md-9 col-lg-9"> 
        <?php include "nav_employees.php"; ?>


        <h2><?php _t("Employees by office"); ?></h2>


        <?php // include "nav_orders.php"; ?>


        <p><?php // _t("Show "); echo _options_option("shop_limit_orders"); _t(" orders");     ?></p>


        <?php
        include "table_employees_by_office.php";
        ?>


    </div>
    <div class="col-md-3">
        <?php include "der_index.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>