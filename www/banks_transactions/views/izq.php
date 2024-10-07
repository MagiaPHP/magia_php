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
# Fecha de creacion del documento: 2024-09-16 12:09:23 
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
        <?php _menu_icon("top" , 'banks_transactions'); ?>
            <?php echo _t("Banks transactions"); ?>
    </a>
    <a href="index.php?c=banks_transactions" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "banks_transactions", "create")) { ?>
        <a href="index.php?c=banks_transactions&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("client_id") as $client_id) {
        if ($client_id['client_id'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_client_id&client_id=' . $client_id['client_id'] . '" class="list-group-item">' . $client_id['client_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("document") as $document) {
        if ($document['document'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_document&document=' . $document['document'] . '" class="list-group-item">' . $document['document'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("document_id") as $document_id) {
        if ($document_id['document_id'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_document_id&document_id=' . $document_id['document_id'] . '" class="list-group-item">' . $document_id['document_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("account_number") as $account_number) {
        if ($account_number['account_number'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_account_number&account_number=' . $account_number['account_number'] . '" class="list-group-item">' . $account_number['account_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("total") as $total) {
        if ($total['total'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("operation_number") as $operation_number) {
        if ($operation_number['operation_number'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_operation_number&operation_number=' . $operation_number['operation_number'] . '" class="list-group-item">' . $operation_number['operation_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("ref") as $ref) {
        if ($ref['ref'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_ref&ref=' . $ref['ref'] . '" class="list-group-item">' . $ref['ref'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("ce") as $ce) {
        if ($ce['ce'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_ce&ce=' . $ce['ce'] . '" class="list-group-item">' . $ce['ce'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("details") as $details) {
        if ($details['details'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_details&details=' . $details['details'] . '" class="list-group-item">' . $details['details'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("message") as $message) {
        if ($message['message'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_message&message=' . $message['message'] . '" class="list-group-item">' . $message['message'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("currency") as $currency) {
        if ($currency['currency'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_currency&currency=' . $currency['currency'] . '" class="list-group-item">' . $currency['currency'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("registre_date") as $registre_date) {
        if ($registre_date['registre_date'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_registre_date&registre_date=' . $registre_date['registre_date'] . '" class="list-group-item">' . $registre_date['registre_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("created_date") as $created_date) {
        if ($created_date['created_date'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_created_date&created_date=' . $created_date['created_date'] . '" class="list-group-item">' . $created_date['created_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("updated_date") as $updated_date) {
        if ($updated_date['updated_date'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_updated_date&updated_date=' . $updated_date['updated_date'] . '" class="list-group-item">' . $updated_date['updated_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("canceled_code") as $canceled_code) {
        if ($canceled_code['canceled_code'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_canceled_code&canceled_code=' . $canceled_code['canceled_code'] . '" class="list-group-item">' . $canceled_code['canceled_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_transactions"); ?>
        <?php echo _t("By banks transactions"); ?>
    </a>
    <?php
    foreach (banks_transactions_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=banks_transactions&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

