<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$company_id = (isset($_REQUEST["company_id"]) && $_REQUEST["company_id"] != "") ? clean($_REQUEST["company_id"]) : false;
$client_number = (isset($_REQUEST["client_number"]) && $_REQUEST["client_number"] != "") ? clean($_REQUEST["client_number"]) : false;
$date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "") ? clean($_REQUEST["date"]) : false;
$discount = (isset($_REQUEST["discount"]) && $_REQUEST["discount"] != "") ? clean($_REQUEST["discount"]) : false;
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
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!providers_is_date($date)) {
    array_push($error, 'Date format error');
}
if (!providers_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (providers_search_by_unique("id", "company_id", $company_id)) {
    array_push($error, 'Company_id already exists in data base');
}


//if( providers_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    providers_edit(
            $id, $company_id, $client_number, $date, $discount, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=providers");
            break;

        case 2:
            header("Location: index.php?c=providers&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=providers&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=providers&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=providers&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
