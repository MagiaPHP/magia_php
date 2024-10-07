<?php
# MagiaPHP 
# file date creation: 2024-01-19 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("subdomains_plan", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'subdomains_plan'); ?>
            <?php _t("Add subdomains_plan"); ?>
        </h1>
        <?php include view("subdomains_plan", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("subdomains_plan", "der_add"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

