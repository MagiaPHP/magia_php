
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'projects_inout'); ?>
        <?php echo _t("Projects_inout"); ?>
    </a>
    <a href="index.php?c=projects_inout" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "projects_inout", "create")) { ?>
        <a href="index.php?c=projects_inout&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>