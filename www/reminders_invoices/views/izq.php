
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'reminders_invoices'); ?>
        <?php echo _t("Reminders_invoices"); ?>
    </a>
    <a href="index.php?c=reminders_invoices" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=reminders_invoices&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "reminders_invoices"); ?>
        <?php echo _t("By date_registre"); ?>
    </a>
    <?php
    foreach (reminders_invoices_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=reminders_invoices&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "reminders_invoices"); ?>
        <?php echo _t("By invoice_id"); ?>
    </a>
    <?php
    foreach (reminders_invoices_unique_from_col("invoice_id") as $invoice_id) {
        if ($invoice_id['invoice_id'] != "") {
            echo '<a href="index.php?c=reminders_invoices&a=search&w=by_invoice_id&invoice_id=' . $invoice_id['invoice_id'] . '" class="list-group-item">' . $invoice_id['invoice_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "reminders_invoices"); ?>
        <?php echo _t("By invoice_solde"); ?>
    </a>
    <?php
    foreach (reminders_invoices_unique_from_col("invoice_solde") as $invoice_solde) {
        if ($invoice_solde['invoice_solde'] != "") {
            echo '<a href="index.php?c=reminders_invoices&a=search&w=by_invoice_solde&invoice_solde=' . $invoice_solde['invoice_solde'] . '" class="list-group-item">' . $invoice_solde['invoice_solde'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "reminders_invoices"); ?>
        <?php echo _t("By reminder"); ?>
    </a>
    <?php
    foreach (reminders_invoices_unique_from_col("reminder") as $reminder) {
        if ($reminder['reminder'] != "") {
            echo '<a href="index.php?c=reminders_invoices&a=search&w=by_reminder&reminder=' . $reminder['reminder'] . '" class="list-group-item">' . $reminder['reminder'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "reminders_invoices"); ?>
        <?php echo _t("By reminder_percent"); ?>
    </a>
    <?php
    foreach (reminders_invoices_unique_from_col("reminder_percent") as $reminder_percent) {
        if ($reminder_percent['reminder_percent'] != "") {
            echo '<a href="index.php?c=reminders_invoices&a=search&w=by_reminder_percent&reminder_percent=' . $reminder_percent['reminder_percent'] . '" class="list-group-item">' . $reminder_percent['reminder_percent'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "reminders_invoices"); ?>
        <?php echo _t("By invoice_to_add_id"); ?>
    </a>
    <?php
    foreach (reminders_invoices_unique_from_col("invoice_to_add_id") as $invoice_to_add_id) {
        if ($invoice_to_add_id['invoice_to_add_id'] != "") {
            echo '<a href="index.php?c=reminders_invoices&a=search&w=by_invoice_to_add_id&invoice_to_add_id=' . $invoice_to_add_id['invoice_to_add_id'] . '" class="list-group-item">' . $invoice_to_add_id['invoice_to_add_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "reminders_invoices"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (reminders_invoices_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=reminders_invoices&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "reminders_invoices"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (reminders_invoices_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=reminders_invoices&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

