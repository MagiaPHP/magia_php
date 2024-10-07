<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("comment_folder", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'comment_folder'); ?>
            <?php _t("Add comment_folder"); ?>
        </h1>

        <?php include view("comment_folder", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include view("comment_folder", "der_add"); ?>

    </div>
</div>



<?php include view("home", "footer"); ?>

