
                
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
        <?php _menu_icon("top" , 'products_price'); ?>
            <?php echo _t("Products_price"); ?>
    </a>
    <a href="index.php?c=products_price" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "products_price", "create")) { ?>
        <a href="index.php?c=products_price&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_price"); ?>
        <?php echo _t("By product_code"); ?>
    </a>
    <?php
    foreach (products_price_unique_from_col("product_code") as $product_code) {
        if ($product_code['product_code'] != "") {
            echo '<a href="index.php?c=products_price&a=search&w=by_product_code&product_code=' . $product_code['product_code'] . '" class="list-group-item">' . $product_code['product_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_price"); ?>
        <?php echo _t("By price"); ?>
    </a>
    <?php
    foreach (products_price_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=products_price&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_price"); ?>
        <?php echo _t("By date_from"); ?>
    </a>
    <?php
    foreach (products_price_unique_from_col("date_from") as $date_from) {
        if ($date_from['date_from'] != "") {
            echo '<a href="index.php?c=products_price&a=search&w=by_date_from&date_from=' . $date_from['date_from'] . '" class="list-group-item">' . $date_from['date_from'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_price"); ?>
        <?php echo _t("By date_to"); ?>
    </a>
    <?php
    foreach (products_price_unique_from_col("date_to") as $date_to) {
        if ($date_to['date_to'] != "") {
            echo '<a href="index.php?c=products_price&a=search&w=by_date_to&date_to=' . $date_to['date_to'] . '" class="list-group-item">' . $date_to['date_to'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_price"); ?>
        <?php echo _t("By online"); ?>
    </a>
    <?php
    foreach (products_price_unique_from_col("online") as $online) {
        if ($online['online'] != "") {
            echo '<a href="index.php?c=products_price&a=search&w=by_online&online=' . $online['online'] . '" class="list-group-item">' . $online['online'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_price"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (products_price_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=products_price&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_price"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (products_price_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=products_price&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

