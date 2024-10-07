<?php

// SEARCh en la columna que no sea $txt

function hr_documents_search_by_not_in($field, $array, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *  
        
    FROM `hr_employee_documents` 
    
    WHERE :field NOT IN ( :list )
        

    ORDER BY `order_by` , `id` DESC
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':field', "field", PDO::PARAM_STR);
    $query->bindValue(':list', implode(",", $array), PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function hr_employee_documents_list_documents_by_emplyee_id($employee_id) {
    $res = array();
    foreach (hr_employee_documents_search_by("employee_id", $employee_id) as $key => $item) {
        array_push($res, $item['document']);
    }
    return $res;
}
