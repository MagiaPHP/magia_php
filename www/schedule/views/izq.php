
                
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
        <?php _menu_icon("top" , 'schedule'); ?>
            <?php echo _t("Schedule"); ?>
    </a>
    <a href="index.php?c=schedule" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "schedule", "create")) { ?>
        <a href="index.php?c=schedule&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "schedule"); ?>
        <?php echo _t("By contact_id"); ?>
    </a>
    <?php
    foreach (schedule_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=schedule&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "schedule"); ?>
        <?php echo _t("By day"); ?>
    </a>
    <?php
    foreach (schedule_unique_from_col("day") as $day) {
        if ($day['day'] != "") {
            echo '<a href="index.php?c=schedule&a=search&w=by_day&day=' . $day['day'] . '" class="list-group-item">' . $day['day'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "schedule"); ?>
        <?php echo _t("By am_start"); ?>
    </a>
    <?php
    foreach (schedule_unique_from_col("am_start") as $am_start) {
        if ($am_start['am_start'] != "") {
            echo '<a href="index.php?c=schedule&a=search&w=by_am_start&am_start=' . $am_start['am_start'] . '" class="list-group-item">' . $am_start['am_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "schedule"); ?>
        <?php echo _t("By am_end"); ?>
    </a>
    <?php
    foreach (schedule_unique_from_col("am_end") as $am_end) {
        if ($am_end['am_end'] != "") {
            echo '<a href="index.php?c=schedule&a=search&w=by_am_end&am_end=' . $am_end['am_end'] . '" class="list-group-item">' . $am_end['am_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "schedule"); ?>
        <?php echo _t("By pm_start"); ?>
    </a>
    <?php
    foreach (schedule_unique_from_col("pm_start") as $pm_start) {
        if ($pm_start['pm_start'] != "") {
            echo '<a href="index.php?c=schedule&a=search&w=by_pm_start&pm_start=' . $pm_start['pm_start'] . '" class="list-group-item">' . $pm_start['pm_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "schedule"); ?>
        <?php echo _t("By pm_end"); ?>
    </a>
    <?php
    foreach (schedule_unique_from_col("pm_end") as $pm_end) {
        if ($pm_end['pm_end'] != "") {
            echo '<a href="index.php?c=schedule&a=search&w=by_pm_end&pm_end=' . $pm_end['pm_end'] . '" class="list-group-item">' . $pm_end['pm_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "schedule"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (schedule_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=schedule&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "schedule"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (schedule_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=schedule&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

