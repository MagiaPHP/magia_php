<?php

/**
 * Doy una fecha y me da el salario de esa fecha 
 * @global type $db
 * @param type $employee_id
 * @param type $date
 * @return type
 */
function hr_employee_salary_in_date($employee_id, $date) {

    global $db;

    $sql = "
            SELECT  `month`,  `hour`
                       
            FROM `hr_employee_salary` 
            
            WHERE `employee_id` = :employee_id 
            
            AND ( :date BETWEEN `date_start` AND (IF(`date_end` IS NULL, NOW() , `date_end` )))
                        
            ORDER BY `date_start`";

    $query = $db->prepare($sql);

    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);

    $query->bindValue(':date', $date, PDO::PARAM_STR);

    $query->execute();
    $data = $query->fetch();
    return $data;
}

// Cual es la date_start mas reciente del salario
function hr_employee_salary_date_last_salary($employee_id) {

    global $db;
    $sql = "
            SELECT  MAX(`date_start`) as date FROM `hr_employee_salary` WHERE `employee_id` = :employee_id ";

    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['date'];
}

//// SEARCH
//function hr_employee_salary_search_by($field, $txt, $start = 0, $limit = 999, $order_by = 'date_start') {
//    global $db;
//    $data = null;
//    $sql = "SELECT `id`,  `employee_id`,  `month`,  `hour`,  `date_start`,  `date_end`,  `order_by`,  `status`    FROM `hr_employee_salary` 
//    WHERE `$field` = '$txt' 
//    ORDER BY $order_by 
//    Limit  $limit OFFSET $start
//";
//    $query = $db->prepare($sql);
////    $query->bindValue(':field', "field", PDO::PARAM_STR);
////    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
////    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
////    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
//    $query->execute();
//    $data = $query->fetchall();
//    return $data;
//}

/**
 * Verifica si el periodo de un nuevo salario se superpone con algún periodo de salario existente 
 * para un empleado específico. Esto es útil para evitar solapamientos de salarios en las fechas
 * de inicio y fin de un salario.
 *
 * @param int $employee_id El ID del empleado al que pertenece el salario.
 * @param string $date_start La fecha de inicio del nuevo salario en formato 'YYYY-MM-DD'.
 * @param string|null $date_end La fecha de finalización del nuevo salario en formato 'YYYY-MM-DD', 
 *                              o null si el salario no tiene fecha de fin definida.
 *
 * @return bool Devuelve true si hay una superposición de fechas con algún salario existente, 
 *              o false si no hay solapamientos.
 *
 * @example
 * // Verificar si un nuevo salario solapa con algún periodo existente:
 * $solapamiento = hr_employee_salary_check_salary_overlap(1, '2024-01-01', '2024-12-31');
 * if ($solapamiento) {
 *     echo "Las fechas del nuevo salario se solapan con un periodo existente.";
 * } else {
 *     echo "No hay solapamiento en las fechas.";
 * }
 */
function hr_employee_salary_check_salary_overlap($employee_id, $date_start, $date_end = null) {
    global $db;

    // Consulta SQL para contar el número de salarios que se superponen con el nuevo periodo
    $query = "
        SELECT COUNT(*) as count 
        FROM hr_employee_salary 
        WHERE employee_id = ? 
        AND (
            (date_start <= ? AND (date_end >= ? OR date_end IS NULL))  -- Verifica si la fecha de inicio nueva solapa
            OR 
            (? <= date_start AND (? >= date_end OR ? >= date_start))  -- Verifica si la fecha de fin nueva solapa
        )
    ";

    // Parámetros que se pasarán a la consulta preparada
    $params = [$employee_id, $date_start, $date_start, $date_end, $date_end, $date_end];

    // Preparar y ejecutar la consulta
    $stmt = $db->prepare($query);
    $stmt->execute($params);

    // Obtener el resultado de la consulta
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retornar true si se encuentra al menos una superposición de fechas, o false si no hay ninguna
    return $result['count'] > 0;
}

/**
 * Verifica si un empleado tiene un salario sin fecha de fin (abierto).
 * Si existe un salario sin fecha de fin, no permite agregar otro salario 
 * hasta que el periodo anterior se cierre.
 *
 * @param int $employee_id El ID del empleado al que se le verifica el salario.
 *
 * @return bool Devuelve true si hay un salario activo sin fecha de fin (abierto), 
 *              o false si todos los salarios tienen una fecha de fin.
 */
function hr_employee_salary_has_open_period($employee_id) {
    global $db;

    // Verificar que el ID del empleado sea un número entero para prevenir inyecciones.
    if (!filter_var($employee_id, FILTER_VALIDATE_INT)) {
        throw new InvalidArgumentException('El ID del empleado no es válido.');
    }

    // Consulta SQL para verificar si hay un salario sin fecha de fin (date_end es NULL)
    $query = "
        SELECT COUNT(*) as count 
        FROM hr_employee_salary 
        WHERE employee_id = ? 
        AND date_end IS NULL
    ";

    // Parámetro que se pasará a la consulta preparada
    $params = [$employee_id];

    try {
        // Preparar y ejecutar la consulta
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        // Obtener el resultado de la consulta
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retornar true si hay al menos un salario sin fecha de fin (abierto), o false si no hay ninguno
        return $result['count'] > 0;
    } catch (PDOException $e) {
        // Manejo de excepciones para errores de base de datos
        error_log('Error en la consulta: ' . $e->getMessage());
        return false; // O lanzar una excepción, según tu gestión de errores
    }
}


function hr_employee_salary_has_same_start_date($employee_id, $date_start) {
    global $db;

    // Consulta SQL para verificar si ya existe un salario con la misma fecha de inicio
    $query = "
        SELECT COUNT(*) as count 
        FROM hr_employee_salary 
        WHERE employee_id = ? 
        AND date_start = ?
    ";

    // Parámetros que se pasarán a la consulta preparada
    $params = [$employee_id, $date_start];

    // Preparar y ejecutar la consulta
    $stmt = $db->prepare($query);
    $stmt->execute($params);

    // Obtener el resultado de la consulta
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retornar true si hay al menos un salario con la misma fecha de inicio, o false si no hay ninguno
    return $result['count'] > 0;
}
