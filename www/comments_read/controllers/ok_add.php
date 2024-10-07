<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$order_id = (isset($_POST["order_id"]) && $_POST["order_id"] != "") ? clean($_POST["order_id"]) : false;
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "") ? clean($_POST["contact_id"]) : false;
$date_read = (isset($_POST["date_read"]) && $_POST["date_read"] != "") ? clean($_POST["date_read"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$order_id) {
    array_push($error, '$order_id is mandatory');
}
if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}
if (!$date_read) {
    array_push($error, '$date_read is mandatory');
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

if (comments_read_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = comments_read_add(
            $order_id, $contact_id, $date_read, $order_by, $status
    );

    header("Location: index.php?c=comments_read&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


