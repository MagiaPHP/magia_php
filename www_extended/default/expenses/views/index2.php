<?php include view("home", "header"); ?>  

<div class="row">

    <?php if (!$preview) { ?>
        <div class = "col-sm-12 col-md-2 col-lg-2">
            <?php include view("expenses", "izq");
            ?>
        </div>
    <?php } ?>

    <?php if ($preview) { ?>
        <div class="col-sm-12 col-md-8 col-lg-8">
        <?php } else { ?>
            <div class="col-sm-12 col-md-10 col-lg-10">
            <?php } ?>


            <?php include view("expenses", "nav"); ?>


            <?php
            if ($_REQUEST) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>
            <?php
            if ($expenses) {
                include "table_index.php";
            } else {
                message("info", "No items");
            }
            ?>
        </div>


        <?php if ($preview) { ?>
            <div class = "col-sm-12 col-md-4 col-lg-4">
                <?php include view("expenses", "preview");
                ?>
            </div>
        <?php } ?>






    </div>

    <?php include view("home", "footer"); ?> 
