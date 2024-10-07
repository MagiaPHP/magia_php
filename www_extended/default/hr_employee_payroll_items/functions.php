<?php

function hr_employee_payroll_items_list_by_employee_code($employee_id, $code, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `employee_id`,  `code`,  `value`,  `order_by`,  `status`   
    
    FROM `hr_employee_payroll_items` 
    
    WHERE `employee_id` = :employee_id AND `code` = :code
    
    ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':code', (int) $code, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function hr_employee_payroll_items_list_not_used_by($field, $col, $value, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT *
    
    FROM `hr_employee_payroll_items` 
    
    WHERE `:col` = :value 
    
    ORDER BY id   Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);

//    $query->bindValue(':field', $field, PDO::PARAM_STR);
    $query->bindValue(':col', $col, PDO::PARAM_STR);
    $query->bindValue(':value', $value, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function hr_employee_payroll_items_default_value_by_employee_id_code($employee_id, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `value` FROM `hr_employee_payroll_items` WHERE   `employee_id` = :employee_id AND `code` = :code ");
    $req->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $req->bindValue(':code', (int) $code, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    return $data[0] ?? 0;
}

function hr_payroll_items_without_formula($start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `code`,  `description`,  `formula`,  `order_by`,  `status`   
    
    FROM `hr_payroll_items` 
    
    WHERE `formula` IS NULL OR `formula` = ''
    
    ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function hr_payroll_items_without_formula_not_used_by($employe_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `code`,  `description`,  `formula`,  `order_by`,  `status`   
    
    FROM `hr_payroll_items` 
    
    WHERE (`formula` IS NULL OR `formula` = '') AND `code` NOT IN (SELECT code FROM hr_employee_payroll_items WHERE employee_id = :employe_id)
    
    ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':employe_id', (int) $employe_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function hr_employee_payroll_items_update_value_by($employee_id, $code, $value) {
    global $db;
    $req = $db->prepare("            
            UPDATE `hr_employee_payroll_items`                
            SET  `value` = :value        
            WHERE `employee_id` = :employee_id AND `code` =:code        
        ");
    $req->execute(array(
        "employee_id" => $employee_id,
        "code" => $code,
        "value" => $value
    ));
}

function hr_employee_payroll_items_push_value_by($employee_id, $code, $value) {
    //
    if (hr_employee_payroll_items_by($employee_id, $code)) {
        hr_employee_payroll_items_update_value_by($employee_id, $code, $value);
    } else {
        hr_employee_payroll_items_add($employee_id, $code, $value, 1, 1);
    }
}

function hr_employee_payroll_items_by($employee_id, $code) {
    global $db;
    $data = null;
    $sql = "SELECT *   
    FROM `hr_employee_payroll_items` WHERE `employee_id` = :employee_id AND `code` = :code  ";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':code', (int) $code, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
