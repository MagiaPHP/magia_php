<?php include view('hr', 'izq') ?>



<?php 
/**
 * 
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
        <?php _menu_icon("top", 'hr_employee_documents'); ?>
        <?php echo _t("Hr_employee_documents"); ?>
    </a>
    <a href="index.php?c=hr_employee_documents" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "hr_employee_documents", "create")) { ?>
        <a href="index.php?c=hr_employee_documents&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_documents"); ?>
        <?php echo _t("By employee_id"); ?>
    </a>
    <?php
    foreach (hr_employee_documents_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_documents&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_documents"); ?>
        <?php echo _t("By document"); ?>
    </a>
    <?php
    foreach (hr_employee_documents_unique_from_col("document") as $document) {
        if ($document['document'] != "") {
            echo '<a href="index.php?c=hr_employee_documents&a=search&w=by_document&document=' . $document['document'] . '" class="list-group-item">' . $document['document'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_documents"); ?>
        <?php echo _t("By document_number"); ?>
    </a>
    <?php
    foreach (hr_employee_documents_unique_from_col("document_number") as $document_number) {
        if ($document_number['document_number'] != "") {
            echo '<a href="index.php?c=hr_employee_documents&a=search&w=by_document_number&document_number=' . $document_number['document_number'] . '" class="list-group-item">' . $document_number['document_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_documents"); ?>
        <?php echo _t("By date_delivery"); ?>
    </a>
    <?php
    foreach (hr_employee_documents_unique_from_col("date_delivery") as $date_delivery) {
        if ($date_delivery['date_delivery'] != "") {
            echo '<a href="index.php?c=hr_employee_documents&a=search&w=by_date_delivery&date_delivery=' . $date_delivery['date_delivery'] . '" class="list-group-item">' . $date_delivery['date_delivery'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_documents"); ?>
        <?php echo _t("By date_expiration"); ?>
    </a>
    <?php
    foreach (hr_employee_documents_unique_from_col("date_expiration") as $date_expiration) {
        if ($date_expiration['date_expiration'] != "") {
            echo '<a href="index.php?c=hr_employee_documents&a=search&w=by_date_expiration&date_expiration=' . $date_expiration['date_expiration'] . '" class="list-group-item">' . $date_expiration['date_expiration'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_documents"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (hr_employee_documents_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_employee_documents&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_documents"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (hr_employee_documents_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_employee_documents&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>


 */
?>