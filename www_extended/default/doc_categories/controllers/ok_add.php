<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$category = (isset($_POST["category"]) && $_POST["category"] != "") ? clean($_POST["category"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$category) {
    array_push($error, '$category is mandatory');
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

if (doc_categories_search_by_unique("id", "category", $category)) {
    array_push($error, 'category already exists in data base');
}


if (doc_categories_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = doc_categories_add(
            $category, $order_by, $status
    );

    header("Location: index.php?c=doc_categories&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


