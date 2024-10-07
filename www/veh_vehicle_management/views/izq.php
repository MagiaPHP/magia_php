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
# Fecha de creacion del documento: 2024-09-16 17:09:28 
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
        <?php _menu_icon("top" , 'veh_vehicle_management'); ?>
            <?php echo _t("Veh vehicle management"); ?>
    </a>
    <a href="index.php?c=veh_vehicle_management" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_vehicle_management", "create")) { ?>
        <a href="index.php?c=veh_vehicle_management&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_management"); ?>
        <?php echo _t("By veh vehicle management"); ?>
    </a>
    <?php
    foreach (veh_vehicle_management_unique_from_col("vehicle_id") as $vehicle_id) {
        if ($vehicle_id['vehicle_id'] != "") {
            echo '<a href="index.php?c=veh_vehicle_management&a=search&w=by_vehicle_id&vehicle_id=' . $vehicle_id['vehicle_id'] . '" class="list-group-item">' . $vehicle_id['vehicle_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_management"); ?>
        <?php echo _t("By veh vehicle management"); ?>
    </a>
    <?php
    foreach (veh_vehicle_management_unique_from_col("maintenance_type") as $maintenance_type) {
        if ($maintenance_type['maintenance_type'] != "") {
            echo '<a href="index.php?c=veh_vehicle_management&a=search&w=by_maintenance_type&maintenance_type=' . $maintenance_type['maintenance_type'] . '" class="list-group-item">' . $maintenance_type['maintenance_type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_management"); ?>
        <?php echo _t("By veh vehicle management"); ?>
    </a>
    <?php
    foreach (veh_vehicle_management_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=veh_vehicle_management&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_management"); ?>
        <?php echo _t("By veh vehicle management"); ?>
    </a>
    <?php
    foreach (veh_vehicle_management_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=veh_vehicle_management&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_management"); ?>
        <?php echo _t("By veh vehicle management"); ?>
    </a>
    <?php
    foreach (veh_vehicle_management_unique_from_col("cost") as $cost) {
        if ($cost['cost'] != "") {
            echo '<a href="index.php?c=veh_vehicle_management&a=search&w=by_cost&cost=' . $cost['cost'] . '" class="list-group-item">' . $cost['cost'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_management"); ?>
        <?php echo _t("By veh vehicle management"); ?>
    </a>
    <?php
    foreach (veh_vehicle_management_unique_from_col("mileage") as $mileage) {
        if ($mileage['mileage'] != "") {
            echo '<a href="index.php?c=veh_vehicle_management&a=search&w=by_mileage&mileage=' . $mileage['mileage'] . '" class="list-group-item">' . $mileage['mileage'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_management"); ?>
        <?php echo _t("By veh vehicle management"); ?>
    </a>
    <?php
    foreach (veh_vehicle_management_unique_from_col("next_due_date") as $next_due_date) {
        if ($next_due_date['next_due_date'] != "") {
            echo '<a href="index.php?c=veh_vehicle_management&a=search&w=by_next_due_date&next_due_date=' . $next_due_date['next_due_date'] . '" class="list-group-item">' . $next_due_date['next_due_date'] . '</a>';
        }
    }
    ?>
</div>

