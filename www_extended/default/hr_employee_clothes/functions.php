<?php

// SEARCH
function hr_employee_clothes_search_by_employee_id($employee_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `employee_sizes_clothes_id`,  `date_of_delivery`,  `notes`,  `order_by`,  `status`    
        
    FROM `hr_employee_clothes` 
    
    WHERE `employee_sizes_clothes_id` IN (SELECT id FROM hr_employee_sizes_clothes WHERE employee_id = :employee_id ) 
    
    ORDER BY `date_of_delivery` , `id` DESC
    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_STR);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
