<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'inv_transsactions'); ?>
            <?php echo _t("Inv_transsactions"); ?>
    </a>
    <a href="index.php?c=inv_transsactions" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "inv_transsactions", "create")) { ?>
        <a href="index.php?c=inv_transsactions&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>