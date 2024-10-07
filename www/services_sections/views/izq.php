

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
        <?php _menu_icon("top", 'services_sections'); ?>
        <?php echo _t("Services_sections"); ?>
    </a>
    <a href="index.php?c=services_sections" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "services_sections", "create")) { ?>
        <a href="index.php?c=services_sections&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_sections"); ?>
        <?php echo _t("By section_father"); ?>
    </a>
    <?php
    foreach (services_sections_unique_from_col("section_father") as $section_father) {
        if ($section_father['section_father'] != "") {
            echo '<a href="index.php?c=services_sections&a=search&w=by_section_father&section_father=' . $section_father['section_father'] . '" class="list-group-item">' . $section_father['section_father'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_sections"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (services_sections_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=services_sections&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_sections"); ?>
        <?php echo _t("By section"); ?>
    </a>
    <?php
    foreach (services_sections_unique_from_col("section") as $section) {
        if ($section['section'] != "") {
            echo '<a href="index.php?c=services_sections&a=search&w=by_section&section=' . $section['section'] . '" class="list-group-item">' . $section['section'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_sections"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (services_sections_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=services_sections&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "services_sections"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (services_sections_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=services_sections&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

