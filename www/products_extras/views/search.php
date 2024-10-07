<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
 <?php include view("products_extras", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("products_extras"); ?></h1>
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("products_extras","form_search"   , $arg = ["redi" => 1]);?>
        
    </div>
</div>

<?php include view("home", "footer"); ?>
