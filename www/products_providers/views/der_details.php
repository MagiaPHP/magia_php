
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_providers'); ?>
            <?php echo _t("Products_providers"); ?>
    </a>
    <a href="index.php?c=products_providers" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_providers", "create")) { ?>
        <a href="index.php?c=products_providers&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>