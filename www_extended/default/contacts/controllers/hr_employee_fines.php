<?php

if (!permissions_has_permission($u_rol, "hr_employee_fines", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$from = (isset($_REQUEST['from']) && $_REQUEST['from'] !== '') ? clean($_REQUEST['from']) : magia_dates_first_month_day();

$to = (isset($_REQUEST['to']) && $_REQUEST['to'] !== '') ? clean($_REQUEST['to']) : magia_dates_last_month_day();

$category_code = (isset($_REQUEST['category_code'])) ? clean($_REQUEST['category_code']) : 'all';

//$year = (isset($_REQUEST['year'])) ? clean($_REQUEST['year']) : date('Y');
//$month = (isset($_REQUEST['month'])) ? clean($_REQUEST['month']) : date('m');
//$edit_work_day = (isset($_REQUEST['edit_work_day'])) ? clean($_REQUEST['edit_work_day']) : false;

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


    $hr_employee_fines = hr_employee_fines_search_by_employee_from_to_category($id, $from, $to, $category_code);

    $employee = new Employee();
    $employee->setEmployee($u_owner_id, $id);

    include view("contacts", "page_hr_employee_fines");

    //
} else {

    include view("home", "pageError");
}
