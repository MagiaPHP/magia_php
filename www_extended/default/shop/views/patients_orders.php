<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-2">
        <?php include "izq_patients.php"; ?>
    </div>
    <div class="col-md-10">    
        <h1><?php _t("Patients orders"); ?></h1>        
        <?php
        // include "table_orders_by_patients.php";

        if ($orders) {
            include "table_orders.php";
        } else {
            message('info', 'No items');
        }
        ?>
    </div>
    <div class="col-md-0">
        <?php //include "der_contacts.php";  ?>
    </div>
</div>
<?php include view("home", "footer"); ?>