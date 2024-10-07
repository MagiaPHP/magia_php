<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("comments", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("comments", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("comments", "table_index"); ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

