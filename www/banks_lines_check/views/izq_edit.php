
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'banks_lines_check'); ?>
        <?php echo _t("Banks_lines_check"); ?>
    </a>
    <a href="index.php?c=banks_lines_check" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "banks_lines_check", "create")) { ?>
        <a href="index.php?c=banks_lines_check&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>