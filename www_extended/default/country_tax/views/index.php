<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view('config', 'izq'); ?>
        <?php // include "izq.php"; ?>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        if ($country_tax) {
            include "table_index.php";
        } else {
            message("info", "No items");
        }
        ?>

        <div class="container-fluid">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php
                $pagination->createHtml();
                ?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                <?php
//          $redi = 1;
                include view("country_tax", "form_pagination_items_limit", $redi = 1);
                ?>
            </div>
        </div>
    </div>
</div>

<?php include view("home", "footer"); ?> 
