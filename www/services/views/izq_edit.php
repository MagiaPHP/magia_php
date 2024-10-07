
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'services'); ?>
        <?php echo _t("Services"); ?>
    </a>
    <a href="index.php?c=services" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "services", "create")) { ?>
        <a href="index.php?c=services&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>