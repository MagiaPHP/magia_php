<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
        <?php include view("_content", "izq"); ?>
    </div>


    <div class="col-lg-10">
        <?php include view("_content", "nav"); ?>

        <h1><?php _t("_content"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        include "table_index.php";
        ?>




    </div>
</div>


<?php include view("home", "footer"); ?>


