<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:26 
# Documento accesible via la siguiente url:  
# http://localhost/index.php?c=inv_types&a=add 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("inv_types", "izq_add"); ?></div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , 'inv_types'); ?> 
            <?php _t("Add"); ?>
        </h1>
        <?php include view("inv_types", "form_add", $arg = ["redi" => 1]); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <?php  include view("inv_types", "der_add"); ?>
        
    </div>
</div>

<?php include view("home", "footer"); ?>

