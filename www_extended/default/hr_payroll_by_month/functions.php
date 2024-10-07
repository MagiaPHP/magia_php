<?php

function hr_payroll_by_month_field_by($field, $employee_id, $year, $month, $column) {
    global $db;

    $data = null;

    $sql = "SELECT *

    FROM `hr_payroll_by_month` 
    
    WHERE `employee_id` = :employee_id AND `year` = :year AND `month` = :month AND `column` = :column    
    
 ";

    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', (int) $employee_id, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':column', $column, PDO::PARAM_STR);
    //$query->bindValue(':field', $field, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data[$field] ?? 0;
}

function hr_payroll_by_month_list_by($year, $month) {
    global $db;

    $data = null;

    $sql = "SELECT *

    FROM `hr_payroll_by_month` 
    
    WHERE `year` = :year AND `month` = :month 
    
 ";

    $query = $db->prepare($sql);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data ?? null;
}

/**
 * Update formule all same year and month
 * @global type $db
 * @param type $year
 * @param type $month
 * @param type $column
 * @param type $formule
 */
function hr_payroll_by_month_update_formule_all($year, $month, $column, $formule) {

    global $db;

    $req = $db->prepare(
            "UPDATE `hr_payroll_by_month` 
            SET `formule`=:formule 
            WHERE `year` =:year AND `month` =:month AND `column`=:column ");

    $req->execute(array(
        "year" => $year,
        "month" => $month,
        "column" => $column,
        "formule" => $formule,
    ));
}

function hr_payroll_by_month_update_formule_by($employee_id, $year, $month, $column, $formule) {

    global $db;

    $req = $db->prepare(
            "UPDATE `hr_payroll_by_month` 
            SET `formule`=:formule 
            WHERE `employee_id` =:employee_id AND `year` =:year AND `month` =:month AND `column`=:column ");

    $req->execute(array(
        "employee_id" => $employee_id,
        "year" => $year,
        "month" => $month,
        "column" => $column,
        "formule" => $formule,
    ));
}

function hr_payroll_by_month_update_value_by($employee_id, $year, $month, $column, $value) {

    global $db;

    $req = $db->prepare(
            "UPDATE `hr_payroll_by_month` 
            SET `value`=:value 
            WHERE `employee_id` =:employee_id AND `year` =:year AND `month` =:month AND `column`=:column ");

    $req->execute(array(
        "employee_id" => $employee_id,
        "year" => $year,
        "month" => $month,
        "column" => $column,
        "value" => $value,
    ));
}

/**
function hr_payroll_by_month_details_by_payroll_id_column($payroll_id, $column) {
    global $db;
    $query = $db->prepare(
            "
    SELECT `id`,  `payroll_id`,  `column`,  `value`,  `formula`,  `notes`,  `code`,  `date_registre`,  `order_by`,  `status`   
    FROM `hr_payroll_by_month` 
    WHERE `payroll_id` = :payroll_id AND `column` = :column   
    ");

    $query->bindValue(':payroll_id', (int) $payroll_id, PDO::PARAM_INT);
    $query->bindValue(':column', $column, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function hr_payroll_by_month_get_formula_by_payroll_id_column($payroll_id, $column) {
    global $db;

    $data = null;

    $sql = "SELECT `formula`

    FROM `hr_payroll_by_month` 
    
    WHERE `payroll_id` = :payroll_id AND `column` = :column            
 ";

    $query = $db->prepare($sql);
    $query->bindValue(':payroll_id', (int) $payroll_id, PDO::PARAM_INT);
    $query->bindValue(':column', $column, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data[0] ?? false;
}

function hr_payroll_by_month_push_formula_by_payroll_id_column($payroll_id, $column, $new_data) {
    // si existe actualiza
    if (hr_payroll_by_month_details_by_payroll_id_column($payroll_id, $column)) {

        hr_payroll_by_month_update_formula_by_payroll_id_column($payroll_id, $column, $new_data);
        // sino la crea
    } else {
        hr_payroll_by_month_add($payroll_id, $column, null, $new_data, '', magia_uniqid(), date('Y-m-d'), 1, 1);
    }
}

function hr_payroll_by_month_update_formula_by_payroll_id_column($payroll_id, $column, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `formula`=:new_data WHERE `payroll_id` =:payroll_id AND `column` =:column ");
    $req->execute(array(
        "payroll_id" => $payroll_id,
        "column" => $column,
        "new_data" => $new_data,
    ));
}

function hr_payroll_by_month_update_value_by_payroll_id_column($payroll_id, $column, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `value`=:new_data WHERE `payroll_id` =:payroll_id AND `column` =:column ");
    $req->execute(array(
        "payroll_id" => $payroll_id,
        "column" => $column,
        "new_data" => $new_data,
    ));
}
 * 
 */
