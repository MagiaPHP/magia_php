<?php
# MagiaPHP 
# file date creation: 2024-01-29 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("investment_lines", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'investment_lines'); ?>
            <?php _t("Add investment_lines"); ?>
        </h1>
        <?php include view("investment_lines", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("investment_lines", "der_add"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

