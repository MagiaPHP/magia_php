
                
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
        <?php _menu_icon("top" , 'products_stock'); ?>
            <?php echo _t("Products_stock"); ?>
    </a>
    <a href="index.php?c=products_stock" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "products_stock", "create")) { ?>
        <a href="index.php?c=products_stock&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_stock"); ?>
        <?php echo _t("By product_code"); ?>
    </a>
    <?php
    foreach (products_stock_unique_from_col("product_code") as $product_code) {
        if ($product_code['product_code'] != "") {
            echo '<a href="index.php?c=products_stock&a=search&w=by_product_code&product_code=' . $product_code['product_code'] . '" class="list-group-item">' . $product_code['product_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_stock"); ?>
        <?php echo _t("By office_id"); ?>
    </a>
    <?php
    foreach (products_stock_unique_from_col("office_id") as $office_id) {
        if ($office_id['office_id'] != "") {
            echo '<a href="index.php?c=products_stock&a=search&w=by_office_id&office_id=' . $office_id['office_id'] . '" class="list-group-item">' . $office_id['office_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_stock"); ?>
        <?php echo _t("By stock"); ?>
    </a>
    <?php
    foreach (products_stock_unique_from_col("stock") as $stock) {
        if ($stock['stock'] != "") {
            echo '<a href="index.php?c=products_stock&a=search&w=by_stock&stock=' . $stock['stock'] . '" class="list-group-item">' . $stock['stock'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_stock"); ?>
        <?php echo _t("By stock_min"); ?>
    </a>
    <?php
    foreach (products_stock_unique_from_col("stock_min") as $stock_min) {
        if ($stock_min['stock_min'] != "") {
            echo '<a href="index.php?c=products_stock&a=search&w=by_stock_min&stock_min=' . $stock_min['stock_min'] . '" class="list-group-item">' . $stock_min['stock_min'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_stock"); ?>
        <?php echo _t("By stock_max"); ?>
    </a>
    <?php
    foreach (products_stock_unique_from_col("stock_max") as $stock_max) {
        if ($stock_max['stock_max'] != "") {
            echo '<a href="index.php?c=products_stock&a=search&w=by_stock_max&stock_max=' . $stock_max['stock_max'] . '" class="list-group-item">' . $stock_max['stock_max'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_stock"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (products_stock_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=products_stock&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_stock"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (products_stock_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=products_stock&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

