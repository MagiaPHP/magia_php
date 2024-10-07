<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Magia_PHP 0.0.1
 * Factuz.com
 * Robinson Coello 
 * www.coello.be
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function veh_vehicles_drivers_search_by_vehicle_id($vehicle_id, $start = 0, $limit = 999) {
    global $db; // Utiliza la conexión global a la base de datos
    $data = null;

    // Consulta SQL para buscar registros por `vehicle_id`
    $sql = "SELECT `id`, `plate`, `driver_id`, `date_start`, `notes`, `date_registre`, `order_by`, `status`    
            FROM `veh_vehicles_drivers` 
            WHERE `plate` = :vehicle_id 
            ORDER BY `order_by`, `id` DESC
            LIMIT :limit OFFSET :start";

    // Preparación de la consulta
    $query = $db->prepare($sql);
    $query->bindValue(':vehicle_id', $vehicle_id, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    // Ejecución de la consulta
    $query->execute();

    // Obtención de los resultados
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

/**
 * Retrieves the list of vehicles associated with a given driver ID.
 *
 * @param int $driver_id The ID of the driver whose associated vehicles are to be retrieved.
 * @return array|false An array of vehicles associated with the driver, or false if none found or an error occurs.
 */
function veh_vehicles_drivers_list_by_driver_id($driver_id) {
    global $db; // Assumes $db is a valid PDO instance
    $data = null;

    // SQL query to get vehicles associated with the driver
    $sql = "SELECT 
                vvd.id, 
                vvd.vehicle_id, 
                vvd.driver_id, 
                vvd.date_start, 
                vvd.notes, 
                vvd.date_registre, 
                vvd.order_by, 
                vvd.status,
                v.*
            FROM veh_vehicles_drivers AS vvd
            INNER JOIN veh_vehicles AS v ON v.id = vvd.vehicle_id
            WHERE vvd.driver_id = :driver_id";

    try {
        // Prepare and execute the query
        $query = $db->prepare($sql);
        $query->bindValue(':driver_id', $driver_id, PDO::PARAM_INT);
        $query->execute();

        // Fetch all results
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle query errors
        error_log("Database query error: " . $e->getMessage());
        return false;
    }

    // Return data or false if no records found
    return !empty($data) ? $data : false;
}

/**
 * Obtiene la lista de chóferes con vehículos asignados en una fecha determinada, junto con detalles del vehículo.
 *
 * @param string $date Fecha en formato 'YYYY-MM-DD'.
 * @return array|false Array de registros con detalles del chófer y del vehículo o `false` si ocurre un error.
 */
function veh_vehicles_drivers_get_drivers_by_date($date) {
    global $db;
    $data = null;

    // Prepara la consulta SQL con JOIN
    $sql = "
        SELECT vvd.`driver_id`, vvd.`date_start`, vvd.`date_end`, vvd.`notes`,
        
               vv.`id` AS vehicle_id, vv.`name`, vv.`year`
               
        FROM `veh_vehicles_drivers` vvd
        
        JOIN `veh_vehicles` vv ON vvd.`vehicle_id` = vv.`id`
        
        WHERE vvd.`date_start` <= :date
        
        AND (DATE(vvd.`date_end`) IS NULL OR vvd.`date_end` >= :date)
        

    ";

    $query = $db->prepare($sql);
    $query->bindValue(':date', $date, PDO::PARAM_STR);
    $query->execute();

    // Obtiene los resultados
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    // Retorna los resultados
    return ($data !== false) ? $data : false;
}

function veh_vehicles_list_unassigned($driver_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    // Consulta para obtener los vehículos no asignados al conductor específico
    $sql = "
        SELECT v.`id`, v.`name`, v.`marca`, v.`modelo`, v.`serie`, v.`type`, 
               v.`pasangers`, v.`year`, v.`chasis`, v.`color`, v.`alto`, 
               v.`ancho`, v.`largo`, v.`date_buy`, v.`mma`, 
               v.`towing_system`, v.`towing_system_kl`, v.`date_registre`, 
               v.`order_by`, v.`status`   
        FROM `veh_vehicles` v
        LEFT JOIN `veh_vehicles_drivers` vd ON v.`id` = vd.`vehicle_id` AND vd.`driver_id` = :driver_id
        WHERE vd.`vehicle_id` IS NULL  -- Filtro para obtener solo los no asignados al driver especificado
        ORDER BY v.`order_by`, v.`id` DESC  
        LIMIT :limit OFFSET :start";

    $query = $db->prepare($sql);
    $query->bindValue(':driver_id', (int) $driver_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchAll();

    return $data;
}
