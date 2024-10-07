

<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'banks_lines_check'); ?>
        <?php echo _t("Banks_lines_check"); ?>
    </a>
    <a href="index.php?c=banks_lines_check" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "banks_lines_check", "create")) { ?>
        <a href="index.php?c=banks_lines_check&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By my_account"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("my_account") as $my_account) {
        if ($my_account['my_account'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_my_account&my_account=' . $my_account['my_account'] . '" class="list-group-item">' . $my_account['my_account'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By operation"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("operation") as $operation) {
        if ($operation['operation'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_operation&operation=' . $operation['operation'] . '" class="list-group-item">' . $operation['operation'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By date_operation"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("date_operation") as $date_operation) {
        if ($date_operation['date_operation'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_date_operation&date_operation=' . $date_operation['date_operation'] . '" class="list-group-item">' . $date_operation['date_operation'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By type"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By total"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("total") as $total) {
        if ($total['total'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By currency"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("currency") as $currency) {
        if ($currency['currency'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_currency&currency=' . $currency['currency'] . '" class="list-group-item">' . $currency['currency'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By date_value"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("date_value") as $date_value) {
        if ($date_value['date_value'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_date_value&date_value=' . $date_value['date_value'] . '" class="list-group-item">' . $date_value['date_value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By account_sender"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("account_sender") as $account_sender) {
        if ($account_sender['account_sender'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_account_sender&account_sender=' . $account_sender['account_sender'] . '" class="list-group-item">' . $account_sender['account_sender'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By sender"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("sender") as $sender) {
        if ($sender['sender'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_sender&sender=' . $sender['sender'] . '" class="list-group-item">' . $sender['sender'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By comunication"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("comunication") as $comunication) {
        if ($comunication['comunication'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_comunication&comunication=' . $comunication['comunication'] . '" class="list-group-item">' . $comunication['comunication'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ce"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ce") as $ce) {
        if ($ce['ce'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ce&ce=' . $ce['ce'] . '" class="list-group-item">' . $ce['ce'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By details"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("details") as $details) {
        if ($details['details'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_details&details=' . $details['details'] . '" class="list-group-item">' . $details['details'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By message"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("message") as $message) {
        if ($message['message'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_message&message=' . $message['message'] . '" class="list-group-item">' . $message['message'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By id_office"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("id_office") as $id_office) {
        if ($id_office['id_office'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_id_office&id_office=' . $id_office['id_office'] . '" class="list-group-item">' . $id_office['id_office'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By office_name"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("office_name") as $office_name) {
        if ($office_name['office_name'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_office_name&office_name=' . $office_name['office_name'] . '" class="list-group-item">' . $office_name['office_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By value_bankCheck_transaction"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("value_bankCheck_transaction") as $value_bankCheck_transaction) {
        if ($value_bankCheck_transaction['value_bankCheck_transaction'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_value_bankCheck_transaction&value_bankCheck_transaction=' . $value_bankCheck_transaction['value_bankCheck_transaction'] . '" class="list-group-item">' . $value_bankCheck_transaction['value_bankCheck_transaction'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By countable_balance"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("countable_balance") as $countable_balance) {
        if ($countable_balance['countable_balance'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_countable_balance&countable_balance=' . $countable_balance['countable_balance'] . '" class="list-group-item">' . $countable_balance['countable_balance'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By suffix_account"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("suffix_account") as $suffix_account) {
        if ($suffix_account['suffix_account'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_suffix_account&suffix_account=' . $suffix_account['suffix_account'] . '" class="list-group-item">' . $suffix_account['suffix_account'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By sequential"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("sequential") as $sequential) {
        if ($sequential['sequential'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_sequential&sequential=' . $sequential['sequential'] . '" class="list-group-item">' . $sequential['sequential'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By available_balance"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("available_balance") as $available_balance) {
        if ($available_balance['available_balance'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_available_balance&available_balance=' . $available_balance['available_balance'] . '" class="list-group-item">' . $available_balance['available_balance'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By debit"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("debit") as $debit) {
        if ($debit['debit'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_debit&debit=' . $debit['debit'] . '" class="list-group-item">' . $debit['debit'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By credit"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("credit") as $credit) {
        if ($credit['credit'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_credit&credit=' . $credit['credit'] . '" class="list-group-item">' . $credit['credit'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref") as $ref) {
        if ($ref['ref'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref&ref=' . $ref['ref'] . '" class="list-group-item">' . $ref['ref'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref2"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref2") as $ref2) {
        if ($ref2['ref2'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref2&ref2=' . $ref2['ref2'] . '" class="list-group-item">' . $ref2['ref2'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref3"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref3") as $ref3) {
        if ($ref3['ref3'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref3&ref3=' . $ref3['ref3'] . '" class="list-group-item">' . $ref3['ref3'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref4"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref4") as $ref4) {
        if ($ref4['ref4'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref4&ref4=' . $ref4['ref4'] . '" class="list-group-item">' . $ref4['ref4'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref5"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref5") as $ref5) {
        if ($ref5['ref5'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref5&ref5=' . $ref5['ref5'] . '" class="list-group-item">' . $ref5['ref5'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref6"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref6") as $ref6) {
        if ($ref6['ref6'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref6&ref6=' . $ref6['ref6'] . '" class="list-group-item">' . $ref6['ref6'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref7"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref7") as $ref7) {
        if ($ref7['ref7'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref7&ref7=' . $ref7['ref7'] . '" class="list-group-item">' . $ref7['ref7'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref8"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref8") as $ref8) {
        if ($ref8['ref8'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref8&ref8=' . $ref8['ref8'] . '" class="list-group-item">' . $ref8['ref8'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref9"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref9") as $ref9) {
        if ($ref9['ref9'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref9&ref9=' . $ref9['ref9'] . '" class="list-group-item">' . $ref9['ref9'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By ref10"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("ref10") as $ref10) {
        if ($ref10['ref10'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_ref10&ref10=' . $ref10['ref10'] . '" class="list-group-item">' . $ref10['ref10'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By date_registre"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines_check"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (banks_lines_check_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=banks_lines_check&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

