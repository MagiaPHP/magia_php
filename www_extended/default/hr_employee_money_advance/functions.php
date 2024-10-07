<?php

// SEARCH
function hr_employee_money_advance_search_by_year_month($year, $month, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  
        `employee_id`,  
        `date`,  
        `value`,  
        `way`,  
        `order_by`,  
        `status`    
        
        FROM `hr_employee_money_advance` 
    
    WHERE ( YEAR(`date`) = :year AND MONTH(`date`) = :month ) 
    
    ORDER BY `date` , `employee_id`, `id` DESC
    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function hr_employee_money_advance_search_by_employee_year_month($employee_id, $year, $month, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  
        `employee_id`,  
        `date`,  
        `value`,         
        `way`,  
        `order_by`,  
        `status`    
        
        FROM `hr_employee_money_advance` 
    
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
function hr_employee_money_advance_total_by_employee_year_month($employee_id, $year, $month, $way = null, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    switch ($way) {
        case 'bank':
            $sql = "SELECT                 
    SUM(`value`) as total                    
    FROM `hr_employee_money_advance`           
    WHERE (`employee_id` = :employee_id AND ( YEAR(`date`) = :year AND MONTH(`date`) = :month )) AND `way` = 'bank'";
            break;

        case 'cash':
            $sql = "SELECT                
        SUM(`value`) as total        
        FROM `hr_employee_money_advance`           
        WHERE (`employee_id` = :employee_id AND ( YEAR(`date`) = :year AND MONTH(`date`) = :month )) AND `way` = 'cash'";
            break;

        default:
            $sql = "SELECT                 
        SUM(`value`) as total 
        FROM `hr_employee_money_advance`           
        WHERE `employee_id` = :employee_id AND ( YEAR(`date`) = :year AND MONTH(`date`) = :month ) ";
            break;
    }


    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);

    $query->execute();
    $data = $query->fetch();
    return $data['total'] ?? 0;
}


function hr_employee_money_advance_min_year() {
    global $db;
    $data = null;
    $sql = "SELECT MIN(YEAR(`date`)) as min FROM `hr_employee_money_advance` ";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data[0]['min'] ?? null;
}

