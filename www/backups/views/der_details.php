
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'backups'); ?>
            <?php echo _t("Backups"); ?>
    </a>
    <a href="index.php?c=backups" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "backups", "create")) { ?>
        <a href="index.php?c=backups&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>