<?php include view("home", "header"); ?> 

<?php
include view("invoices", "nav_details");
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
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
        
//        if ($u_rol == 'root') {
//            include "page_details_extended.php";
//        } else {
//            include "page_details.php";
//        }
        

        include "page_details.php";
        ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php include "der.php"; ?> 
    </div>
</div>

<?php include view("home", "footer"); ?>