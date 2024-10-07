
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'projects_status'); ?>
        <?php echo _t("Projects_status"); ?>
    </a>
    <a href="index.php?c=projects_status" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "projects_status", "create")) { ?>
        <a href="index.php?c=projects_status&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>