
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'schedule'); ?>
            <?php echo _t("Schedule"); ?>
    </a>
    <a href="index.php?c=schedule" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "schedule", "create")) { ?>
        <a href="index.php?c=schedule&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>