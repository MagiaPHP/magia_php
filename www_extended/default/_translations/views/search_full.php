<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
        <?php //include view("_translations", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h3><?php _t("Search"); ?>: <?php echo "$txt"; ?></h3>

        <?php
        include "table_index_full.php";
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

