
                
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
        <?php _menu_icon("top" , 'products_providers'); ?>
            <?php echo _t("Products_providers"); ?>
    </a>
    <a href="index.php?c=products_providers" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "products_providers", "create")) { ?>
        <a href="index.php?c=products_providers&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_providers"); ?>
        <?php echo _t("By product_code"); ?>
    </a>
    <?php
    foreach (products_providers_unique_from_col("product_code") as $product_code) {
        if ($product_code['product_code'] != "") {
            echo '<a href="index.php?c=products_providers&a=search&w=by_product_code&product_code=' . $product_code['product_code'] . '" class="list-group-item">' . $product_code['product_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_providers"); ?>
        <?php echo _t("By provider_id"); ?>
    </a>
    <?php
    foreach (products_providers_unique_from_col("provider_id") as $provider_id) {
        if ($provider_id['provider_id'] != "") {
            echo '<a href="index.php?c=products_providers&a=search&w=by_provider_id&provider_id=' . $provider_id['provider_id'] . '" class="list-group-item">' . $provider_id['provider_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_providers"); ?>
        <?php echo _t("By provider_code"); ?>
    </a>
    <?php
    foreach (products_providers_unique_from_col("provider_code") as $provider_code) {
        if ($provider_code['provider_code'] != "") {
            echo '<a href="index.php?c=products_providers&a=search&w=by_provider_code&provider_code=' . $provider_code['provider_code'] . '" class="list-group-item">' . $provider_code['provider_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_providers"); ?>
        <?php echo _t("By url"); ?>
    </a>
    <?php
    foreach (products_providers_unique_from_col("url") as $url) {
        if ($url['url'] != "") {
            echo '<a href="index.php?c=products_providers&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_providers"); ?>
        <?php echo _t("By price"); ?>
    </a>
    <?php
    foreach (products_providers_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=products_providers&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_providers"); ?>
        <?php echo _t("By notes"); ?>
    </a>
    <?php
    foreach (products_providers_unique_from_col("notes") as $notes) {
        if ($notes['notes'] != "") {
            echo '<a href="index.php?c=products_providers&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_providers"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (products_providers_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=products_providers&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_providers"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (products_providers_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=products_providers&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

