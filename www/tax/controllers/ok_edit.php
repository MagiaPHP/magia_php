<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] != "") ? clean($_REQUEST["name"]) : false;
$value = (isset($_REQUEST["value"]) && $_REQUEST["value"] != "") ? clean($_REQUEST["value"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$name) {
    array_push($error, 'Name is mandatory');
}
if (!$value) {
    array_push($error, 'Value is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!tax_is_name($name)) {
    array_push($error, 'Name format error');
}
if (!tax_is_value($value)) {
    array_push($error, 'Value format error');
}
if (!tax_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (tax_search_by_unique("id", "value", $value)) {
    array_push($error, 'Value already exists in data base');
}


//if( tax_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    tax_edit(
            $id, $name, $value, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tax");
            break;

        case 2:
            header("Location: index.php?c=tax&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=tax&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=tax&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=tax&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
