<?php
# MagiaPHP 
# file date creation: 2024-05-30 
?>
<?php include view("home", "header"); ?> 

<?php include "nav_payment.php"; ?>

<div class="row"> 


    <div class="col-sm-12 col-md-8 col-lg-8">


        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="text-center">
                    <?php _menu_icon("top", 'hr_payroll'); ?>
                    <?php _t("Payroll details"); ?> : <?php echo $hr_payroll->getId(); ?>
                </h3>
            </div>
        </div>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php include "details_header.php"; ?>
        <?php include "details_items_details.php"; ?>





    </div>


    <div class="col-sm-12 col-md-4 col-lg-4">
        <?php include "der_payment.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?>
