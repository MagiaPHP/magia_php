<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
// tuve que poner este acchico solo para poner cero por defecto en $follow
//
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$employee_id = (isset($_REQUEST["employee_id"]) && $_REQUEST["employee_id"] != "") ? clean($_REQUEST["employee_id"]) : false;
$document = (isset($_REQUEST["document"]) && $_REQUEST["document"] != "") ? clean($_REQUEST["document"]) : false;
$document_number = (isset($_REQUEST["document_number"]) && $_REQUEST["document_number"] != "") ? clean($_REQUEST["document_number"]) : false;
$date_delivery = (isset($_REQUEST["date_delivery"]) && $_REQUEST["date_delivery"] != "") ? clean($_REQUEST["date_delivery"]) : false;
$date_expiration = (isset($_REQUEST["date_expiration"]) && $_REQUEST["date_expiration"] != "") ? clean($_REQUEST["date_expiration"]) : false;
// solo puse el cero 
$follow = (isset($_REQUEST["follow"]) && $_REQUEST["follow"] != "") ? clean($_REQUEST["follow"]) : 0;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$employee_id) {
    array_push($error, 'Employee_id is mandatory');
}
if (!$document) {
    array_push($error, 'Document is mandatory');
}
if (!$document_number) {
    array_push($error, 'Document_number is mandatory');
}
if (!$date_delivery) {
    array_push($error, 'Date_delivery is mandatory');
}
if (!$date_expiration) {
    array_push($error, 'Date_expiration is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!hr_employee_documents_is_employee_id($employee_id)) {
    array_push($error, 'Employee_id format error');
}
if (!hr_employee_documents_is_document($document)) {
    array_push($error, 'Document format error');
}
if (!hr_employee_documents_is_document_number($document_number)) {
    array_push($error, 'Document_number format error');
}
if (!hr_employee_documents_is_date_delivery($date_delivery)) {
    array_push($error, 'Date_delivery format error');
}
if (!hr_employee_documents_is_date_expiration($date_expiration)) {
    array_push($error, 'Date_expiration format error');
}
if (!hr_employee_documents_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!hr_employee_documents_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( hr_employee_documents_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    hr_employee_documents_edit(
            $id, $employee_id, $document, $document_number, $date_delivery, $date_expiration, $follow, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_documents");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_documents&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_documents&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_documents&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_documents&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
