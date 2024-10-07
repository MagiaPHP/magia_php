<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Magia_PHP 0.0.1
 * Factuz.com
 * Robinson Coello 
 * www.coello.be
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function hr_payroll_max_id() {
    global $db;
    $req = $db->prepare("SELECT max(id) FROM hr_payroll ORDER BY id DESC LIMIT 1  ");
    $req->execute(array());
    $data = $req->fetch();
    return $data[0];
}

function hr_payroll_list_full($start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT 
                `id`, 
                `employee_id`,  
                `date_entry`,  
                `address`,  
                `fonction`,  
                `salary_base`,  
                `civil_status`,  
                `tax_system`, 
                MONTH(`date_start`) as month,                
                YEAR(`date_start`) as year,
                `date_start`,  
                `date_end`,  
                `value_round`,  
                `to_pay`,  
                `account_number`,  
                `notes`,  
                `extras`,  
                `code`,  
                `date_registre`,  
                `order_by`,  
                `status`   
        
    FROM `hr_payroll` ORDER BY `order_by` , date_start DESC Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//                 MONTH(`date_start`) as month,
// SEARCH
function hr_payroll_search_by_employee_year($employe_id, $year, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT 
                `id`, 
                `employee_id`,  
                `date_entry`,  
                `address`,  
                `fonction`,  
                `salary_base`,  
                `civil_status`,  
                `tax_system`, 
                MONTH(`date_start`) as month,
                YEAR(`date_start`) as year,
                `date_start`,  
                `date_end`,  
                `value_round`,  
                `to_pay`,  
                `account_number`,  
                `notes`,  
                `extras`,  
                `code`,  
                `date_registre`,  
                `order_by`,  
                `status`     
                FROM `hr_payroll` 
                
    WHERE `employee_id` = :employee_id AND YEAR(`date_start`) = :year
        
    ORDER BY `date_start` , `id` DESC
    
    Limit  :limit OFFSET :start
        
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employe_id, PDO::PARAM_INT);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function hr_payroll_search_by_employee_year_month($employe_id, $year, $month, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT 
                `id`, 
                `employee_id`,  
                `date_entry`,  
                `address`,  
                `fonction`,  
                `salary_base`,  
                `civil_status`,  
                `tax_system`, 
                    MONTH(`date_start`) as month,
                    YEAR(`date_start`) as year,
                `date_start`,  
                `date_end`,  
                `value_round`,  
                `to_pay`,  
                `account_number`,  
                `notes`,  
                `extras`,  
                `code`,  
                `date_registre`,  
                `order_by`,  
                `status`     
                FROM `hr_payroll` 
                
    WHERE `employee_id` = :employee_id AND YEAR(`date_start`) = :year AND MONTH(`date_start`) = :month
        
    ORDER BY `date_start` , `id` DESC
    
    Limit  :limit OFFSET :start
        
";
    $query = $db->prepare($sql);
    $query->bindValue(':employee_id', $employe_id, PDO::PARAM_INT);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function hr_payroll_search_by_year_month($year, $month, $start = 0, $limit = 999) {
    global $db;

    $data = null;

    $sql = "SELECT 
                `id`,  
                `employee_id`,                  
                 YEAR(`date_start`) as year,
                 MONTH(`date_start`) as month,
                `date_start`,  
                `date_end`,  
                `to_pay`,  
                `account_number`,  
                `notes`,  
                `order_by`,  
                `status`    
                FROM `hr_payroll` 
                
    WHERE 
    
    YEAR(`date_start`) = :year 
    
    AND MONTH(`date_start`) = :month 
        
    ORDER BY `date_start` , `id` DESC
    
    Limit  :limit OFFSET :start
        
";
    $query = $db->prepare($sql);

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function hr_payroll_full($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `employee_id`,  
            MONTH(`date_start`) as month,                
            `date_start`,  
            `date_end`,  
            `to_pay`,  
            `account_number`,  
            `notes`,  
            `order_by`,  
            `status`   

FROM `hr_payroll` 

ORDER BY `order_by` , `id` DESC  
    
Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//// SEARCH
//function hr_payroll_lines_search_by($field, $txt, $start = 0, $limit = 999) {
//    global $db;
//    $data = null;
//    $sql = "SELECT `id`,  `payroll_id`,  `code`,  `days`,  `quantity`,  `value`,  `description`,  `order_by`,  `status`    FROM `hr_payroll_lines` 
//    WHERE `$field` = '$txt' 
//    ORDER BY `order_by`, id
//    Limit  $limit OFFSET $start
//";
//    $query = $db->prepare($sql);
////    $query->bindValue(':field', "field", PDO::PARAM_STR);
////    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
////    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
////    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
//    $query->execute();
//    $data = $query->fetchall();
//    return $data;
//}
//

function hr_payroll_item_estras_formated_html($json) {
    $extras_html = null;
// Extras
    if (isset($json)) {
        $extras = json_decode($json, true);
        $extras_html = _tr('type') . ': ' . $extras['type'] . '<br>';
        $extras_html .= _tr('ref') . ': ' . $extras['ref'] . '<br>';
        $extras_html .= _tr('niss') . ': ' . $extras['niss'] . '<br>';
        $extras_html .= _tr('Children normal') . ': ' . $extras['family_dependents']['Children']['n'] . '<br>';
        $extras_html .= _tr('Children handicap') . ': ' . $extras['family_dependents']['Children']['h'] . '<br>';
        $extras_html .= _tr('Spouses normal') . ': ' . $extras['family_dependents']['Spouses']['n'] . '<br>';
        $extras_html .= _tr('Spouses handicap') . ': ' . $extras['family_dependents']['Spouses']['h'] . '<br>';
        $extras_html .= _tr('Others P 65 normal') . ': ' . $extras['family_dependents']['OthersP65']['n'] . '<br>';
        $extras_html .= _tr('Others P 65 handicap') . ': ' . $extras['family_dependents']['OthersP65']['h'] . '<br>';
        $extras_html .= _tr('Others M 65') . ': ' . $extras['family_dependents']['OthersM65']['n'] . '<br>';
        $extras_html .= _tr('Others M 65 handicap') . ': ' . $extras['family_dependents']['OthersP65']['h'] . '<br>';
        $extras_html .= '';
    }

    return $extras_html;
}


function hr_payroll_min_year() {
    global $db;
    $data = null;
    $sql = "SELECT MIN(YEAR(`date_start`)) as min FROM `hr_payroll` ";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data[0]['min'] ?? null;
}
