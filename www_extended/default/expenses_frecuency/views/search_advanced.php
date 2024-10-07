
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'expenses_frecuency'); ?>
            <?php _t("Expenses_frecuency Search advanced"); ?>
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include "form_search_advanced.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include "der.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
