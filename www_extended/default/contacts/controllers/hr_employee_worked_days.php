<?php

if (!permissions_has_permission($u_rol, "hr_employee_worked_days", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$year = (isset($_REQUEST['year'])) ? clean($_REQUEST['year']) : date('Y');
$month = (isset($_REQUEST['month'])) ? clean($_REQUEST['month']) : date('m');

$edit_work_day = (isset($_REQUEST['edit_work_day'])) ? clean($_REQUEST['edit_work_day']) : false;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";

$error = array();
###############################################################################
# Requerido
if (!($id)) {
    array_push($error, 'id dont send');
}
//------------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, '$id format incorrect');
}
################################################################################
$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}

if (users_field_contact_id('rol', $id) == 'root' && users_field_contact_id('rol', $u_id) != 'root') {
    array_push($error, 'Root is hidden');
}

################################################################################
###############################################################################
// Condicional
// fecha fijada?

$config_hr_payroll_by_month_fix_date = _options_option('config_hr_payroll_by_month_fix_date');

$fix_date = (is_json($config_hr_payroll_by_month_fix_date)) ? json_decode($config_hr_payroll_by_month_fix_date, true) : [];

// si la fecha está fijada, los meses y año serán reemplazados
if (!empty($fix_date) && isset($fix_date['fix']) && $fix_date['fix']) {
    if (isset($fix_date['month'], $fix_date['year'])) {
        $month = $fix_date['month'];
        $year = $fix_date['year'];

        //    $from = magia_dates_first_month_day($month, $year);
        //    $to = magia_dates_last_month_day($month, $year);
    } else {
        // Manejar el caso cuando month o year no estén presentes
        // Ejemplo: throw new Exception('El mes o el año no están definidos en la configuración de fecha fija.');
    }
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

//    $permissions = permissions_search_by_rol(users_field_contact_id("rol", $id));
    ################################################################################
    $pagination = new Pagination($page, hr_employee_worked_days_search_by("employee_id", $id));
    // puede hacer falta
    $url = "index.php?c=hr_employee_worked_days&a=search&w=by_employee_id&employee_id=" . $id;
    $pagination->setUrl($url);
    $hr_employee_worked_days = hr_employee_worked_days_search_by("employee_id", $id, $pagination->getStart(), $pagination->getLimit());
    ################################################################################ 

    $employee = new Employee();
    $employee->setEmployee($u_owner_id, $id);

    include view("contacts", "page_hr_employee_worked_days");
    //
    //
    //
    //
    //
} else {

    include view("home", "pageError");
}
