<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("status") as $status) {
        $total_by_category = (expenses_total_by_status($status['status']) > 0) ? '<span class="badge">' . expenses_total_by_status($status['status']) . '</span>' : '';
        if ($status['status'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . expenses_status_field_code('name', $status['status']) . ' ' . $total_by_category . '</a>';
        }
    }
    ?>
</div>