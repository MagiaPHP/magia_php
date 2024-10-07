<?php

function hr_benefits_list_not_used_by($employee_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT * 
        
    FROM `hr_benefits` 
    
    WHERE `code` NOT IN (SELECT `benefit_code` FROM `hr_employee_benefits` WHERE `employee_id` = :employee_id )
    
    ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
