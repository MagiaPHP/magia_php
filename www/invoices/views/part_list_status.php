
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "invoices"); ?>
        <?php echo _t("Invoices"); ?>
    </a>
    <a href="index.php?c=invoices" class="list-group-item">
        <?php _t("All"); ?>
    </a>
    <?php foreach (invoice_status_list_e() as $status) { ?>
        <a href="index.php?c=invoices&a=search&w=byCode&code=<?php echo $status['code'] ?>" class="list-group-item"><?php _t($status['status']); ?>
            <span class="badge"><?php echo (invoices_total_by_status($status['code'])) ? invoices_total_by_status($status['code']) : ""; ?></span>
        </a>
    <?php } ?>
    <a href="index.php?c=invoices&a=search&w=byMultiStatus&codes=10,20" class="list-group-item">
        <?php _t("Only pending payment"); ?>
    </a>
</div>