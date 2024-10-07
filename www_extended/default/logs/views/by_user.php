<?php include view("home", "header"); ?>  

<?php include view("logs", "nav"); ?>


<div class="row">

    <div class="col-sm-12 col-md-8 col-lg-8">


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
        if ($logs) {
            include view("pettycash", "table_by_user");
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
                include view($c, "form_pagination_items_limit");
                ?>
            </div>
        </div>


    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <?php include "der_index.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 
