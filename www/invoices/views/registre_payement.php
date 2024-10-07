<?php include view("home", "header"); ?> 

<?php
//include view("invoices", "nav_details");
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <?php
        include "part_registre_payement.php";
        ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        include "page_registre_payement.php";
        ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <hr>


        <?php include "der_registre_payement.php"; ?> 
    </div>
</div>

<?php include view("home", "footer"); ?>