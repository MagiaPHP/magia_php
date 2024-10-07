
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products'); ?>
            <?php echo _t("Products"); ?>
    </a>
    <a href="index.php?c=products" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products", "create")) { ?>
        <a href="index.php?c=products&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>