<?php
# MagiaPHP 
# file date creation: 2023-02-06 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("transport", "izq_details"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <h1>
            <?php _menu_icon("top", 'transport'); ?>
            <?php _t("transport details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("transport", "form_details"); ?>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("transport", "der_details"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
