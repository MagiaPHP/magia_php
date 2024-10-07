<?php

// SEARCH
function holidays_search_by_year($year, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT 
        `id`,  
        `country`,  
        `category_code`,  
        `date`,  
        `description`,  
        `order_by`,  
        `status` 
        
        FROM `holidays` 
    
    WHERE YEAR(`date`) = :year 
    
    ORDER BY `date` , `id` DESC
    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function holidays_search_by_year_month($year, $month, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT 
        `id`,  
        `country`,  
        `category_code`,  
        `date`,  
        `description`,  
        `order_by`,  
        `status` 
        
        FROM `holidays` 
    
    WHERE YEAR(`date`) = :year AND  MONTH(`date`) = :month
    
    ORDER BY `date` , `id` DESC
    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_STR);
    $query->bindValue(':month', $month, PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
