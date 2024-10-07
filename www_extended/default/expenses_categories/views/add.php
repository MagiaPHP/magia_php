<?php
# MagiaPHP 
# file date creation: 2024-01-02 
?>
<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("expenses_categories", "izq_add"); ?>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'expenses_categories'); ?>
            <?php _t("Add"); ?>
        </h1>
        <?php
        include "ul_index.php";
        ?>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("expenses_categories", "der_add"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

