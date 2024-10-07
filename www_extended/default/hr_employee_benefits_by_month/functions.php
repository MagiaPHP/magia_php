<?php

// SEARCH
function hr_employee_benefits_by_month_search_by_year_month($year, $month, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `employee_id`,  `year`,  `month`,  `benefit_code`,  `quantity`,  `price`,  `company_part`,  `employee_part`,  `company_part_value`,  `employee_part_value`,  `order_by`,  `status`    FROM `hr_employee_benefits_by_month` 
    
    WHERE `year` = :year AND  `month` = :month
    
    ORDER BY `order_by` , `id` DESC
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function hr_employee_benefits_by_month_search_by_employee_id_year_month_benefit_code($employee_id, $year, $month, $benefit_code, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `employee_id`,  `year`,  `month`,  `benefit_code`,  `quantity`,  `price`,  `company_part`,  `employee_part`,  `company_part_value`,  `employee_part_value`,  `order_by`,  `status`    

    FROM `hr_employee_benefits_by_month` 
    
    WHERE `year` = :year AND  `month` = :month AND `employee_id` = :employee_id AND `benefit_code` = :benefit_code
    
    ORDER BY `order_by` , `id` DESC
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':benefit_code', $benefit_code, PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function hr_employee_benefits_by_month_update($id, $quantity, $price, $company_part) {
    global $db;
    $req = $db->prepare("
            UPDATE `hr_employee_benefits_by_month` 
            SET             
            `quantity` = :quantity,
            `price` = :price,
            `company_part` = :company_part
        
            WHERE id=:id 
    ");

    $req->execute(array(
        "id" => $id,
        "quantity" => $quantity,
        "price" => $price,
        "company_part" => $company_part
            )
    );

    return $db->lastInsertId();
}

function hr_employee_benefits_by_month_create($employee_id, $year, $month, $benefit_code, $quantity, $price, $company_part) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_employee_benefits_by_month` 
        ( `id`, `employee_id`,  `year`,  `month`,  `benefit_code`,  `quantity`,  `price`,  `company_part` , `order_by` ,   `status`   )
        VALUES  
        (:id ,  :employee_id ,  :year ,  :month ,  :benefit_code ,  :quantity ,  :price ,  :company_part ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "employee_id" => $employee_id,
        "year" => $year,
        "month" => $month,
        "benefit_code" => $benefit_code,
        "quantity" => $quantity,
        "price" => $price,
        "company_part" => $company_part,
        "order_by" => 1,
        "status" => 1
            )
    );

    return $db->lastInsertId();
}

function hr_employee_benefits_by_month_push($employee_id, $year, $month, $benefit_code, $quantity = null, $price = null, $company_part = null) {
    
    $id = hr_employee_benefits_by_month_search_by_employee_id_year_month_benefit_code($employee_id, $year, $month, $benefit_code)['id'] ?? false;

    if ($id) {
        hr_employee_benefits_by_month_update($id, $quantity, $price, $company_part);
    } else {
        hr_employee_benefits_by_month_create($employee_id, $year, $month, $benefit_code, $quantity, $price, $company_part);
    }
}
