<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("subdomains_features", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("subdomains_features", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php
        if ($subdomains_features) {
            include view("subdomains_features", "table_index");
        } else {
            message("info", "No items");
        }
        ?>
    </div>
</div>

<?php include view("home", "footer"); ?> 
