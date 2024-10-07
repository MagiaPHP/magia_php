<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:09 
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'inv_companies'); ?>
            <?php echo _t("Inv_companies"); ?>
    </a>
    <a href="index.php?c=inv_companies" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "inv_companies", "create")) { ?>
        <a href="index.php?c=inv_companies&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>