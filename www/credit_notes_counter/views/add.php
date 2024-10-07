<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("credit_notes_counter", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'credit_notes_counter'); ?>
            <?php _t("Add credit_notes_counter"); ?>
        </h1>

        <?php include view("credit_notes_counter", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include view("credit_notes_counter", "der_add"); ?>

    </div>
</div>



<?php include view("home", "footer"); ?>

