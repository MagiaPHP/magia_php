<?php

// SEARCH
function hr_employee_worked_days_formule_get_value_by_employee_month_year_column($employee_id, $month, $year, $column) {
    global $db;
    $data = null;
    $sql = "SELECT `value`    
        FROM `hr_employee_worked_days_formule` 
        WHERE `employee_id` = :employee_id AND  `month` = :month AND `year` = :year AND `column` = :column                
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':column', $column, PDO::PARAM_STR);

    $query->execute();
    $data = $query->fetch();
    return $data[0] ?? null;
}

// SEARCH
function hr_employee_worked_days_formule_search_by_employee_month_year_column($employee_id, $month, $year, $column) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `employee_id`,  `month`,  `year`,  `column`,  `value`,  `formule`,  `notes`,  `code`,  `date_registre`,  `order_by`,  `status`    
        FROM `hr_employee_worked_days_formule` 
        WHERE `employee_id` = :employee_id AND  `month` = :month AND `year` = :year AND `column` = :column
        ORDER BY `order_by` , `id` DESC
        
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':column', $column, PDO::PARAM_STR);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function hr_employee_worked_days_formule_add_by_employee_month_year_column($employee_id, $month, $year, $column, $value, $formule = null, $notes = null, $code = null, $date_registre = null, $order_by = null, $status = null) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_employee_worked_days_formule` ( `id` ,   `employee_id` ,   `month` ,   `year` ,   `column` ,   `value` ,   `formule` ,   `notes` ,   `code` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :employee_id ,  :month ,  :year ,  :column ,  :value ,  :formule ,  :notes ,  :code ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "employee_id" => $employee_id,
        "month" => $month,
        "year" => $year,
        "column" => $column,
        "value" => $value,
        "formule" => $formule,
        "notes" => $notes,
        "code" => $code,
        "date_registre" => date('Y-m-d'),
        "order_by" => $order_by,
        "status" => $status
            )
    );
}

function hr_employee_worked_days_formule_update_value_by_employee_month_year_column($employee_id, $month, $year, $column, $value = null) {
    global $db;
    $req = $db->prepare("
            UPDATE `hr_employee_worked_days_formule` 
            SET 
            `value`= :value      
             WHERE 
            `employee_id` =:employee_id AND 
            `month` = :month AND 
            `year` = :year AND 
            `column` = :column
            
");
    $req->execute(array(
        "employee_id" => $employee_id,
        "month" => $month,
        "year" => $year,
        "column" => $column,
        "value" => $value,
    ));
}

function hr_employee_worked_days_formule_update_formule_by_employee_month_year_column($employee_id, $month, $year, $column, $formule = null) {
    global $db;
    $req = $db->prepare("
            UPDATE `hr_employee_worked_days_formule` 
            SET 
            `formule`= :formule      
             WHERE 
            `employee_id` =:employee_id AND 
            `month` = :month AND 
            `year` = :year AND 
            `column` = :column
            
");
    $req->execute(array(
        "employee_id" => $employee_id,
        "month" => $month,
        "year" => $year,
        "column" => $column,
        "formule" => $formule,
    ));
}

////
function hr_employee_worked_days_formule_get_field_by_employee_month_year_column($field, $employee_id, $month, $year, $column) {
    global $db;

    $data = null;

    $sql = "SELECT :field

    FROM `hr_employee_worked_days_formule` 
    
    WHERE `employee_id` = :employee_id AND `month` =:month AND `year` = :year AND `column` = :column
    
 ";

    $query = $db->prepare($sql);
    $query->bindValue(':field', $field, PDO::PARAM_STR);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':column', $column, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data[0] ?? null;
}

function hr_employee_worked_days_formule_get_formule_by_employee_month_year_column($employee_id, $month, $year, $column) {
    global $db;

    $data = null;

    $sql = "SELECT `formule`

    FROM `hr_employee_worked_days_formule` 
    
    WHERE `employee_id` = :employee_id AND `month` =:month AND `year` = :year AND `column` = :column
 ";

    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':column', $column, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data[0] ?? null;
}

/**
 * Actualiza el valor
 * @param type $employee_id
 * @param type $month
 * @param type $year
 * @param type $column
 * @param type $value
 */
function hr_employee_worked_days_formule_push_value_by($employee_id, $month, $year, $column, $value) {

    if (hr_employee_worked_days_formule_search_by_employee_month_year_column($employee_id, $month, $year, $column)) {

        hr_employee_worked_days_formule_update_value_by_employee_month_year_column($employee_id, $month, $year, $column, $value);
    } else {

        hr_employee_worked_days_formule_add_by_employee_month_year_column($employee_id, $month, $year, $column, $value, '', '', magia_uniqid(), date('Y-m-d'), 1, 1);
    }
}

//
//
//
//
//
/**
 * Actualiza la formule
 * @param type $employee_id
 * @param type $month
 * @param type $year
 * @param type $column
 * @param type $value
 */
function hr_employee_worked_days_formule_push_formule_by($employee_id, $month, $year, $column, $formule) {

    if (hr_employee_worked_days_formule_search_by_employee_month_year_column($employee_id, $month, $year, $column)) {

        hr_employee_worked_days_formule_update_formule_by_employee_month_year_column($employee_id, $month, $year, $column, $formule);
    } else {

        hr_employee_worked_days_formule_add_by_employee_month_year_column($employee_id, $month, $year, $column, $value, $formule, '', magia_uniqid(), date('Y-m-d'), 1, 1);
        //hr_employee_worked_days_formule_add_by_employee_month_year_column($employee_id, $month, $year, $column, null, $formule); 
        //hr_employee_worked_days_formule_add_by_employee_month_year_column($employee_id, $month, $year, $column, $value, '', '', magia_uniqid(), date('Y-m-d'), 1, 1);
    }
}
