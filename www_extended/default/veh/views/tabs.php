<ul class="nav nav-tabs">
    <li role="presentation" <?php echo ($a == 'details' ) ? '  class="active" ' : ''; ?> ><a href="index.php?c=veh"><?php _t("Vehicles"); ?></a></li>

    <?php
    $tables = array(
        'veh_vehicles_drivers' => 'Drivers',
        'veh_vehicles_fuel' => 'Vehicle Fuel',
        'veh_vehicle_activities' => 'Vehicle Activities',
        'veh_driver_records' => 'Driver Records',
        'veh_drivers' => 'Driver Data',
        'veh_fuel_log' => 'Fuel Log',
        'veh_maintenance' => 'Maintenance History',
        'veh_maintenance_lines' => 'Maintenance Lines',
        'veh_vehicle_insurances' => 'Vehicle Insurances',
        'veh_vehicle_management' => 'Vehicle Management',
        'veh_vehicles_traffic_tickets' => 'Traffic Tickets',
        'veh_driver_licenses' => 'Driver Licenses',
        'veh_fuels' => 'Fuel Types',
        'veh_insurers' => 'Insurers',
        'veh_vehicle_plates' => 'Vehicle Plates',
    );

    foreach ($tables as $url => $description) {

        $class = ($a == $url ) ? ' class="active" ' : '';

        echo '<li role="presentation"  ' . $class . '"><a href="index.php?c=veh_vehicles&a=' . $url . '&id=' . $id . '">' . $description . '</a></li>';
    }
    ?>

</ul>

