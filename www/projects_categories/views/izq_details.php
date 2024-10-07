
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'projects_categories'); ?>
        <?php echo _t("Projects_categories"); ?>
    </a>
    <a href="index.php?c=projects_categories" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "projects_categories", "create")) { ?>
        <a href="index.php?c=projects_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>