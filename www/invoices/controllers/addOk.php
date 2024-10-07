<?php

/*
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : false;
$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : false;
$seller_id = (isset($_POST["seller_id"])) ? clean($_POST["seller_id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$total = (isset($_POST["total"])) ? clean($_POST["total"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$advance = (isset($_POST["advance"])) ? clean($_POST["advance"]) : false;
$balance = (isset($_POST["balance"])) ? clean($_POST["balance"]) : false;
$comments = (isset($_POST["comments"])) ? clean($_POST["comments"]) : false;
$comments_private = (isset($_POST["comments_private"])) ? clean($_POST["comments_private"]) : false;
$r1 = (isset($_POST["r1"])) ? clean($_POST["r1"]) : false;
$r2 = (isset($_POST["r2"])) ? clean($_POST["r2"]) : false;
$r3 = (isset($_POST["r3"])) ? clean($_POST["r3"]) : false;
$fc = (isset($_POST["fc"])) ? clean($_POST["fc"]) : false;
$date_update = (isset($_POST["date_update"])) ? clean($_POST["date_update"]) : false;
$days = (isset($_POST["days"])) ? clean($_POST["days"]) : false;
$ce = (isset($_POST["ce"])) ? clean($_POST["ce"]) : false;
$key = (isset($_POST["key"])) ? clean($_POST["key"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;




$error = array();




if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
if (!$credit_note_id) {
    array_push($error, '$credit_note_id is mandatory');
}
if (!$client_id) {
    array_push($error, '$client_id is mandatory');
}
if (!$seller_id) {
    array_push($error, '$seller_id is mandatory');
}
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$date_registre) {
    array_push($error, '$date_registre is mandatory');
}
if (!$total) {
    array_push($error, '$total is mandatory');
}
if (!$tax) {
    array_push($error, '$tax is mandatory');
}
if (!$advance) {
    array_push($error, '$advance is mandatory');
}
if (!$balance) {
    array_push($error, '$balance is mandatory');
}
if (!$comments) {
    array_push($error, '$comments is mandatory');
}
if (!$comments_private) {
    array_push($error, '$comments_private is mandatory');
}
if (!$r1) {
    array_push($error, '$r1 is mandatory');
}
if (!$r2) {
    array_push($error, '$r2 is mandatory');
}
if (!$r3) {
    array_push($error, '$r3 is mandatory');
}
if (!$fc) {
    array_push($error, '$fc is mandatory');
}
if (!$date_update) {
    array_push($error, '$date_update is mandatory');
}
if (!$days) {
    array_push($error, '$days is mandatory');
}
if (!$ce) {
    array_push($error, '$ce is mandatory');
}
if (!$key) {
    array_push($error, '$key is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (invoices_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = invoices_add(
            $budget_id, $credit_note_id, $client_id, $seller_id, $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status
    );

    header("Location: index.php?c=invoices&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/invoices/views/index.php";   
include view("invoices", "index");
*/