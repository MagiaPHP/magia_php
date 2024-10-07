
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'projects'); ?>
        <?php echo _t("Projects"); ?>
    </a>
    <a href="index.php?c=projects" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "projects", "create")) { ?>
        <a href="index.php?c=projects&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>