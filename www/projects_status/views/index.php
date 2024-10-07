<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("projects_status", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("projects_status", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php
        if ($projects_status) {
            include view("projects_status", "table_index");
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
//                    $redi = 1;
                include view("projects_status", "form_pagination_items_limit", $redi = 1);
                ?>
            </div>
        </div>










    </div>
</div>

<?php include view("home", "footer"); ?> 
