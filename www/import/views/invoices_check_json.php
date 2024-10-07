<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("import", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <?php // include view("import", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _menu_icon('top', "import") ?>  <?php _t("Invoices Check Json"); ?></h1>



        <?php
        if ($_POST) {
            foreach ($icj->getImportErrors() as $key => $getImportErrors) {
                message('danger', $getImportErrors);
            }
            if (!$icj->getImportErrors()) {
                message('info', 'No hay errores en el json');
            }

            include "table_invoices_check_json_result.php";
        } else {
            include "form_invoices_check_json.php";
        }
        ?>


    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        Json file
        <?php
        if ($_POST) {
            vardump($json);
        }
        ?>
        <?php //include view("import", "der");   ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 

