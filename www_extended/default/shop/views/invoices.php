<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-md-2">
        <?php include "izq_invoices.php"; ?>
    </div>


    <div class="col-xs-12 col-md-10 col-lg-10">             
        <?php include "nav_invoices.php"; ?>   


        <?php
        if (empty($invoices)) {
            message("info", "No items");
        } else {

            include "table_invoices.php";
        }
        ?>


    </div>      
</div>
<?php include view("home", "footer"); ?>