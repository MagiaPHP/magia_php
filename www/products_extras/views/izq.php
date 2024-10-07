
                
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
        <?php _menu_icon("top" , 'products_extras'); ?>
            <?php echo _t("Products_extras"); ?>
    </a>
    <a href="index.php?c=products_extras" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "products_extras", "create")) { ?>
        <a href="index.php?c=products_extras&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_extras"); ?>
        <?php echo _t("By product_code"); ?>
    </a>
    <?php
    foreach (products_extras_unique_from_col("product_code") as $product_code) {
        if ($product_code['product_code'] != "") {
            echo '<a href="index.php?c=products_extras&a=search&w=by_product_code&product_code=' . $product_code['product_code'] . '" class="list-group-item">' . $product_code['product_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_extras"); ?>
        <?php echo _t("By extra_name"); ?>
    </a>
    <?php
    foreach (products_extras_unique_from_col("extra_name") as $extra_name) {
        if ($extra_name['extra_name'] != "") {
            echo '<a href="index.php?c=products_extras&a=search&w=by_extra_name&extra_name=' . $extra_name['extra_name'] . '" class="list-group-item">' . $extra_name['extra_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_extras"); ?>
        <?php echo _t("By extra_value"); ?>
    </a>
    <?php
    foreach (products_extras_unique_from_col("extra_value") as $extra_value) {
        if ($extra_value['extra_value'] != "") {
            echo '<a href="index.php?c=products_extras&a=search&w=by_extra_value&extra_value=' . $extra_value['extra_value'] . '" class="list-group-item">' . $extra_value['extra_value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_extras"); ?>
        <?php echo _t("By price"); ?>
    </a>
    <?php
    foreach (products_extras_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=products_extras&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_extras"); ?>
        <?php echo _t("By online"); ?>
    </a>
    <?php
    foreach (products_extras_unique_from_col("online") as $online) {
        if ($online['online'] != "") {
            echo '<a href="index.php?c=products_extras&a=search&w=by_online&online=' . $online['online'] . '" class="list-group-item">' . $online['online'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_extras"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (products_extras_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=products_extras&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_extras"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (products_extras_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=products_extras&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

