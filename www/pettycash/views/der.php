
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'pettycash'); ?>
        <?php echo _t("Pettycash"); ?>
    </a>
    <a href="index.php?c=pettycash" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "pettycash", "create")) { ?>
        <a href="index.php?c=pettycash&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>