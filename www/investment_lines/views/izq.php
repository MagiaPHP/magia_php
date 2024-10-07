
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'investment_lines'); ?>
        <?php echo _t("Investment_lines"); ?>
    </a>
    <a href="index.php?c=investment_lines" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=investment_lines&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investment_lines"); ?>
        <?php echo _t("By investment_id"); ?>
    </a>
    <?php
    foreach (investment_lines_unique_from_col("investment_id") as $investment_id) {
        if ($investment_id['investment_id'] != "") {
            echo '<a href="index.php?c=investment_lines&a=search&w=by_investment_id&investment_id=' . $investment_id['investment_id'] . '" class="list-group-item">' . $investment_id['investment_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investment_lines"); ?>
        <?php echo _t("By date"); ?>
    </a>
    <?php
    foreach (investment_lines_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=investment_lines&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investment_lines"); ?>
        <?php echo _t("By value"); ?>
    </a>
    <?php
    foreach (investment_lines_unique_from_col("value") as $value) {
        if ($value['value'] != "") {
            echo '<a href="index.php?c=investment_lines&a=search&w=by_value&value=' . $value['value'] . '" class="list-group-item">' . $value['value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investment_lines"); ?>
        <?php echo _t("By irf"); ?>
    </a>
    <?php
    foreach (investment_lines_unique_from_col("irf") as $irf) {
        if ($irf['irf'] != "") {
            echo '<a href="index.php?c=investment_lines&a=search&w=by_irf&irf=' . $irf['irf'] . '" class="list-group-item">' . $irf['irf'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investment_lines"); ?>
        <?php echo _t("By date_payment"); ?>
    </a>
    <?php
    foreach (investment_lines_unique_from_col("date_payment") as $date_payment) {
        if ($date_payment['date_payment'] != "") {
            echo '<a href="index.php?c=investment_lines&a=search&w=by_date_payment&date_payment=' . $date_payment['date_payment'] . '" class="list-group-item">' . $date_payment['date_payment'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investment_lines"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (investment_lines_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=investment_lines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investment_lines"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (investment_lines_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=investment_lines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

