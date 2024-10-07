<?php include view("home", "header"); ?> 
<?php
//include view("invoices", "nav_details");
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        if ($invoices['date'] == null) {
            echo message('info', 'This invoice has no date');
        }
        ?>
        <?php
        include "page_registre_payement.php";
        //
//        include "der_part_payement_list.php";
        ?>
        <h3>
            <?php _t("Collection list"); ?>
        </h3>
        <?php
        include "payments_list.php";
        ?>


    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">        
        <?php include "der_registre_payement.php"; ?> 
    </div>
</div>

<?php include view("home", "footer"); ?>