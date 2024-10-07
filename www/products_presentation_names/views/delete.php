<?php 
# MagiaPHP 
# file date creation: 2024-07-31 
?>
<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <?php include view("products_presentation_names", "izq_delete"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , 'products_presentation_names'); ?> 
           <?php _t("Delete products_presentation_names"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
 <?php include view("products_presentation_names", "form_delete" , $arg = ["redi" => 1] ); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
 <?php include view("products_presentation_names", "der_delete"); ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
