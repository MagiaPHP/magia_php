<?php
# MagiaPHP 
# file date creation: 2023-02-16 
?>
<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("_options", "izq_delete"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <h1>
            <?php _menu_icon("top", '_options'); ?>
            <?php _t("_options details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("_options", "form_delete"); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("_options", "der_delete"); ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
