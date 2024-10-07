<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$company_id = (isset($_REQUEST["company_id"]) && $_REQUEST["company_id"] != "" && $_REQUEST["company_id"] != "null" ) ? clean($_REQUEST["company_id"]) : false;
$client_number = (isset($_REQUEST["client_number"]) && $_REQUEST["client_number"] != "" && $_REQUEST["client_number"] != "null" ) ? clean($_REQUEST["client_number"]) : null;
$date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "" ) ? clean($_REQUEST["date"]) : date('Y-m-d h:m:s');
$discount = (isset($_REQUEST["discount"]) && $_REQUEST["discount"] != "" && $_REQUEST["discount"] != "null" ) ? clean($_REQUEST["discount"]) : null;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "" && $_REQUEST["order_by"] != "null" ) ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "" && $_REQUEST["status"] != "null" ) ? clean($_REQUEST["status"]) : 1;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
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
//if (providers_search_by_unique("id", "company_id", $company_id)) {
//    array_push($error, 'Company_id already exists in data base');
//}
//if( providers_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = providers_add(
            $company_id, $client_number, $date, $discount, $order_by, $status
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
            // ejemplo index.php?c=providers&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        case 6:
            header("Location: index.php?c=expenses&a=add#6");
            break;

        case 7:
            header("Location: index.php?c=expenses&a=add_from_pdf#7");
            break;

        case 8:
            header("Location: index.php?c=contacts&a=details&id=$company_id#8");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


