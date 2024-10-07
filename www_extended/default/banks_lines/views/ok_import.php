<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-0 col-lg-0">
        <?php // include view("banks_lines", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php include view("banks_lines", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        add_db(); 









    </div>
</div>

<?php include view("home", "footer"); ?> 
