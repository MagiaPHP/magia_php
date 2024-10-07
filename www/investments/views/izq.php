
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'investments'); ?>
        <?php echo _t("Investments"); ?>
    </a>
    <a href="index.php?c=investments" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=investments&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By institution_id"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("institution_id") as $institution_id) {
        if ($institution_id['institution_id'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_institution_id&institution_id=' . $institution_id['institution_id'] . '" class="list-group-item">' . $institution_id['institution_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By type"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By operation"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("operation") as $operation) {
        if ($operation['operation'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_operation&operation=' . $operation['operation'] . '" class="list-group-item">' . $operation['operation'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By ref"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("ref") as $ref) {
        if ($ref['ref'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_ref&ref=' . $ref['ref'] . '" class="list-group-item">' . $ref['ref'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By amount"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("amount") as $amount) {
        if ($amount['amount'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_amount&amount=' . $amount['amount'] . '" class="list-group-item">' . $amount['amount'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By days"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("days") as $days) {
        if ($days['days'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_days&days=' . $days['days'] . '" class="list-group-item">' . $days['days'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By rate"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("rate") as $rate) {
        if ($rate['rate'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_rate&rate=' . $rate['rate'] . '" class="list-group-item">' . $rate['rate'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By total"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("total") as $total) {
        if ($total['total'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By retention"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("retention") as $retention) {
        if ($retention['retention'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_retention&retention=' . $retention['retention'] . '" class="list-group-item">' . $retention['retention'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By date_start"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By date_end"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "investments"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (investments_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=investments&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

