<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$unites = (isset($_REQUEST["unites"]) && $_REQUEST["unites"] != "") ? clean($_REQUEST["unites"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$unites) {
    array_push($error, 'Unites is mandatory');
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
if (!services_unites_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!services_unites_is_unites($unites)) {
    array_push($error, 'Unites format error');
}
if (!services_unites_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!services_unites_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (services_unites_search_by_unique("id", "code", $code)) {
    array_push($error, 'Code already exists in data base');
}


//if( services_unites_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    services_unites_edit(
            $id, $code, $unites, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=services_unites");
            break;

        case 2:
            header("Location: index.php?c=services_unites&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=services_unites&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=services_unites&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=services_unites&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
