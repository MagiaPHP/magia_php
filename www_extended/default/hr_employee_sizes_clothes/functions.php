<?php

function hr_employee_sizes_clothes_list_codes_by_employee_id($employee_id) {
    $clothes_code_array = array();
    foreach (hr_employee_sizes_clothes_search_by("employee_id", $employee_id) as $key => $item) {
        array_push($clothes_code_array, $item['clothes_code']);
    }
    return $clothes_code_array;
}

function hr_employee_sizes_clothes_search_by_emplyee_id_not_in($employee_id, $code_array) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `employee_id`,  `clothes_code`,  `size`,  `notes`,  `order_by`,  `status`    FROM `hr_employee_sizes_clothes` 
    WHERE `employee_id` = :employee_id  AND clothes_code NOT IN ( :code_array )        
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->bindValue(':code_array', implode(',', $code_array), PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function hr_employee_sizes_clothes_search_by_employee_code($employee_id, $clothes_code, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `employee_id`,  `clothes_code`,  `size`,  `notes`,  `order_by`,  `status`    FROM `hr_employee_sizes_clothes` 
    WHERE `employee_id` = :employee_id AND  clothes_code = :clothes_code
    
   
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->bindValue(':clothes_code', $clothes_code, PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}
