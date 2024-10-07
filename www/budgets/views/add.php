<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php // include view("budgets", "izq"); ?>
    </div>

    <div class="col-lg-6">
        <?php //include view("budgets", "nav"); ?>
        <?php // _t("Extended"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("New budget"); ?></h1>

        <?php include "form_add.php"; ?>

        <div class="col-lg-3">
            <?php //include view("budgets", "der"); ?>
        </div>






    </div>
</div>

<?php include view("home", "footer"); ?> 

