<?php include view("home", "header"); ?>  
<div class="row">

    <div class="col-lg-2">
        <?php include view("export", "izq"); ?>
    </div>

    <div class="col-lg-2">
        <?php include view("export", "izq_contacts"); ?>
        <?php include view("export", "izq_providers"); ?>
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

        <h1><?php _menu_icon('top', "contacts") ?> <?php _t("Providers"); ?></h1>


        <?php include "form_providers.php"; ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

