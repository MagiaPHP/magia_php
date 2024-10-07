<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:26 
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'inv_types'); ?>
            <?php echo _t("Inv_types"); ?>
    </a>
    <a href="index.php?c=inv_types" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "inv_types", "create")) { ?>
        <a href="index.php?c=inv_types&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>