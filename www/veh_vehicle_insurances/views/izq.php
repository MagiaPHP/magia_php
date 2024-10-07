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
# Fecha de creacion del documento: 2024-09-16 17:09:21 
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
        <?php _menu_icon("top" , 'veh_vehicle_insurances'); ?>
            <?php echo _t("Veh vehicle insurances"); ?>
    </a>
    <a href="index.php?c=veh_vehicle_insurances" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_vehicle_insurances", "create")) { ?>
        <a href="index.php?c=veh_vehicle_insurances&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_insurances"); ?>
        <?php echo _t("By veh vehicle insurances"); ?>
    </a>
    <?php
    foreach (veh_vehicle_insurances_unique_from_col("vehicle_id") as $vehicle_id) {
        if ($vehicle_id['vehicle_id'] != "") {
            echo '<a href="index.php?c=veh_vehicle_insurances&a=search&w=by_vehicle_id&vehicle_id=' . $vehicle_id['vehicle_id'] . '" class="list-group-item">' . $vehicle_id['vehicle_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_insurances"); ?>
        <?php echo _t("By veh vehicle insurances"); ?>
    </a>
    <?php
    foreach (veh_vehicle_insurances_unique_from_col("insurance_code") as $insurance_code) {
        if ($insurance_code['insurance_code'] != "") {
            echo '<a href="index.php?c=veh_vehicle_insurances&a=search&w=by_insurance_code&insurance_code=' . $insurance_code['insurance_code'] . '" class="list-group-item">' . $insurance_code['insurance_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_insurances"); ?>
        <?php echo _t("By veh vehicle insurances"); ?>
    </a>
    <?php
    foreach (veh_vehicle_insurances_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=veh_vehicle_insurances&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_insurances"); ?>
        <?php echo _t("By veh vehicle insurances"); ?>
    </a>
    <?php
    foreach (veh_vehicle_insurances_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=veh_vehicle_insurances&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_insurances"); ?>
        <?php echo _t("By veh vehicle insurances"); ?>
    </a>
    <?php
    foreach (veh_vehicle_insurances_unique_from_col("contrat_number") as $contrat_number) {
        if ($contrat_number['contrat_number'] != "") {
            echo '<a href="index.php?c=veh_vehicle_insurances&a=search&w=by_contrat_number&contrat_number=' . $contrat_number['contrat_number'] . '" class="list-group-item">' . $contrat_number['contrat_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_insurances"); ?>
        <?php echo _t("By veh vehicle insurances"); ?>
    </a>
    <?php
    foreach (veh_vehicle_insurances_unique_from_col("countries_ok") as $countries_ok) {
        if ($countries_ok['countries_ok'] != "") {
            echo '<a href="index.php?c=veh_vehicle_insurances&a=search&w=by_countries_ok&countries_ok=' . $countries_ok['countries_ok'] . '" class="list-group-item">' . $countries_ok['countries_ok'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_insurances"); ?>
        <?php echo _t("By veh vehicle insurances"); ?>
    </a>
    <?php
    foreach (veh_vehicle_insurances_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_vehicle_insurances&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_insurances"); ?>
        <?php echo _t("By veh vehicle insurances"); ?>
    </a>
    <?php
    foreach (veh_vehicle_insurances_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_vehicle_insurances&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

