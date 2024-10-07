<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php //include view("comment_folder", "izq_delete"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <h1>
            <?php _menu_icon("top", 'comment_folder'); ?>
            <?php _t("comment_folder details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("comment_folder", "form_delete"); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php //include view("comment_folder", "der_delete"); ?>
    </div>
</div>



<?php include view("home", "footer"); ?>

