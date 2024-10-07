<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("docs_comments", "izq_delete"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _menu_icon("top", 'docs_comments'); ?>
            <?php _t("docs_comments details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("docs_comments", "form_delete"); ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php //include view("docs_comments", "der_delete"); ?>
    </div>
</div>



<?php include view("home", "footer"); ?>

