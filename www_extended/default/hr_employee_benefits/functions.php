<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Magia_PHP 0.0.1
 * Factuz.com
 * Robinson Coello 
 * www.coello.be
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function hr_employee_benefits_list_benefits_by_employee_id($employee_id) {
    $res = array();
    foreach (hr_employee_benefits_search_by("employee_id", $employee_id) as $key => $item) {
        array_push($res, $item['benefit_code']);
    }
    return $res;
}

// SEARCH
function hr_employee_benefits_by_employee_id($employee_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "
            
    SELECT `id`,  `employee_id`,  `benefit_code`,  `company_part`,  `periodicity`,  `price`,  
           

CASE
    WHEN `company_part` = 0 THEN 0
    WHEN `company_part` > 0 THEN (`company_part` * `price`)/100
    
END as value_company_part 
,
CASE
    WHEN company_part = 0 THEN `price`
    WHEN company_part > 0 THEN ((100 - `company_part`) * `price`)/100
    
END as   value_employee_part
,



    `order_by`,  `status`    FROM `hr_employee_benefits` 
    
    WHERE `employee_id` = :employee_id 
    
    ORDER BY `order_by` , `id` DESC
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function hr_employee_benefits_field_by_employee_id_code($employee_id, $benefit_code) {
    global $db;
    $data = null;
    $sql = "
            
    SELECT `id`,  `employee_id`,  `benefit_code`,  `company_part`,  `periodicity`,  `price`,  
    
CASE
    WHEN company_part = 0 THEN 0
    WHEN company_part > 0 THEN price -((price * company_part)/100) 
    
END as  value_employee_part  
,
CASE
    WHEN company_part = 0 THEN `price`
    WHEN company_part > 0 THEN price - ((price * (100-company_part))/100)  
    
END as value_company_part

    FROM `hr_employee_benefits` 
    
    WHERE `employee_id` = :employee_id AND `benefit_code` = :benefit_code
    
    
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->bindValue(':benefit_code', $benefit_code, PDO::PARAM_STR);

    $query->execute();
    $data = $query->fetch();
    return $data;
}

function hr_employee_benefits_update($id, $company_part, $periodicity, $price) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_benefits` SET `company_part` =:company_part, `periodicity` =:periodicity, `price` =:price   WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "company_part" => $company_part,
        "periodicity" => $periodicity,
        "price" => $price,
    ));
}

//function hr_employee_benefits_is_company_part($company_part) {
//    if ($company_part < 0 || $company_part > 100) {
//        return false;
//    }
//    return true;
//}

//function hr_employee_benefits_is_periodicity($periodicity) {
//
//    if ($periodicity < 0) {
//        return false;
//    }
//    return true;
//}
//
//function hr_employee_benefits_is_price($price) {
//
//    if ($price < 0) {
//        return false;
//    }
//    return true;
//}


function hr_employee_benefits_insert($employee_id ,  $benefit_code ,  $price ,  $company_part  ,  $periodicity ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_employee_benefits` ( `id` ,   `employee_id` ,   `benefit_code` ,   `price` ,   `company_part` ,   `periodicity` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :employee_id ,  :benefit_code ,  :price ,  :company_part  ,  :periodicity ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "employee_id" => $employee_id ,  
 "benefit_code" => $benefit_code ,  
 "price" => $price ,  
 "company_part" => $company_part ,  
 "periodicity" => $periodicity ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

