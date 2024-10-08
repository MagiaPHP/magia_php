<?php
# MagiaPHP 
# file date creation: 2024-04-29 
?>

<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">      
        <?php include view("services_price", "izq_edit"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'services_price'); ?>
            <?php _t("Edit Services_price"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>            
        <?php include view("services_price", "form_edit", $arg = ["redi" => 1]); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("services_price", "der_edit"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
