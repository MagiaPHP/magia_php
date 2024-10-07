<?php
# MagiaPHP 
# file date creation: 2024-06-13 
?>
<?php include view("home", "header"); ?> 

<?php include "nav.php"; ?>
<div class="row">
    <div class="col-sm-12 col-md-7 col-lg-7">
        <h1>
            <?php _menu_icon("top", 'hr_employee_money_advance'); ?>
            <?php _t("Hr_employee_money_advance details"); ?>
        </h1>

        <hr>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        //include view("hr_employee_money_advance", "form_details", $arg = ["redi" => 1]);
        ?>
    </div>


    <div class="col-sm-12 col-md-5 col-lg-5">
        <?php include view("hr_employee_money_advance", "der_details_payment"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
