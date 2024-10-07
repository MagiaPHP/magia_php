
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_price'); ?>
            <?php echo _t("Products_price"); ?>
    </a>
    <a href="index.php?c=products_price" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_price", "create")) { ?>
        <a href="index.php?c=products_price&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>