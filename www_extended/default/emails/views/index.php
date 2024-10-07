<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php include "izq_index.php"; ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php //include "nav_details.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
        if ($email !== null) {
            include "body_index.php";
        }
        ?>


    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "der_index.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 
