
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "app"); ?>
        <?php echo _t("App"); ?>
    </a>


    <a href="index.php?c=config&a=app_budgets" class="list-group-item <?php echo ($a == "app_budgets") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "budgets"); ?>
        <?php _t("Budgets"); ?>
    </a>

    <a href="index.php?c=config&a=app_invoices" class="list-group-item <?php echo ($a == "app_invoices") ? "list-group-item-info" : ""; ?>">
        <?php _menu_icon("top", "invoices"); ?>
        <?php _t("Invoices"); ?>
    </a>



</div>

