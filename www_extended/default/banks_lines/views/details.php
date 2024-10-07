<?php
# MagiaPHP 
# file date creation: 2024-05-01 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <?php include "izq_details.php"; ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <h1>
            <?php _menu_icon("top", 'banks_lines'); ?>
            <?php _t("Banks_lines details"); ?>
        </h1>

        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php // include "table_details.php"; ?>
        <?php include "form_details.php"; ?>

    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <?php include "der_details.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
