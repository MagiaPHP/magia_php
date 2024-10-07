
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'products_presentation_names'); ?>
            <?php echo _t("Products_presentation_names"); ?>
    </a>
    <a href="index.php?c=products_presentation_names" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "products_presentation_names", "create")) { ?>
        <a href="index.php?c=products_presentation_names&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>