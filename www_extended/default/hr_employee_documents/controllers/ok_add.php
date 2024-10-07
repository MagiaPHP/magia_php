<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] != "" && $_POST["employee_id"] != "null" ) ? clean($_POST["employee_id"]) : null;
$document = (isset($_POST["document"]) && $_POST["document"] != "" && $_POST["document"] != "null" ) ? clean($_POST["document"]) : null;
$document_number = (isset($_POST["document_number"]) && $_POST["document_number"] != "" && $_POST["document_number"] != "null" ) ? clean($_POST["document_number"]) : null;
$date_delivery = (isset($_POST["date_delivery"]) && $_POST["date_delivery"] != "" && $_POST["date_delivery"] != "null" ) ? clean($_POST["date_delivery"]) : null;
$date_expiration = (isset($_POST["date_expiration"]) && $_POST["date_expiration"] != "" && $_POST["date_expiration"] != "null" ) ? clean($_POST["date_expiration"]) : null;
$follow = (isset($_POST["follow"]) && $_POST["follow"] != "" && $_POST["follow"] != "null" ) ? clean($_POST["follow"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
if ($follow && !$date_expiration) {
    array_push($error, 'If you want to track the document, you must set an expiration date for it');
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
if ($date_expiration && !hr_employee_documents_is_date_expiration($date_expiration)) {
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
################################################################################
if (!$error) {
    $lastInsertId = hr_employee_documents_add(
            $employee_id, $document, $document_number, $date_delivery, $date_expiration, $follow, $order_by, $status
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
            // ejemplo index.php?c=hr_employee_documents&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


