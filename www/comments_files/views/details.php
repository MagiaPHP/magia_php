<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("comments_files", "izq_details"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'comments_files'); ?>
            <?php _t("comments_files details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php include view("comments_files", "form_details"); ?>



    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include view("comments_files", "der_details"); ?>
    </div>
</div>



<?php include view("home", "footer"); ?>

