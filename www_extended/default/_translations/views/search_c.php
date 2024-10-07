<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <?php include view("_translations", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-10 col-lg-10">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h3><?php _t("Search in content"); ?>: <?php echo "$txt"; ?></h3>

        <?php
        include "table_index_c.php";
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

