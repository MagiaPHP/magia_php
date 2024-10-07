<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_index.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <?php // include view("doc_sections", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php
//        if ($doc_sections) {
//            include view("doc_sections", "table_index");
//        } else {
//            message("info", "No items");
//        }
        ?>
    </div>
</div>

<?php include view("home", "footer"); ?> 
