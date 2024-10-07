<?php
# MagiaPHP 
# file date creation: 2024-01-29 
?>
<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("investments", "izq_delete"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'investments'); ?>
            <?php _t("investments details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("investments", "form_delete"); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("investments", "der_delete"); ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
