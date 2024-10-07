<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$code) {
    array_push($error, '$code is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD

if (budget_status_search_by_unique("id", "code", $code)) {
    array_push($error, 'code already exists in data base');
}



if (budget_status_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = budget_status_add(
            $code, $status
    );

    header("Location: index.php?c=budget_status&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/budget_status/views/index.php";   
include view("budget_status", "index");
