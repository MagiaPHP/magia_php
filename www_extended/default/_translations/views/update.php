<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <?php include "izq.php" ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-10 col-lg-10">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h3><?php _t('Update'); ?></h3>

        <?php include "table_update.php"; ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

