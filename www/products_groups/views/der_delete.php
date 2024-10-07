
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_groups'); ?>
            <?php echo _t("Products_groups"); ?>
    </a>
    <a href="index.php?c=products_groups" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_groups", "create")) { ?>
        <a href="index.php?c=products_groups&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>