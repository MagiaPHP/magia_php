<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'inv_periods'); ?>
            <?php echo _t("Inv_periods"); ?>
    </a>
    <a href="index.php?c=inv_periods" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "inv_periods", "create")) { ?>
        <a href="index.php?c=inv_periods&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>