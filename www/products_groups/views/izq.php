
                
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
        <?php _menu_icon("top" , 'products_groups'); ?>
            <?php echo _t("Products_groups"); ?>
    </a>
    <a href="index.php?c=products_groups" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "products_groups", "create")) { ?>
        <a href="index.php?c=products_groups&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_groups"); ?>
        <?php echo _t("By father_code"); ?>
    </a>
    <?php
    foreach (products_groups_unique_from_col("father_code") as $father_code) {
        if ($father_code['father_code'] != "") {
            echo '<a href="index.php?c=products_groups&a=search&w=by_father_code&father_code=' . $father_code['father_code'] . '" class="list-group-item">' . $father_code['father_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_groups"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (products_groups_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=products_groups&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_groups"); ?>
        <?php echo _t("By name"); ?>
    </a>
    <?php
    foreach (products_groups_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=products_groups&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_groups"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (products_groups_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=products_groups&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_groups"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (products_groups_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=products_groups&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

