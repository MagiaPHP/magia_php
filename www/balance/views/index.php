<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0 col-xl-0">
        <?php // include view("balance", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <?php include view("balance", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        if ($balance) {
//            include "table_index2.php";
            include view("balance", "table_index2");
        } else {
            message('info', 'No items found');
        }
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 

