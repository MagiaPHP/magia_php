<?php

/**
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$project_id = (isset($_POST["project_id"])) ? clean($_POST["project_id"]) : false;

$error = array();

vardump($_POST);
################################################################################
# requerias
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$project_id) {
    array_push($error, '$project_id is mandatory');
}
################################################################################
# Formato
if (!invoices_is_id($invoice_id)) {
    array_push($error, '$invoice_id format error');
}
if (!projects_is_id($project_id)) {
    array_push($error, '$project_id format error');
}
################################################################################
# Condiciones
// si el proyecto existe 
if (!projects_field_id('id', $project_id)) {
    array_push($error, 'Project not exist');
}
// si el proyecto esta abierto 
if (projects_field_id('status', $project_id) != 1) { // debe estar abierto 
    array_push($error, 'The project has been open');
}
// si la factura existe
if (!invoices_field_id('id', $invoice_id)) {
    array_push($error, 'Invoices not exist..');
}
// si la factura no esta en otro proyecto 
if (projects_list_by_invoice($invoice_id)) {
    array_push($error, 'Invoices already in the project');
}

################################################################################
################################################################################

if (!$error) {

    projects_inout_add(
            //$project_id, $budget_id, $invoice_id, $expense_id, $order_by, $status
            $project_id, null, $invoice_id, null, 1, 1
            );

    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $invoice_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Invoice [ $invoice_id ] insert to project [ $project_id ] ";
    $doc_id = $invoice_id;
    $crud = "update";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
    ############################################################################
    ############################################################################      

    header("Location: index.php?c=invoices&a=details&id=$invoice_id#title");
} else {

    include view("home", "pageError");
}
 * 
 */
