<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 
# Documento accesible via la siguiente url:  
# http://localhost/index.php?c=inv_periods&a=delete 
?>
<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <?php include view("inv_periods", "izq_delete"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , 'inv_periods'); ?> 
           <?php _t("Delete inv_periods"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
 <?php include view("inv_periods", "form_delete" , $arg = ["redi" => 1] ); ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
 <?php include view("inv_periods", "der_delete"); ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
