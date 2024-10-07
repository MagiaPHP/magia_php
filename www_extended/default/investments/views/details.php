<?php
# MagiaPHP 
# file date creation: 2024-01-29 
// Solo puse en col 5 centro y derecho
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("investments", "izq_details"); ?>
    </div>

    <div class="col-sm-12 col-md-5 col-lg-5">
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
        <?php include view("investments", "form_details"); ?>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">

        <h2><?php _t("Details"); ?></h2>

        <?php // include view("investments", "der_details");  ?>
        <?php include view("investments", "table_details"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
