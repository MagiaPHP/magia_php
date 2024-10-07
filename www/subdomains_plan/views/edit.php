<?php
# MagiaPHP 
# file date creation: 2024-01-19 
?>

<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("subdomains_plan", "izq_edit"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'subdomains_plan'); ?>
            <?php _t("Subdomains_plan edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>            
        <?php include view("subdomains_plan", "form_edit"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("subdomains_plan", "der_edit"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
