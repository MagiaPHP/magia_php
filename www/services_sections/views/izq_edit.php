
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'services_sections'); ?>
        <?php echo _t("Services_sections"); ?>
    </a>
    <a href="index.php?c=services_sections" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "services_sections", "create")) { ?>
        <a href="index.php?c=services_sections&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>