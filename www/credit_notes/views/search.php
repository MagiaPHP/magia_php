<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-10">
        <?php include view("credit_notes", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include "table_index.php"; ?>




        <?php //include "form_search.php"; ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 




