<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("doc_models", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("doc_models", "izq_items_title"); ?>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <?php // include view("doc_models", "nav"); ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include "part_iframe_pdf_example.php"; ?>





    </div>
</div>

<?php include view("home", "footer"); ?> 

