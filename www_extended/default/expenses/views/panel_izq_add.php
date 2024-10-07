<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses'); ?>
        <?php echo _t("Purchase invoices"); ?>
    </a>
    <a href="index.php?c=expenses" class="list-group-item"><?php echo icon("list"); ?> <?php _t("List"); ?></a>
    <a href="index.php?c=expenses&a=add" class="list-group-item"><?php echo icon("plus"); ?> <?php _t("Add new expense"); ?></a> 
    <a href="index.php?c=expenses_categories" class="list-group-item"><?php _menu_icon("top", 'expenses'); ?> <?php _t("Expenses categories"); ?></a>
    <a href="index.php?c=banks_lines" class="list-group-item"><?php _menu_icon("top", 'banks_lines'); ?> <?php _t("Banks lines"); ?></a>
</div>
