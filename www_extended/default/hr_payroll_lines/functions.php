<?php

function hr_payroll_lines_get_values($employee_id, $code, $date = null) {
    // si hay en valore por defecto lo cojo 
    // sino lo calculo 

    $val_by_default = hr_employee_payroll_items_default_value_by_employee_id_code($employee_id, $code);

    if ($val_by_default) {
        return $val_by_default;
    } else {
        return hr_payroll_lines_calculate_value_by_employee_id_code($employee_id, $code, $date) ?? 0;
    }
}

//
function hr_payroll_lines_calculate_value_by_employee_id_code($employee_id, $code, $date = null) {

    switch ($code) {
//        case '2100': // 2100 Total chéques-repas (dias por valor)
//            //       hr_employee_benefits_field_by_employee_id_code($hr_payroll->getEmployee_id(), 'meal_vouchers')
//            $value = hr_employee_benefits_field_by_employee_id_code($employee_id, 'meal_vouchers')['price'];
//            break;

        case '2110': // 2110 value_company_part
            $value = hr_employee_benefits_field_by_employee_id_code($employee_id, 'meal_vouchers')['value_company_part'];
            break;

        case '2120': // 2120 value_employee_part
            $value = hr_employee_benefits_field_by_employee_id_code($employee_id, 'meal_vouchers')['value_employee_part'];
            break;

        case '7001': // Empleado, año, mes, columna
            //$value = hr_employee_salary_in_date($employee_id, $date)['month']; 

            $value = hr_payroll_by_month_field_by('value', $employee_id, magia_dates_get_year_from_date($date), magia_dates_get_month_from_date($date), 'total_to_pay');

            break;

        default:
            $value = null;
            break;
    }


    return $value;
}

// SEARCH
function hr_payroll_lines_value_by_payroll_id_code($payroll_id, $code) {
    global $db;
    $data = null;
    $sql = "SELECT (`quantity` * `value`) as total        
    
    FROM `hr_payroll_lines`         
    
    WHERE `payroll_id` = :payroll_id AND code =:code";

    $query = $db->prepare($sql);
    $query->bindValue(':payroll_id', $payroll_id, PDO::PARAM_INT);
    $query->bindValue(':code', $code, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0] ?? null;
}

function hr_payroll_lines_field_payroll_id_code($field, $payroll_id, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT :field FROM `hr_payroll_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function hr_payroll_lines_field_by_payroll_id_code($field, $payroll_id, $code) {

    global $db;
    $data = null;
    
    $query = $db->prepare("SELECT $field FROM `hr_payroll_lines` WHERE `payroll_id`= :payroll_id AND `code` = :code");
    
    //$query->bindValue(':field',      $field,      PDO::PARAM_STR);
    $query->bindValue(':payroll_id', $payroll_id, PDO::PARAM_INT);
    $query->bindValue(':code',       $code,       PDO::PARAM_STR);
    
    $query->execute();
    $data = $query->fetch();
    return $data[0] ?? null;
    
}
