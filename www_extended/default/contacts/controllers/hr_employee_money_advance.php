<?php

if (!permissions_has_permission($u_rol, "hr_employee_money_advance", "read")) {
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
////////////////////////////////////////////////////////////////////////////////
if (!($id)) {
    array_push($error, 'id dont send');
}
//------------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, '$id format incorrect');
}


$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}

if (users_field_contact_id('rol', $id) == 'root' && users_field_contact_id('rol', $u_id) != 'root') {
    array_push($error, 'Root is hidden');
}

################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $hr_employee_money_advance = hr_employee_money_advance_search_by_employee_year_month($id, $year, $month);

    $employee = new Employee();
    $employee->setEmployee($u_owner_id, $id);

    include view("contacts", "page_hr_employee_money_advance");
    //
    //
    //
    //
    //
    //
    //
    //
    //
} else {

    include view("home", "pageError");
}
