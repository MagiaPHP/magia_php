<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$code = (isset($_POST["code"]) && $_POST["code"] != "") ? clean($_POST["code"]) : false;
$name = (isset($_POST["name"]) && $_POST["name"] != "") ? clean($_POST["name"]) : false;
$price = (isset($_POST["price"]) && $_POST["price"] != "") ? clean($_POST["price"]) : false;
$tax = (isset($_POST["tax"]) && $_POST["tax"] != "") ? clean($_POST["tax"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$code) {
    array_push($error, '$code is mandatory');
}
if (!$name) {
    array_push($error, '$name is mandatory');
}
if (!$price) {
    array_push($error, '$price is mandatory');
}
if (!$tax) {
    array_push($error, '$tax is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
################################################################################
//
###############################################################################
# CONDICIONAL
################################################################################

if (transport_search_by_unique("id", "code", $code)) {
    array_push($error, 'code already exists in data base');
}


if (transport_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = transport_add(
            $code, $name, $price, $tax, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=transport&a=details&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=transport");
            break;
    }
} else {

    include view("home", "pageError");
}


