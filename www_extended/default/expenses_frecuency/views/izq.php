
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses_frecuency'); ?>
        <?php echo _t("Expenses_frecuency"); ?>
    </a>
    <a href="index.php?c=expenses_frecuency" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=expenses_frecuency&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuency"); ?>
        <?php echo _t("By expense_id"); ?>
    </a>
    <?php
    foreach (expenses_frecuency_unique_from_col("expense_id") as $expense_id) {
        if ($expense_id['expense_id'] != "") {
            echo '<a href="index.php?c=expenses_frecuency&a=search&w=by_expense_id&expense_id=' . $expense_id['expense_id'] . '" class="list-group-item">' . $expense_id['expense_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuency"); ?>
        <?php echo _t("By every"); ?>
    </a>
    <?php
    foreach (expenses_frecuency_unique_from_col("every") as $every) {
        if ($every['every'] != "") {
            echo '<a href="index.php?c=expenses_frecuency&a=search&w=by_every&every=' . $every['every'] . '" class="list-group-item">' . $every['every'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuency"); ?>
        <?php echo _t("By times"); ?>
    </a>
    <?php
    foreach (expenses_frecuency_unique_from_col("times") as $times) {
        if ($times['times'] != "") {
            echo '<a href="index.php?c=expenses_frecuency&a=search&w=by_times&times=' . $times['times'] . '" class="list-group-item">' . $times['times'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuency"); ?>
        <?php echo _t("By date_start"); ?>
    </a>
    <?php
    foreach (expenses_frecuency_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=expenses_frecuency&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuency"); ?>
        <?php echo _t("By date_end"); ?>
    </a>
    <?php
    foreach (expenses_frecuency_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=expenses_frecuency&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuency"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (expenses_frecuency_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=expenses_frecuency&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuency"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (expenses_frecuency_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=expenses_frecuency&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

