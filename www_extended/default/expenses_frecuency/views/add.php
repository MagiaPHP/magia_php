<?php
# MagiaPHP 
# file date creation: 2024-01-11 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include "izq.php"; ?></div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'expenses_frecuency'); ?>
            <?php _t("Add expenses_frecuency"); ?>
        </h1>
        <?php include "form_add.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include "der.php"; ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

