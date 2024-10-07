
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_categories'); ?>
            <?php echo _t("Products_categories"); ?>
    </a>
    <a href="index.php?c=products_categories" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_categories", "create")) { ?>
        <a href="index.php?c=products_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>