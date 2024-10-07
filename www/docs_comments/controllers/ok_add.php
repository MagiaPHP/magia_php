<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$controller = (isset($_POST["controller"]) && $_POST["controller"] != "") ? clean($_POST["controller"]) : false;
$comments = (isset($_POST["comments"]) && $_POST["comments"] != "") ? clean($_POST["comments"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$controller) {
    array_push($error, '$controller is mandatory');
}
if (!$comments) {
    array_push($error, '$comments is mandatory');
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

if (docs_comments_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = docs_comments_add(
            $controller, $comments, $order_by, $status
    );

    header("Location: index.php?c=docs_comments&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


