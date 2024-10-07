<?php include view('veh', 'izq'); ?>

<div class="list-group">
    <a href="index.php?c=veh_vehicles&a=xxxxxxxx" class="list-group-item active">
        Cras justo odio
    </a>
    <a href="index.php?c=veh_vehicles&a=veh_drivers" class="list-group-item">veh_drivers</a>
    <a href="index.php?c=veh_vehicles&a=veh_fuels" class="list-group-item">veh_fuels</a>
    <a href="index.php?c=veh_vehicles&a=veh_insurers" class="list-group-item">veh_insurers</a>
    <a href="index.php?c=veh_vehicles&a=details&id=<?php echo $veh_vehicles->getId(); ?>" class="list-group-item"><?php _t("Details"); ?></a>
    <a href="index.php?c=veh_vehicles&a=veh_vehicles_drivers&id=<?php echo $veh_vehicles->getId(); ?>" class="list-group-item"><?php _t("Drivers"); ?></a>
    
    <a href="index.php?c=veh_vehicles&a=xxxxxxxx" class="list-group-item">veh_vehicles_fuel</a>
    <a href="index.php?c=veh_vehicles&a=xxxxxxxx" class="list-group-item">veh_vehicles_traffic_ticket</a>
    <a href="index.php?c=veh_vehicles&a=xxxxxxxx" class="list-group-item">veh_vehicle_activity</a>
    <a href="index.php?c=veh_vehicles&a=xxxxxxxx" class="list-group-item">veh_vehicle_insurance</a>
    <a href="index.php?c=veh_vehicles&a=xxxxxxxx" class="list-group-item">veh_vehicle_plates</a>


</div>

