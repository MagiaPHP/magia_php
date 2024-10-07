<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-0">
        <?php //include "izq.php" ; ?>
    </div>

    <div class="col-lg-12">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        print


        c=
        a=
        lang=




    </div>
</div>

<?php include view("home", "footer"); ?> 

