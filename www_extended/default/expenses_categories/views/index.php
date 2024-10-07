<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("expenses_categories", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-5 col-lg-5">
        <?php // include view("expenses_categories", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <h1>
            <?php _menu_icon("top", 'expenses_categories'); ?>
            <?php _t("Categories"); ?>
        </h1>


        <?php
        include "ul_index.php";
        ?>

    </div>


    <div class="col-sm-12 col-md-5 col-lg-5">
        <?php
//                vardump($id); 

        if (isset($id) && $id) {
            include "der_index.php";
        }
        ?>
    </div>



</div>

<?php include view("home", "footer"); ?> 
