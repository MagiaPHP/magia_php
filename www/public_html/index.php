<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("rols", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("rols", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>





    </div>
</div>

<?php include view("home", "footer"); ?> 

