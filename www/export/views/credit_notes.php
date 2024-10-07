<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-lg-2">
        <?php include view("export", "izq"); ?>
    </div>

    <div class="col-lg-2">
        <?php include view("export", "izq_cedit_notes"); ?>
    </div>

    <div class="col-lg-8">
        <?php //include view("export", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _menu_icon('top', "credit_notes") ?>  <?php _t("Credit notes"); ?></h1>

        <?php include "form_credit_notes.php"; ?>





    </div>
</div>

<?php include view("home", "footer"); ?> 

