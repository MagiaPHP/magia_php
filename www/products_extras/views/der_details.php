
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_extras'); ?>
            <?php echo _t("Products_extras"); ?>
    </a>
    <a href="index.php?c=products_extras" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_extras", "create")) { ?>
        <a href="index.php?c=products_extras&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>