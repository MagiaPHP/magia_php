<?php include view("home", "header"); ?>  
<?php include view("doc", "nav"); ?> 
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include "izq.php"; ?></div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'doc_translations'); ?>
            <?php _t("Add doc_translations"); ?>
        </h1>

        <?php include "form_add.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include "der.php"; ?>

    </div>
</div>



<?php include view("home", "footer"); ?>

