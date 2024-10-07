<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("comments_read", "izq_details"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'comments_read'); ?>
            <?php _t("comments_read details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php include view("comments_read", "form_details"); ?>



    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include view("comments_read", "der_details"); ?>
    </div>
</div>



<?php include view("home", "footer"); ?>

