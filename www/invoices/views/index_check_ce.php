<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-md-3 col-lg-3">
        <?php include view("invoices", "izq"); ?>
    </div>

    <div class="col-md-9 col-lg-9">

        <?php include view("invoices", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php include "table_index_check_ce.php"; ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 




