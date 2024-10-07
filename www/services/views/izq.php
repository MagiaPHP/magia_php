

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
        <?php _menu_icon("top", 'services'); ?>
        <?php echo _t("Services"); ?>
    </a>
    <a href="index.php?c=services" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "services", "create")) { ?>
        <a href="index.php?c=services&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services"); ?>
        <?php echo _t("By category_code"); ?>
    </a>
    <?php
    foreach (services_unique_from_col("category_code") as $category_code) {
        if ($category_code['category_code'] != "") {
            echo '<a href="index.php?c=services&a=search&w=by_category_code&category_code=' . $category_code['category_code'] . '" class="list-group-item">' . $category_code['category_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (services_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=services&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services"); ?>
        <?php echo _t("By service"); ?>
    </a>
    <?php
    foreach (services_unique_from_col("service") as $service) {
        if ($service['service'] != "") {
            echo '<a href="index.php?c=services&a=search&w=by_service&service=' . $service['service'] . '" class="list-group-item">' . $service['service'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (services_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=services&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (services_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=services&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

