
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">       
        <?php include view("invoices_counter", "izq"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _menu_icon("top", 'invoices_counter'); ?>
            <?php _t("Invoices_counter edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("invoices_counter", "form_edit"); ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">


        <?php // include view("invoices_counter", "der"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

