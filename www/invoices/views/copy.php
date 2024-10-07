<?php include view("home", "header"); ?> 

<?php // include "nav_details.php"; ?>

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include "der.php"; ?> 
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">

        <div class="well text-center">
            <h1>
                <?php _t("Invoice"); ?> : <?php //echo invoices_numberf($id); ?> <?php echo invoices_numberf_to_print($id, 1); ?>    
            </h1>
        </div>

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


        <h3>
            <?php _t("Copy invoice"); ?>
        </h3>

        <p>
            <?php _t("You will make a copy of this invoice"); ?>
        </p>

        <?php include "page_details_copy.php"; ?>

    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php //include "der.php";  ?> 
    </div>

</div>


<?php include view("home", "footer"); ?>