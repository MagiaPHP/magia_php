
                
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
        <?php _menu_icon("top" , 'products_related'); ?>
            <?php echo _t("Products_related"); ?>
    </a>
    <a href="index.php?c=products_related" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "products_related", "create")) { ?>
        <a href="index.php?c=products_related&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_related"); ?>
        <?php echo _t("By product_code"); ?>
    </a>
    <?php
    foreach (products_related_unique_from_col("product_code") as $product_code) {
        if ($product_code['product_code'] != "") {
            echo '<a href="index.php?c=products_related&a=search&w=by_product_code&product_code=' . $product_code['product_code'] . '" class="list-group-item">' . $product_code['product_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_related"); ?>
        <?php echo _t("By related_code"); ?>
    </a>
    <?php
    foreach (products_related_unique_from_col("related_code") as $related_code) {
        if ($related_code['related_code'] != "") {
            echo '<a href="index.php?c=products_related&a=search&w=by_related_code&related_code=' . $related_code['related_code'] . '" class="list-group-item">' . $related_code['related_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_related"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (products_related_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=products_related&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_related"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (products_related_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=products_related&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

