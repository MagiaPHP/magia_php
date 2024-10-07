<?php

if (!permissions_has_permission($u_rol, "hr_employee_worked_days", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$year = (isset($_REQUEST['year'])) ? clean($_REQUEST['year']) : date('Y');
$month = (isset($_REQUEST['month'])) ? clean($_REQUEST['month']) : date('m');

$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

$lang = (isset($_REQUEST["lang"]) && $_REQUEST["lang"] != "" ) ? clean($_REQUEST["lang"]) : 'en_GB';
$way = (isset($_REQUEST["way"]) && $_REQUEST["way"] != "" ) ? clean($_REQUEST["way"]) : 'web';

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

    include view("hr_employee_worked_days", "export_pdf");
    //
    //
    //
    //
    //
} else {

    include view("home", "pageError");
}
