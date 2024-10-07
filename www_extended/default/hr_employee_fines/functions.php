<?php

// SEARCH
function hr_employee_fines_search_by_employee_from_to_category($employee_id, $from, $to, $category_code = null, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    if ($category_code == 'all') {
        $code = ' ';
    } else {
        $code = ' AND `category_code` =:category_code ';
    }


    $sql = "SELECT `id`,  
        `employee_id`,  
        `date`, 
        `category_code`, 
        `description`,
        `value`,         
        `way`,  
        `order_by`,  
        `status`    
        
        FROM `hr_employee_fines` 
    
    WHERE `employee_id` = :employee_id AND ( `date` >= :from AND `date` <= :to ) $code
    
    ORDER BY `date` , `id` DESC
    
    Limit  :limit OFFSET :start
";

    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->bindValue(':from', $from, PDO::PARAM_STR);
    $query->bindValue(':to', $to, PDO::PARAM_STR);
    if ($category_code != 'all') {
        $query->bindValue(':category_code', $category_code, PDO::PARAM_STR);
    }
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function hr_employee_fines_search_by_employee_year_month($employee_id, $year, $month, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  
        `employee_id`,  
        `date`, 
        `category_code`, 
        `description`,
        `value`,         
        `way`,  
        `order_by`,  
        `status`    
        
        FROM `hr_employee_fines` 
    
    WHERE `employee_id` = :employee_id AND ( YEAR(`date`) = :year AND MONTH(`date`) = :month ) 
    
    ORDER BY `order_by` , `id` DESC
    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function hr_employee_fines_total_by_employee_year_month($employee_id, $year, $month) {
    global $db;
    $data = null;

    $sql = "SELECT 
       
        SUM(`value`) as total
                
        FROM `hr_employee_fines` 
    
    WHERE `employee_id` = :employee_id AND ( YEAR(`date`) = :year AND MONTH(`date`) = :month ) 
           
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);

    $query->execute();
    $data = $query->fetch();
    return $data['total'] ?? 0;
}

function hr_fines_categories_field_category_code($field, $category_code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_fines_categories` WHERE `category_code` = ?");
    $req->execute(array($category_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}
