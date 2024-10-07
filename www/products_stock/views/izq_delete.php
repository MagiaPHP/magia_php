
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_stock'); ?>
            <?php echo _t("Products_stock"); ?>
    </a>
    <a href="index.php?c=products_stock" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_stock", "create")) { ?>
        <a href="index.php?c=products_stock&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>