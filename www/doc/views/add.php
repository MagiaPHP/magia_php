<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("doc", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'doc'); ?>
            <?php _t("Add doc"); ?>
        </h1>

        <?php include view("doc", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include view("doc", "der_add"); ?>

    </div>
</div>



<?php include view("home", "footer"); ?>

