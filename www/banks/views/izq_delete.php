
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'banks'); ?>
        <?php echo _t("Banks"); ?>
    </a>
    <a href="index.php?c=banks" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "banks", "create")) { ?>
        <a href="index.php?c=banks&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>