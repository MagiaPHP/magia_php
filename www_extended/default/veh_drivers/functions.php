<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Magia_PHP 0.0.1
 * Factuz.com
 * Robinson Coello 
 * www.coello.be
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

/**
 * Recupera una lista de licencias de conducir asociadas con un ID de contacto específico.
 *
 * Esta función consulta la tabla `veh_drivers` para obtener todos los registros donde el `contact_id`
 * coincide con el ID proporcionado. Cada registro representa una licencia de conducir registrada para el contacto.
 * La función devuelve un array de registros de licencias o `false` si no se encuentran registros.
 * Cada registro de licencia incluye detalles como:
 * - `id`: Identificador único del registro de licencia
 * - `contact_id`: ID del contacto asociado con la licencia de conducir
 * - `country`: Código de país donde se emitió la licencia (por ejemplo, 'BE', 'EC')
 * - `license`: Tipo de licencia de conducir (por ejemplo, 'License A')
 * - `type`: Tipo de vehículo cubierto por la licencia (por ejemplo, '1')
 * - `number`: Número de licencia
 * - `date_start`: Fecha de inicio de la validez de la licencia
 * - `date_end`: Fecha de finalización de la validez de la licencia (nullable si la licencia aún es válida)
 * - `order_by`: Orden para la clasificación (por defecto es 1)
 * - `status`: Estado de la licencia (por defecto es 1, indicando activa)
 *
 * @param int $contact_id El ID del contacto cuyas licencias de conducir se deben recuperar.
 * @global PDO $db El objeto de conexión a la base de datos global.
 * @return array|false Devuelve un array de registros de licencias si se encuentran, de lo contrario, `false`.
 */
function veh_drivers_list_by_contact_id($contact_id) {
    global $db; // Accede a la conexión de base de datos global
    $data = null; // Inicializa la variable data
    // Prepara la declaración SQL para seleccionar todas las filas de la tabla `veh_drivers` donde `contact_id` coincide
    $req = $db->prepare("SELECT * FROM `veh_drivers` WHERE `contact_id`= ?");

    // Ejecuta la consulta SQL con el ID de contacto proporcionado
    $req->execute(array($contact_id));

    // Obtiene todos los resultados en la variable $data
    $data = $req->fetchAll();

    // Devuelve los datos si están disponibles, de lo contrario devuelve false
    return (isset($data) && !empty($data)) ? $data : false;
}

// SEARCH
function veh_drivers_search_by_country_number($country, $number, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;

    $data = null;

    $sql = "SELECT `id`,  `contact_id`,  `country`,  `license`,  `type`,  `number`,  `date_start`,  `date_end`,  `expired`,  `order_by`,  `status`    FROM `veh_drivers` 

    WHERE `country` = :country AND  `number` = :number
    
    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':country', $country, PDO::PARAM_STR);
    $query->bindValue(':number', $number, PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
