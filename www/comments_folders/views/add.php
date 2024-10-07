<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("comments_folders", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'comments_folders'); ?>
            <?php _t("Add comments_folders"); ?>
        </h1>

        <?php include view("comments_folders", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include view("comments_folders", "der_add"); ?>

    </div>
</div>



<?php include view("home", "footer"); ?>

