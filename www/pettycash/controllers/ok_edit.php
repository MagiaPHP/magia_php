<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "") ? clean($_REQUEST["date"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$total = (isset($_REQUEST["total"]) && $_REQUEST["total"] != "") ? clean($_REQUEST["total"]) : false;
$date_registre = (isset($_REQUEST["date_registre"]) && $_REQUEST["date_registre"] != "") ? clean($_REQUEST["date_registre"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$date) {
    array_push($error, 'Date is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
}
if (!$date_registre) {
    array_push($error, 'Date_registre is mandatory');
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
if (!pettycash_is_date($date)) {
    array_push($error, 'Date format error');
}
if (!pettycash_is_description($description)) {
    array_push($error, 'Description format error');
}
if (!pettycash_is_date_registre($date_registre)) {
    array_push($error, 'Date_registre format error');
}
if (!pettycash_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!pettycash_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( pettycash_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    pettycash_edit(
            $id, $date, $description, $total, $date_registre, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=pettycash");
            break;

        case 2:
            header("Location: index.php?c=pettycash&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=pettycash&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=pettycash&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=pettycash&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
