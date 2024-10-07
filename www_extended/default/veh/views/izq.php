<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _t('Veh'); ?>
    </a>

    <?php
    // Definimos un array con las tablas y sus descripciones


    $tables = db_list_table_with_same_prefixe('veh_');

    //vardump($tables);

    $tables = array(
        'veh_vehicles' => 'Vehicles',
        'veh_vehicles_fuel' => 'Fuel Log',
        'veh_vehicles_traffic_tickets' => 'Traffic Tickets',
        'veh_maintenance' => 'Maintenance',
        'veh_driver_licenses' => 'Driver Licenses',
        'veh_drivers' => 'Drivers List',
        'veh_fuels' => 'Fuel Types',
        'veh_insurers' => 'Insurers Info',
        'veh_maintenance_lines' => 'Maintenance Details',
        'veh_vehicle_activities' => 'Vehicle Activities',
        'veh_vehicle_insurances' => 'Vehicle Insurance',
        'veh_vehicle_kilometers' => 'Mileage Log',
        'veh_vehicle_management' => 'Fleet Management',
        'veh_vehicle_plates' => 'License Plates',
        'veh_vehicles_drivers' => 'Driver Assignment',
    );

    // Iteramos sobre el array para generar los elementos de la lista
    foreach ($tables as $url => $description) {
        echo '<a href="index.php?c=' . htmlspecialchars($url) . '" class="list-group-item">' . htmlspecialchars($description) . '</a>';
    }
    ?>
</div>
