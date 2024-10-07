<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-23 11:09:25 
#################################################################################
?>

                
<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php  include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'expenses'); ?>
            <?php echo _t("Expenses"); ?>
    </a>
    <a href="index.php?c=expenses" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "expenses", "create")) { ?>
        <a href="index.php?c=expenses&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("office_id") as $office_id) {
        if ($office_id['office_id'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_office_id&office_id=' . $office_id['office_id'] . '" class="list-group-item">' . $office_id['office_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("office_id_counter_year_month") as $office_id_counter_year_month) {
        if ($office_id_counter_year_month['office_id_counter_year_month'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_office_id_counter_year_month&office_id_counter_year_month=' . $office_id_counter_year_month['office_id_counter_year_month'] . '" class="list-group-item">' . $office_id_counter_year_month['office_id_counter_year_month'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("office_id_counter_year_trimestre") as $office_id_counter_year_trimestre) {
        if ($office_id_counter_year_trimestre['office_id_counter_year_trimestre'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_office_id_counter_year_trimestre&office_id_counter_year_trimestre=' . $office_id_counter_year_trimestre['office_id_counter_year_trimestre'] . '" class="list-group-item">' . $office_id_counter_year_trimestre['office_id_counter_year_trimestre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("office_id_counter") as $office_id_counter) {
        if ($office_id_counter['office_id_counter'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_office_id_counter&office_id_counter=' . $office_id_counter['office_id_counter'] . '" class="list-group-item">' . $office_id_counter['office_id_counter'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("my_ref") as $my_ref) {
        if ($my_ref['my_ref'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_my_ref&my_ref=' . $my_ref['my_ref'] . '" class="list-group-item">' . $my_ref['my_ref'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("father_id") as $father_id) {
        if ($father_id['father_id'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_father_id&father_id=' . $father_id['father_id'] . '" class="list-group-item">' . $father_id['father_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("category_code") as $category_code) {
        if ($category_code['category_code'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_category_code&category_code=' . $category_code['category_code'] . '" class="list-group-item">' . $category_code['category_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("invoice_number") as $invoice_number) {
        if ($invoice_number['invoice_number'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_invoice_number&invoice_number=' . $invoice_number['invoice_number'] . '" class="list-group-item">' . $invoice_number['invoice_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("budget_id") as $budget_id) {
        if ($budget_id['budget_id'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_budget_id&budget_id=' . $budget_id['budget_id'] . '" class="list-group-item">' . $budget_id['budget_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("credit_note_id") as $credit_note_id) {
        if ($credit_note_id['credit_note_id'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_credit_note_id&credit_note_id=' . $credit_note_id['credit_note_id'] . '" class="list-group-item">' . $credit_note_id['credit_note_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("provider_id") as $provider_id) {
        if ($provider_id['provider_id'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_provider_id&provider_id=' . $provider_id['provider_id'] . '" class="list-group-item">' . $provider_id['provider_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("seller_id") as $seller_id) {
        if ($seller_id['seller_id'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_seller_id&seller_id=' . $seller_id['seller_id'] . '" class="list-group-item">' . $seller_id['seller_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("clon_from_id") as $clon_from_id) {
        if ($clon_from_id['clon_from_id'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_clon_from_id&clon_from_id=' . $clon_from_id['clon_from_id'] . '" class="list-group-item">' . $clon_from_id['clon_from_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("addresses_billing") as $addresses_billing) {
        if ($addresses_billing['addresses_billing'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_addresses_billing&addresses_billing=' . $addresses_billing['addresses_billing'] . '" class="list-group-item">' . $addresses_billing['addresses_billing'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("addresses_delivery") as $addresses_delivery) {
        if ($addresses_delivery['addresses_delivery'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_addresses_delivery&addresses_delivery=' . $addresses_delivery['addresses_delivery'] . '" class="list-group-item">' . $addresses_delivery['addresses_delivery'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("deadline") as $deadline) {
        if ($deadline['deadline'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_deadline&deadline=' . $deadline['deadline'] . '" class="list-group-item">' . $deadline['deadline'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("total") as $total) {
        if ($total['total'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("tax") as $tax) {
        if ($tax['tax'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_tax&tax=' . $tax['tax'] . '" class="list-group-item">' . $tax['tax'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("advance") as $advance) {
        if ($advance['advance'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_advance&advance=' . $advance['advance'] . '" class="list-group-item">' . $advance['advance'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("balance") as $balance) {
        if ($balance['balance'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_balance&balance=' . $balance['balance'] . '" class="list-group-item">' . $balance['balance'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("comments") as $comments) {
        if ($comments['comments'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_comments&comments=' . $comments['comments'] . '" class="list-group-item">' . $comments['comments'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("comments_private") as $comments_private) {
        if ($comments_private['comments_private'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_comments_private&comments_private=' . $comments_private['comments_private'] . '" class="list-group-item">' . $comments_private['comments_private'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("r1") as $r1) {
        if ($r1['r1'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_r1&r1=' . $r1['r1'] . '" class="list-group-item">' . $r1['r1'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("r2") as $r2) {
        if ($r2['r2'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_r2&r2=' . $r2['r2'] . '" class="list-group-item">' . $r2['r2'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("r3") as $r3) {
        if ($r3['r3'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_r3&r3=' . $r3['r3'] . '" class="list-group-item">' . $r3['r3'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("fc") as $fc) {
        if ($fc['fc'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_fc&fc=' . $fc['fc'] . '" class="list-group-item">' . $fc['fc'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("date_update") as $date_update) {
        if ($date_update['date_update'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_date_update&date_update=' . $date_update['date_update'] . '" class="list-group-item">' . $date_update['date_update'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("days") as $days) {
        if ($days['days'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_days&days=' . $days['days'] . '" class="list-group-item">' . $days['days'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("ce") as $ce) {
        if ($ce['ce'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_ce&ce=' . $ce['ce'] . '" class="list-group-item">' . $ce['ce'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("every") as $every) {
        if ($every['every'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_every&every=' . $every['every'] . '" class="list-group-item">' . $every['every'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("times") as $times) {
        if ($times['times'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_times&times=' . $times['times'] . '" class="list-group-item">' . $times['times'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By expenses"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

