
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'invoices_separators'); ?>
        <?php echo _t("Invoices_separators"); ?>
    </a>
    <a href="index.php?c=invoices_separators" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "invoices_separators", "create")) { ?>
        <a href="index.php?c=invoices_separators&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>