<?php
# MagiaPHP 
# file date creation: 2024-01-11 
?>
<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">       
        <?php include "nav_details.php"; ?>    
    </div>   

    <div class="col-sm-12 col-md-7 col-lg-7">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php //include view("expenses", "form_details"); ?>

        <?php
        include "page_registre_payement.php";
        ?>

        <h3>
            <?php _t("Payments list"); ?>
        </h3>

        <p>
            <?php _t("List of payments made for this invoice"); ?>
        </p>

        <?php
        include "payments_list.php";
        ?>
    </div>

    <div class="col-sm-12 col-md-5 col-lg-5">
        <?php include "der_details_payement.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
