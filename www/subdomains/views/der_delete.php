
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'subdomains'); ?>
        <?php echo _t("Subdomains"); ?>
    </a>
    <a href="index.php?c=subdomains" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "subdomains", "create")) { ?>
        <a href="index.php?c=subdomains&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>

</div>