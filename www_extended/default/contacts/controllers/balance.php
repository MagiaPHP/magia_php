<?php

if (!permissions_has_permission($u_rol, "balance", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
$status = (isset($_REQUEST['status'])) ? clean($_REQUEST['status']) : false;
$year = (isset($_REQUEST['year'])) ? clean($_REQUEST['year']) : date('Y');

$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}

if (!is_id($id)) {
    array_push($error, 'id format error send');
}

if ($e) {
    array_push($error, "$e");
}



$contact = contacts_details($id);
//$company = new Company();
//$company->setCompany($id);

if (!$contact) {
    array_push($error, "contact not exist");
}


//// todas
//$business_situation = balance_business_situation_client_id($id);
//
//// entradas
//$business_situation_in = balance_business_situation_client_id_in($id);
//
//// salidas
//$business_situation_out = balance_business_situation_client_id_out($id);
//$invoices = invoices_search_by_client_id($id);
//$balance_list = balance_all_transactions_by_client_id_year($id);
//$balance_list = balance_search_by_payement_direct_by_client_id($id);
//$balance_list = balance_payments_received_by_client_id_year($id, $year);
//$balance_list = balance_all_transactions_by_client_id_year($id, $year);
//$balance_payments_received_by_client_id_year = balance_payments_received_by_client_id_year($id, $year);
//$balance = balance_all_transactions_by_client_id_year($id, $year);
##################################################################################
if (!$error) {

    $company = new Company();
    $company->setCompany($id);

//
//    ################################################################################
//    $pagination = new Pagination($page, balance_all_transactions_by_client_id_year($id, $year));
//// puede hacer falta
//    $pagination->setUrl("index.php?c=contacts&a=balance&id=$id");
//    $balance = balance_all_transactions_by_client_id_year($id, $year, $pagination->getStart(), $pagination->getLimit());
//################################################################################




    include view("contacts", "page_balance");
} else {

    include view("home", "pageError");
}





