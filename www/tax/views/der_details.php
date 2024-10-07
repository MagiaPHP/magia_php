
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'tax'); ?>
        <?php echo _t("Tax"); ?>
    </a>
    <a href="index.php?c=tax" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "tax", "create")) { ?>
        <a href="index.php?c=tax&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>