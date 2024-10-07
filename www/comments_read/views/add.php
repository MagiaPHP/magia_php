<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("comments_read", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'comments_read'); ?>
            <?php _t("Add comments_read"); ?>
        </h1>

        <?php include view("comments_read", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include view("comments_read", "der_add"); ?>

    </div>
</div>



<?php include view("home", "footer"); ?>

