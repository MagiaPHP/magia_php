<?php 
# MagiaPHP 
# file date creation: 2024-07-31 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("schedule", "izq_add"); ?></div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , 'schedule'); ?> 
            <?php _t("Add"); ?>
        </h1>
        <?php include view("schedule", "form_add", $arg = ["redi" => 1]); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <?php  include view("schedule", "der_add"); ?>
        
    </div>
</div>

<?php include view("home", "footer"); ?>

