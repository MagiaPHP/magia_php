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
# Fecha de creacion del documento: 2024-09-16 17:09:46 
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
        <?php _menu_icon("top" , 'veh_vehicles_traffic_tickets'); ?>
            <?php echo _t("Veh vehicles traffic tickets"); ?>
    </a>
    <a href="index.php?c=veh_vehicles_traffic_tickets" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_vehicles_traffic_tickets", "create")) { ?>
        <a href="index.php?c=veh_vehicles_traffic_tickets&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_traffic_tickets"); ?>
        <?php echo _t("By veh vehicles traffic tickets"); ?>
    </a>
    <?php
    foreach (veh_vehicles_traffic_tickets_unique_from_col("vehicle_id") as $vehicle_id) {
        if ($vehicle_id['vehicle_id'] != "") {
            echo '<a href="index.php?c=veh_vehicles_traffic_tickets&a=search&w=by_vehicle_id&vehicle_id=' . $vehicle_id['vehicle_id'] . '" class="list-group-item">' . $vehicle_id['vehicle_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_traffic_tickets"); ?>
        <?php echo _t("By veh vehicles traffic tickets"); ?>
    </a>
    <?php
    foreach (veh_vehicles_traffic_tickets_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=veh_vehicles_traffic_tickets&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_traffic_tickets"); ?>
        <?php echo _t("By veh vehicles traffic tickets"); ?>
    </a>
    <?php
    foreach (veh_vehicles_traffic_tickets_unique_from_col("time") as $time) {
        if ($time['time'] != "") {
            echo '<a href="index.php?c=veh_vehicles_traffic_tickets&a=search&w=by_time&time=' . $time['time'] . '" class="list-group-item">' . $time['time'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_traffic_tickets"); ?>
        <?php echo _t("By veh vehicles traffic tickets"); ?>
    </a>
    <?php
    foreach (veh_vehicles_traffic_tickets_unique_from_col("pv_police") as $pv_police) {
        if ($pv_police['pv_police'] != "") {
            echo '<a href="index.php?c=veh_vehicles_traffic_tickets&a=search&w=by_pv_police&pv_police=' . $pv_police['pv_police'] . '" class="list-group-item">' . $pv_police['pv_police'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_traffic_tickets"); ?>
        <?php echo _t("By veh vehicles traffic tickets"); ?>
    </a>
    <?php
    foreach (veh_vehicles_traffic_tickets_unique_from_col("driver_id") as $driver_id) {
        if ($driver_id['driver_id'] != "") {
            echo '<a href="index.php?c=veh_vehicles_traffic_tickets&a=search&w=by_driver_id&driver_id=' . $driver_id['driver_id'] . '" class="list-group-item">' . $driver_id['driver_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_traffic_tickets"); ?>
        <?php echo _t("By veh vehicles traffic tickets"); ?>
    </a>
    <?php
    foreach (veh_vehicles_traffic_tickets_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=veh_vehicles_traffic_tickets&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_traffic_tickets"); ?>
        <?php echo _t("By veh vehicles traffic tickets"); ?>
    </a>
    <?php
    foreach (veh_vehicles_traffic_tickets_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_vehicles_traffic_tickets&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_traffic_tickets"); ?>
        <?php echo _t("By veh vehicles traffic tickets"); ?>
    </a>
    <?php
    foreach (veh_vehicles_traffic_tickets_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_vehicles_traffic_tickets&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

