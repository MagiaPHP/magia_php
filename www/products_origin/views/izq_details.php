
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_origin'); ?>
            <?php echo _t("Products_origin"); ?>
    </a>
    <a href="index.php?c=products_origin" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_origin", "create")) { ?>
        <a href="index.php?c=products_origin&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>