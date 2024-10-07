<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Crea una ficha de paga 
 * desde una fecha hasta otra fecha 
 * 
 */
// desde el form
$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] != "" && $_POST["employee_id"] != "null" ) ? clean($_POST["employee_id"]) : null;
// la fecha de hr_employee_category > date_start
//$date_entry = (isset($_POST["date_entry"]) && $_POST["date_entry"] != "" && $_POST["date_entry"] != "null" ) ? clean($_POST["date_entry"]) : null;
$date_entry = ($date_entry) ?? hr_employee_category_search_by_unique('date_start', 'employee_id', $employee_id);
//
// la direccion mas reciente
//$address = (isset($_POST["address"]) && $_POST["address"] != "" && $_POST["address"] != "null" ) ? clean($_POST["address"]) : null;
//$address = ($address) ?? json_encode(addresses_delivery_by_contact_id($employee_id));
$address = ($address) ?? json_encode(addresses_billing_by_contact_id($employee_id));
//
// tabla empleados cargo
//$fonction = (isset($_POST["fonction"]) && $_POST["fonction"] != "" && $_POST["fonction"] != "null" ) ? clean($_POST["fonction"]) : null;
$fonction = ($fonction) ?? employees_field_by_contact_id('cargo', $employee_id);
//
// segun la tabla hr_employee_civil_status
//$civil_status = (isset($_POST["civil_status"]) && $_POST["civil_status"] != "" && $_POST["civil_status"] != "null" ) ? clean($_POST["civil_status"]) : null;
$civil_status = ($civil_status) ?? hr_civil_status_field_code('description', hr_employee_civil_status_field_employee_id('civil_status', $employee_id));

// la category en hr_employee_category
//$tax_system = (isset($_POST["tax_system"]) && $_POST["tax_system"] != "" && $_POST["tax_system"] != "null" ) ? clean($_POST["tax_system"]) : null;
$tax_system = ($tax_system) ?? hr_categories_field_code('description', hr_employee_category_field_employee_id('category_code', $employee_id));
//
// enviado atravez del formulario
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] != "" && $_POST["date_start"] != "null" ) ? clean($_POST["date_start"]) : null;
//
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] != "" && $_POST["date_end"] != "null" ) ? clean($_POST["date_end"]) : null;
//
// el salario que pertenece a este ano, y mes
//$salary_base = (isset($_POST["salary_base"]) && $_POST["salary_base"] != "" && $_POST["salary_base"] != "null" ) ? clean($_POST["salary_base"]) : null;
// si el salario es enviado desde el formulario, sino cojemos segun la fecha
$salary_base = ($salary_base) ?? hr_employee_salary_in_date($employee_id, $date_start)['month'];
//
// via el formulario
$value_round = (isset($_POST["value_round"]) && $_POST["value_round"] != "" ) ? clean($_POST["value_round"]) : 0;
//
// calculado al final
// esto viene de la tabla by_month
$to_pay = (isset($_POST["to_pay"]) && $_POST["to_pay"] != "" && $_POST["to_pay"] != "null" ) ? clean($_POST["to_pay"]) : 0;
$to_pay = hr_payroll_by_month_field_by('value', $employee_id, magia_dates_get_year_from_date($date_start), magia_dates_get_month_from_date($date_start), 'total_to_pay') ?? 0;
// account_number de la tabla banks
//
//
//$account_number = (isset($_POST["account_number"]) && $_POST["account_number"] != "" && $_POST["account_number"] != "null" ) ? clean($_POST["account_number"]) : null;
$account_number = ($account_number) ?? banks_get_account_number_for_invoices($employee_id);

$notes = (isset($_POST["notes"]) && $_POST["notes"] != "" && $_POST["notes"] != "null" ) ? clean($_POST["notes"]) : null;
////////////////////////////////////////////////////////////////////////////////
$extras_infos['type'] = '';
$extras_infos['ref'] = '';
$extras_infos['nationality'] = countries_field_country_code('countryName', hr_employee_nationality_search_principal_by_employee_id($employee_id));
//
$extras_infos['niss'] = directory_by_contact_name($employee_id, 'nationalNumber');
//
$family_dependents = hr_employee_family_dependents_resumen($employee_id);

$tax_charges = array(
    "Children" => array("n" => $family_dependents['Children']['n'], "h" => $family_dependents['Children']['h']),
    "Spouses" => array("n" => $family_dependents['Spouses']['n'], "h" => $family_dependents['Spouses']['h']),
    "OthersP65" => array("n" => $family_dependents['OthersP65']['n'], "h" => $family_dependents['OthersP65']['h']),
    "OthersM65" => array("n" => $family_dependents['OthersM65']['n'], "h" => $family_dependents['OthersM65']['h']),
);

$extras_infos['family_dependents'] = $tax_charges;

$extras = json_encode($extras_infos);
//
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : magia_uniqid();

$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : date('Y-m-d G:i:s');

$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;

$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;

$error = array();

#################################################################################
$total_hours_worked = hr_employee_worked_days_total_hours_worked_by_employee_period($employee_id, $date_start, $date_end);
$total_days_worked = hr_employee_worked_days_total_days_worked_by_employee_period($employee_id, $date_start, $date_end);
#################################################################################
#################################################################################
//vardump(
//        array(
//            '$employee_id' => $employee_id,
//            '$date_entry' => $date_entry,
//            '$address' => $address,
//            '$fonction' => $fonction,
//            '$salary_base' => $salary_base,
//            '$civil_status' => $civil_status,
//            '$tax_system' => $tax_system,
//            '$date_start' => $date_start,
//            '$date_end' => $date_end,
//            '$total_hours_worked' => $total_hours_worked,
//            '$total_days_worked' => $total_days_worked,
//            '$value_round' => $value_round,
//            '$to_pay' => $to_pay,
//            '$account_number' => $account_number,
//            '$notes' => $notes,
//            '$extras' => $extras,
//        )
//);
################################################################################
# REQUIRED
################################################################################
if (!$employee_id) {
    array_push($error, 'Employee id is mandatory');
}
if (!$fonction) {
    array_push($error, 'Fonction is mandatory');
}
//if (!$to_pay) {
//    array_push($error, 'To_pay is mandatory');
//}
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$date_registre) {
    array_push($error, 'Date registre is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!hr_payroll_is_employee_id($employee_id)) {
    array_push($error, 'Employee id format error');
}
if (!hr_payroll_is_fonction($fonction)) {
    array_push($error, 'Fonction format error');
}
if (!hr_payroll_is_to_pay($to_pay)) {
    array_push($error, 'To pay format error');
}
if (!hr_payroll_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!hr_payroll_is_date_registre($date_registre)) {
    array_push($error, 'Date registre format error');
}
if (!hr_payroll_is_order_by($order_by)) {
    array_push($error, 'Order by format error');
}
if (!hr_payroll_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( hr_payroll_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
//
//vardump($_REQUEST); 
//vardump($address); 
//
//die();

if (!$error) {


    hr_payroll_add(
            $employee_id, $date_entry, $address, $fonction, $salary_base, $civil_status, $tax_system, $date_start, $date_end, $value_round, $to_pay, $account_number, $notes, $extras, $code, $date_registre, $order_by, $status
    );

    $lastInsertId = hr_payroll_field_code('id', $code);

    ////////////////////////////////////////////////////////////////////////////



    for ($i = 0; $i <= $counter; $i++) {
        foreach (hr_payroll_items_list() as $key => $item) {
//        // Busco los valores por defecto hr_employee_payroll_items
//        // 
//        // insertar en la DB
//        // Codigo, año, mes y me regresa el resultado
//        $item_code = $item['code'];
//        $days = 1;
//        $quantity = 1;
//        $value = hr_employee_payroll_items_value_by_employee_id_code($employee_id, $item['code']) ?? 0;
//        $description = $item['description'];
//        $order_by = $item['order_by'];
//        $status = 1;


            $hr_payroll = new Payroll();
            $hr_payroll->setPayroll($lastInsertId);

            if ($item['code'] == 2110 || $item['code'] == 2120) {
                $line_days = hr_employee_worked_days_total_days_worked_by_employee_period($employee_id, $date_start, $date_end);
                $line_quantity = $line_days;
            } else {
                $line_days = null;
                $line_quantity = 1;
            }
            //
            //
            //
            $item_code = $item['code'];
            $in_out = $item['in_out'];
            $days = $line_days;
            $quantity = $line_quantity;
            $value = hr_payroll_lines_get_values($employee_id, $item['code'], $date_start);
            $description = $item['description'];
            $formula = $item['formula'];
            $order_by = $item['order_by'];
            $status = 1;

            hr_payroll_lines_add($lastInsertId, $item_code, $in_out, $days, $quantity, $value, $description, $formula, $order_by, $status);
        }

        // Tambien debo pone al dia el total a pagar en hr_payroll
        $total_to_pay = hr_payroll_lines_field_by_payroll_id_code('value', $id, '7001');

        hr_payroll_update_to_pay($id, $total_to_pay);
    }





    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll");
            break;

        case 2:
            header("Location: index.php?c=hr_payroll&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_payroll&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_payroll&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_payroll&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


