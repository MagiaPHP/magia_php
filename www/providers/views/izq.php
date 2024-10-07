

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
        <?php _menu_icon("top", "providers"); ?>
        <?php echo _t("By company_id"); ?>
    </a>
    <?php
    foreach (providers_unique_from_col("company_id") as $company_id) {
        if ($company_id['company_id'] != "") {
            echo '<a href="index.php?c=providers&a=search&w=by_company_id&company_id=' . $company_id['company_id'] . '" class="list-group-item">' . $company_id['company_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "providers"); ?>
        <?php echo _t("By client_number"); ?>
    </a>
    <?php
    foreach (providers_unique_from_col("client_number") as $client_number) {
        if ($client_number['client_number'] != "") {
            echo '<a href="index.php?c=providers&a=search&w=by_client_number&client_number=' . $client_number['client_number'] . '" class="list-group-item">' . $client_number['client_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "providers"); ?>
        <?php echo _t("By date"); ?>
    </a>
    <?php
    foreach (providers_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=providers&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "providers"); ?>
        <?php echo _t("By discount"); ?>
    </a>
    <?php
    foreach (providers_unique_from_col("discount") as $discount) {
        if ($discount['discount'] != "") {
            echo '<a href="index.php?c=providers&a=search&w=by_discount&discount=' . $discount['discount'] . '" class="list-group-item">' . $discount['discount'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "providers"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (providers_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=providers&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "providers"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (providers_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=providers&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

