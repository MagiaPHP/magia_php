<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$country = (isset($_REQUEST["country"]) && $_REQUEST["country"] != "") ? clean($_REQUEST["country"]) : false;
$tax = (isset($_REQUEST["tax"]) && $_REQUEST["tax"] != "") ? clean($_REQUEST["tax"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$country) {
    array_push($error, 'Country is mandatory');
}
//if (!$tax) {
//    array_push($error, 'Tax is mandatory');
//}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!country_tax_is_country($country)) {
    array_push($error, 'Country format error');
}
if (!country_tax_is_tax($tax)) {
    array_push($error, 'Tax format error');
}
if (!country_tax_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!country_tax_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( country_tax_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    country_tax_edit(
            $id, $country, $tax, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=country_tax");
            break;

        case 2:
            header("Location: index.php?c=country_tax&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=country_tax&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=country_tax&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=country_tax&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
