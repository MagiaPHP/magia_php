<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("credit_notes", "izq"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _menu_icon("top", 'credit_notes'); ?>
            <?php _t("credit_notes details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("credit_notes", "form_delete"); ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php //include view("credit_notes", "der"); ?>
    </div>
</div>



<?php include view("home", "footer"); ?>

