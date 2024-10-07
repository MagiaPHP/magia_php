
                
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
        <?php _menu_icon("top" , 'docs_exchange'); ?>
            <?php echo _t("Docs_exchange"); ?>
    </a>
    <a href="index.php?c=docs_exchange" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "docs_exchange", "create")) { ?>
        <a href="index.php?c=docs_exchange&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By reciver_tva"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("reciver_tva") as $reciver_tva) {
        if ($reciver_tva['reciver_tva'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_reciver_tva&reciver_tva=' . $reciver_tva['reciver_tva'] . '" class="list-group-item">' . $reciver_tva['reciver_tva'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By sender_name"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("sender_name") as $sender_name) {
        if ($sender_name['sender_name'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_sender_name&sender_name=' . $sender_name['sender_name'] . '" class="list-group-item">' . $sender_name['sender_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By label"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("label") as $label) {
        if ($label['label'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_label&label=' . $label['label'] . '" class="list-group-item">' . $label['label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By sender_tva"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("sender_tva") as $sender_tva) {
        if ($sender_tva['sender_tva'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_sender_tva&sender_tva=' . $sender_tva['sender_tva'] . '" class="list-group-item">' . $sender_tva['sender_tva'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By doc_type"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("doc_type") as $doc_type) {
        if ($doc_type['doc_type'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_doc_type&doc_type=' . $doc_type['doc_type'] . '" class="list-group-item">' . $doc_type['doc_type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By doc_id"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("doc_id") as $doc_id) {
        if ($doc_id['doc_id'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_doc_id&doc_id=' . $doc_id['doc_id'] . '" class="list-group-item">' . $doc_id['doc_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By json"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("json") as $json) {
        if ($json['json'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_json&json=' . $json['json'] . '" class="list-group-item">' . $json['json'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By pdf_base64"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("pdf_base64") as $pdf_base64) {
        if ($pdf_base64['pdf_base64'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_pdf_base64&pdf_base64=' . $pdf_base64['pdf_base64'] . '" class="list-group-item">' . $pdf_base64['pdf_base64'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By date_send"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("date_send") as $date_send) {
        if ($date_send['date_send'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_date_send&date_send=' . $date_send['date_send'] . '" class="list-group-item">' . $date_send['date_send'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docs_exchange"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (docs_exchange_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=docs_exchange&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

