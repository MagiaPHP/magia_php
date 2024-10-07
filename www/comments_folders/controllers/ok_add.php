<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$name = (isset($_POST["name"]) && $_POST["name"] != "") ? clean($_POST["name"]) : false;
// lo que se
//$label = (isset($_POST["label"]) && $_POST["label"] != "") ? clean($_POST["label"]) : false;
$label = $name;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "") ? clean($_POST["redi"]) : 1;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$name) {
    array_push($error, '$name is mandatory');
}
if (!$label) {
    array_push($error, '$label is mandatory');
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

if (comments_folders_search_by_unique("id", "name", $name)) {
    array_push($error, 'name already exists in data base');
}


if (comments_folders_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $lastInsertId = comments_folders_add(
            $name, $label, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=comments_folders&a=details&id=$lastInsertId");
            break;

        case 2:
            header("Location: index.php?c=orders&a=comments_by_order");
            break;

        default:
            header("Location: index.php?c=comments_folders&a=details&id=$lastInsertId");
            break;
    }

    //
    //
} else {

    include view("home", "pageError");
}


