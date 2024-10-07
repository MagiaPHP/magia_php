<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php // include view("credit_notes", "izq"); ?>
    </div>

    <div class="col-lg-6">
        <?php //include view("credit_notes", "nav"); ?>
        <?php // _t("Extended"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("New credit note"); ?></h1>


        <?php include "form_add.php"; ?>


        <div class="col-lg-3">
            <?php //include view("credit_notes", "der"); ?>
        </div>






    </div>
</div>

<?php include view("home", "footer"); ?> 

