

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
        <?php _menu_icon("top", 'services_price'); ?>
        <?php echo _t("Services_price"); ?>
    </a>
    <a href="index.php?c=services_price" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "services_price", "create")) { ?>
        <a href="index.php?c=services_price&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_price"); ?>
        <?php echo _t("By service_code"); ?>
    </a>
    <?php
    foreach (services_price_unique_from_col("service_code") as $service_code) {
        if ($service_code['service_code'] != "") {
            echo '<a href="index.php?c=services_price&a=search&w=by_service_code&service_code=' . $service_code['service_code'] . '" class="list-group-item">' . $service_code['service_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_price"); ?>
        <?php echo _t("By unite_code"); ?>
    </a>
    <?php
    foreach (services_price_unique_from_col("unite_code") as $unite_code) {
        if ($unite_code['unite_code'] != "") {
            echo '<a href="index.php?c=services_price&a=search&w=by_unite_code&unite_code=' . $unite_code['unite_code'] . '" class="list-group-item">' . $unite_code['unite_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_price"); ?>
        <?php echo _t("By price"); ?>
    </a>
    <?php
    foreach (services_price_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=services_price&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_price"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (services_price_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=services_price&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_price"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (services_price_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=services_price&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

