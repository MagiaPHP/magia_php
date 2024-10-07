<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
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
        <?php _menu_icon("top" , 'inv_transsactions'); ?>
            <?php echo _t("Inv_transsactions"); ?>
    </a>
    <a href="index.php?c=inv_transsactions" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "inv_transsactions", "create")) { ?>
        <a href="index.php?c=inv_transsactions&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By company_id"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("company_id") as $company_id) {
        if ($company_id['company_id'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_company_id&company_id=' . $company_id['company_id'] . '" class="list-group-item">' . $company_id['company_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By product"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("product") as $product) {
        if ($product['product'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_product&product=' . $product['product'] . '" class="list-group-item">' . $product['product'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By transaction_number"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("transaction_number") as $transaction_number) {
        if ($transaction_number['transaction_number'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_transaction_number&transaction_number=' . $transaction_number['transaction_number'] . '" class="list-group-item">' . $transaction_number['transaction_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By period"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("period") as $period) {
        if ($period['period'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_period&period=' . $period['period'] . '" class="list-group-item">' . $period['period'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By start_date"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("start_date") as $start_date) {
        if ($start_date['start_date'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_start_date&start_date=' . $start_date['start_date'] . '" class="list-group-item">' . $start_date['start_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By operation_number"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("operation_number") as $operation_number) {
        if ($operation_number['operation_number'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_operation_number&operation_number=' . $operation_number['operation_number'] . '" class="list-group-item">' . $operation_number['operation_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By currency"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("currency") as $currency) {
        if ($currency['currency'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_currency&currency=' . $currency['currency'] . '" class="list-group-item">' . $currency['currency'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By amount"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("amount") as $amount) {
        if ($amount['amount'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_amount&amount=' . $amount['amount'] . '" class="list-group-item">' . $amount['amount'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By percentage"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("percentage") as $percentage) {
        if ($percentage['percentage'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_percentage&percentage=' . $percentage['percentage'] . '" class="list-group-item">' . $percentage['percentage'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By term"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("term") as $term) {
        if ($term['term'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_term&term=' . $term['term'] . '" class="list-group-item">' . $term['term'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By interest"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("interest") as $interest) {
        if ($interest['interest'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_interest&interest=' . $interest['interest'] . '" class="list-group-item">' . $interest['interest'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By total"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("total") as $total) {
        if ($total['total'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By retencion"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("retencion") as $retencion) {
        if ($retencion['retencion'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_retencion&retencion=' . $retencion['retencion'] . '" class="list-group-item">' . $retencion['retencion'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By company_comission"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("company_comission") as $company_comission) {
        if ($company_comission['company_comission'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_company_comission&company_comission=' . $company_comission['company_comission'] . '" class="list-group-item">' . $company_comission['company_comission'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By comision_bolsa"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("comision_bolsa") as $comision_bolsa) {
        if ($comision_bolsa['comision_bolsa'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_comision_bolsa&comision_bolsa=' . $comision_bolsa['comision_bolsa'] . '" class="list-group-item">' . $comision_bolsa['comision_bolsa'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By total_receivable"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("total_receivable") as $total_receivable) {
        if ($total_receivable['total_receivable'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_total_receivable&total_receivable=' . $total_receivable['total_receivable'] . '" class="list-group-item">' . $total_receivable['total_receivable'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By expiration_date"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("expiration_date") as $expiration_date) {
        if ($expiration_date['expiration_date'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_expiration_date&expiration_date=' . $expiration_date['expiration_date'] . '" class="list-group-item">' . $expiration_date['expiration_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_transsactions"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (inv_transsactions_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=inv_transsactions&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

