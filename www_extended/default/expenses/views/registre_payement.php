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

        <div class="well text-center">
            <h1>
                <?php _menu_icon("top", 'expenses'); ?>
                <?php _t("Expense Number"); ?>: <?php echo $expense->getId(); ?>
            </h1>
        </div>


        <?php //include view("expenses", "form_details"); ?>


        <?php
        include "part_details.php";
        include "part_ce.php";
        include "part_comments.php";
        ?>


    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <?php include "der_registre_payement.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
