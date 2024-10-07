

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
        <?php _menu_icon("top", 'services_unites'); ?>
        <?php echo _t("Services_unites"); ?>
    </a>
    <a href="index.php?c=services_unites" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "services_unites", "create")) { ?>
        <a href="index.php?c=services_unites&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_unites"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (services_unites_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=services_unites&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_unites"); ?>
        <?php echo _t("By unites"); ?>
    </a>
    <?php
    foreach (services_unites_unique_from_col("unites") as $unites) {
        if ($unites['unites'] != "") {
            echo '<a href="index.php?c=services_unites&a=search&w=by_unites&unites=' . $unites['unites'] . '" class="list-group-item">' . $unites['unites'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_unites"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (services_unites_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=services_unites&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_unites"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (services_unites_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=services_unites&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

