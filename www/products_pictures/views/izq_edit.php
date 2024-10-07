
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_pictures'); ?>
            <?php echo _t("Products_pictures"); ?>
    </a>
    <a href="index.php?c=products_pictures" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_pictures", "create")) { ?>
        <a href="index.php?c=products_pictures&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>