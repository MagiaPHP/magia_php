<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("balance", "izq"); ?></div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _menu_icon("top", 'balance'); ?>
            <?php _t("Add balance"); ?>
        </h1>





        <?php include view("balance", "form_add"); ?>


    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php // include view("balance", "der"); ?>

    </div>
</div>



<?php include view("home", "footer"); ?>

