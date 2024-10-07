<?php
# MagiaPHP 
# file date creation: 2024-01-29 
?>
<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("investment_lines", "izq_delete"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'investment_lines'); ?>
            <?php _t("investment_lines details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("investment_lines", "form_delete"); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("investment_lines", "der_delete"); ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
