
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'services_categories'); ?>
        <?php echo _t("Services_categories"); ?>
    </a>
    <a href="index.php?c=services_categories" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "services_categories", "create")) { ?>
        <a href="index.php?c=services_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>