<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$name = (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["name"] != "null" ) ? clean($_POST["name"]) : '';
$value = (isset($_POST["value"]) && $_POST["value"] != "" ) ? clean($_POST["value"]) : '';
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" && $_POST["order_by"] != "null" ) ? clean($_POST["order_by"]) : '';
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : '';
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = tax_add(
            $name, $value, $order_by, $status
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
            // ejemplo index.php?c=tax&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


