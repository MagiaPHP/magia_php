<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("expenses_frecuency"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include views("expenses_frecuency", "form_search"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>
