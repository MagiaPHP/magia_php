<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("expenses", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("expenses", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php // include view("expenses", "top"); ?>


        

            <?php
            if ($expenses) {
                include view("expenses", "table_index");
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
</div>

<?php include view("home", "footer"); ?> 
