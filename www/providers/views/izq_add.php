
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'providers'); ?>
        <?php echo _t("Providers"); ?>
    </a>
    <a href="index.php?c=providers" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "providers", "create")) { ?>
        <a href="index.php?c=providers&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>