
                
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
        <?php _menu_icon("top" , 'products_presentation'); ?>
            <?php echo _t("Products_presentation"); ?>
    </a>
    <a href="index.php?c=products_presentation" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "products_presentation", "create")) { ?>
        <a href="index.php?c=products_presentation&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By product_code"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("product_code") as $product_code) {
        if ($product_code['product_code'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_product_code&product_code=' . $product_code['product_code'] . '" class="list-group-item">' . $product_code['product_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By presentation_code"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("presentation_code") as $presentation_code) {
        if ($presentation_code['presentation_code'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_presentation_code&presentation_code=' . $presentation_code['presentation_code'] . '" class="list-group-item">' . $presentation_code['presentation_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By contains_total"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("contains_total") as $contains_total) {
        if ($contains_total['contains_total'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_contains_total&contains_total=' . $contains_total['contains_total'] . '" class="list-group-item">' . $contains_total['contains_total'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By contains_code"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("contains_code") as $contains_code) {
        if ($contains_code['contains_code'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_contains_code&contains_code=' . $contains_code['contains_code'] . '" class="list-group-item">' . $contains_code['contains_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By height"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("height") as $height) {
        if ($height['height'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_height&height=' . $height['height'] . '" class="list-group-item">' . $height['height'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By width"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("width") as $width) {
        if ($width['width'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_width&width=' . $width['width'] . '" class="list-group-item">' . $width['width'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By depth"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("depth") as $depth) {
        if ($depth['depth'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_depth&depth=' . $depth['depth'] . '" class="list-group-item">' . $depth['depth'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By weight"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("weight") as $weight) {
        if ($weight['weight'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_weight&weight=' . $weight['weight'] . '" class="list-group-item">' . $weight['weight'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "products_presentation"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (products_presentation_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=products_presentation&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

