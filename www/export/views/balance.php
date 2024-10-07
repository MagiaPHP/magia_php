<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-lg-2">
        <?php include view("export", "izq"); ?>
    </div>

    <div class="col-lg-2">
        <?php include view("export", "izq_balance"); ?>
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

        <h1><?php _menu_icon('top', "balance") ?> <?php _t("Balance"); ?></h1>

        <?php include "form_balance.php"; ?>




    </div>
</div>

<?php include view("home", "footer"); ?> 

