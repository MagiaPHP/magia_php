

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
        <?php _menu_icon("top", 'projects_categories'); ?>
        <?php echo _t("Projects_categories"); ?>
    </a>
    <a href="index.php?c=projects_categories" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "projects_categories", "create")) { ?>
        <a href="index.php?c=projects_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_categories"); ?>
        <?php echo _t("By fader_code"); ?>
    </a>
    <?php
    foreach (projects_categories_unique_from_col("fader_code") as $fader_code) {
        if ($fader_code['fader_code'] != "") {
            echo '<a href="index.php?c=projects_categories&a=search&w=by_fader_code&fader_code=' . $fader_code['fader_code'] . '" class="list-group-item">' . $fader_code['fader_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_categories"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (projects_categories_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=projects_categories&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_categories"); ?>
        <?php echo _t("By category"); ?>
    </a>
    <?php
    foreach (projects_categories_unique_from_col("category") as $category) {
        if ($category['category'] != "") {
            echo '<a href="index.php?c=projects_categories&a=search&w=by_category&category=' . $category['category'] . '" class="list-group-item">' . $category['category'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_categories"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (projects_categories_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=projects_categories&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_categories"); ?>
        <?php echo _t("By icon"); ?>
    </a>
    <?php
    foreach (projects_categories_unique_from_col("icon") as $icon) {
        if ($icon['icon'] != "") {
            echo '<a href="index.php?c=projects_categories&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_categories"); ?>
        <?php echo _t("By color"); ?>
    </a>
    <?php
    foreach (projects_categories_unique_from_col("color") as $color) {
        if ($color['color'] != "") {
            echo '<a href="index.php?c=projects_categories&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_categories"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (projects_categories_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=projects_categories&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "projects_categories"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (projects_categories_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=projects_categories&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

