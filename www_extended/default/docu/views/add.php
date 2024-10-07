<?php
# MagiaPHP 
# file date creation: 2023-09-30 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("docu", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'docu'); ?>
            <?php _t("Add docu"); ?>
        </h1>
        <?php
        $redi = 6;
        include view("docu", "form_add");
        ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("docu", "der_add");  ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

