<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("hr", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("hr", "nav_drivers"); ?>

        <?php include view("hr_payroll_by_month", "tabs"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h3>
            <?php _t("List of drivers who have assigned cars"); ?>
        </h3>

        <?php include "table_drivers.php"; ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 
