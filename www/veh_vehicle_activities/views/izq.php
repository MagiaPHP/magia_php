<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:17 
#################################################################################
?>

                
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
        <?php _menu_icon("top" , 'veh_vehicle_activities'); ?>
            <?php echo _t("Veh vehicle activities"); ?>
    </a>
    <a href="index.php?c=veh_vehicle_activities" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_vehicle_activities", "create")) { ?>
        <a href="index.php?c=veh_vehicle_activities&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("vehicle_id") as $vehicle_id) {
        if ($vehicle_id['vehicle_id'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_vehicle_id&vehicle_id=' . $vehicle_id['vehicle_id'] . '" class="list-group-item">' . $vehicle_id['vehicle_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("driver_id") as $driver_id) {
        if ($driver_id['driver_id'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_driver_id&driver_id=' . $driver_id['driver_id'] . '" class="list-group-item">' . $driver_id['driver_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("start_date") as $start_date) {
        if ($start_date['start_date'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_start_date&start_date=' . $start_date['start_date'] . '" class="list-group-item">' . $start_date['start_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("time_start") as $time_start) {
        if ($time_start['time_start'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_time_start&time_start=' . $time_start['time_start'] . '" class="list-group-item">' . $time_start['time_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("kl_start") as $kl_start) {
        if ($kl_start['kl_start'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_kl_start&kl_start=' . $kl_start['kl_start'] . '" class="list-group-item">' . $kl_start['kl_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("end_date") as $end_date) {
        if ($end_date['end_date'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_end_date&end_date=' . $end_date['end_date'] . '" class="list-group-item">' . $end_date['end_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("time_end") as $time_end) {
        if ($time_end['time_end'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_time_end&time_end=' . $time_end['time_end'] . '" class="list-group-item">' . $time_end['time_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("kl_end") as $kl_end) {
        if ($kl_end['kl_end'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_kl_end&kl_end=' . $kl_end['kl_end'] . '" class="list-group-item">' . $kl_end['kl_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_activities"); ?>
        <?php echo _t("By veh vehicle activities"); ?>
    </a>
    <?php
    foreach (veh_vehicle_activities_unique_from_col("kl_difference") as $kl_difference) {
        if ($kl_difference['kl_difference'] != "") {
            echo '<a href="index.php?c=veh_vehicle_activities&a=search&w=by_kl_difference&kl_difference=' . $kl_difference['kl_difference'] . '" class="list-group-item">' . $kl_difference['kl_difference'] . '</a>';
        }
    }
    ?>
</div>

