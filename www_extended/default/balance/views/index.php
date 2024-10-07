<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
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
            include "table_index2.php";
        } else {
            message('info', 'No items found');
        }
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 

