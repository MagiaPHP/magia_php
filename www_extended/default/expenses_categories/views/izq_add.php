<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses'); ?>
        <?php echo _t("Expenses"); ?>
    </a>
    <a href="index.php?c=expenses" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=expenses&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>




<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses_categories'); ?>
        <?php echo _t("Expenses categories"); ?>
    </a>
    <a href="index.php?c=expenses_categories" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "expenses_categories", "create")) { ?>
        <a href="index.php?c=expenses_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>