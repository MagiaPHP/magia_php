<?php

include "www_extended/default/expenses/models/Expense.php";

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
if (!expenses_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################
if (!expenses_field_id("id", $id)) {
    array_push($error, "Expense id not exist");
}
################################################################################
if (!$error) {

    include view("expenses", "export_pdf");
} else {

    include view("home", "pageError");
}
