
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'services_unites'); ?>
        <?php echo _t("Services_unites"); ?>
    </a>
    <a href="index.php?c=services_unites" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "services_unites", "create")) { ?>
        <a href="index.php?c=services_unites&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>