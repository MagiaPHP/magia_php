
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php include view("invoices_separators", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'invoices_separators'); ?>
            <?php _t("Search advanced"); ?>
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("invoices_separators", "form_search_advanced", $arg = ["redi" => 1]); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("invoices_separators", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
