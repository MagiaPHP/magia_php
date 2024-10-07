<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:26 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
 <?php include view("inv_types", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <h1><?php _t("inv_types"); ?></h1>
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("inv_types","form_search"   , $arg = ["redi" => 1]);?>
        
    </div>
</div>

<?php include view("home", "footer"); ?>
