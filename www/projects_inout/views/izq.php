

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
        <?php _menu_icon("top", 'projects_inout'); ?>
        <?php echo _t("Projects_inout"); ?>
    </a>
    <a href="index.php?c=projects_inout" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "projects_inout", "create")) { ?>
        <a href="index.php?c=projects_inout&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_inout"); ?>
        <?php echo _t("By project_id"); ?>
    </a>
    <?php
    foreach (projects_inout_unique_from_col("project_id") as $project_id) {
        if ($project_id['project_id'] != "") {
            echo '<a href="index.php?c=projects_inout&a=search&w=by_project_id&project_id=' . $project_id['project_id'] . '" class="list-group-item">' . $project_id['project_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_inout"); ?>
        <?php echo _t("By budget_id"); ?>
    </a>
    <?php
    foreach (projects_inout_unique_from_col("budget_id") as $budget_id) {
        if ($budget_id['budget_id'] != "") {
            echo '<a href="index.php?c=projects_inout&a=search&w=by_budget_id&budget_id=' . $budget_id['budget_id'] . '" class="list-group-item">' . $budget_id['budget_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_inout"); ?>
        <?php echo _t("By invoice_id"); ?>
    </a>
    <?php
    foreach (projects_inout_unique_from_col("invoice_id") as $invoice_id) {
        if ($invoice_id['invoice_id'] != "") {
            echo '<a href="index.php?c=projects_inout&a=search&w=by_invoice_id&invoice_id=' . $invoice_id['invoice_id'] . '" class="list-group-item">' . $invoice_id['invoice_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_inout"); ?>
        <?php echo _t("By expense_id"); ?>
    </a>
    <?php
    foreach (projects_inout_unique_from_col("expense_id") as $expense_id) {
        if ($expense_id['expense_id'] != "") {
            echo '<a href="index.php?c=projects_inout&a=search&w=by_expense_id&expense_id=' . $expense_id['expense_id'] . '" class="list-group-item">' . $expense_id['expense_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_inout"); ?>
        <?php echo _t("By value"); ?>
    </a>
    <?php
    foreach (projects_inout_unique_from_col("value") as $value) {
        if ($value['value'] != "") {
            echo '<a href="index.php?c=projects_inout&a=search&w=by_value&value=' . $value['value'] . '" class="list-group-item">' . $value['value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_inout"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (projects_inout_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=projects_inout&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_inout"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (projects_inout_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=projects_inout&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

