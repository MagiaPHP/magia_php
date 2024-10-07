
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_related'); ?>
            <?php echo _t("Products_related"); ?>
    </a>
    <a href="index.php?c=products_related" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_related", "create")) { ?>
        <a href="index.php?c=products_related&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>