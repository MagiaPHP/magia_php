<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
        <?php include view("subdomains_plan_features", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("subdomains_plan_features"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include views("subdomains_plan_features", "form_search"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>
