
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'api'); ?>
            <?php echo _t("Api"); ?>
    </a>
    <a href="index.php?c=api" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "api", "create")) { ?>
        <a href="index.php?c=api&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>