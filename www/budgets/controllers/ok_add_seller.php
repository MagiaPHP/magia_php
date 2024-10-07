<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : null;
$seller_id = (isset($_POST["seller_id"])) ? clean($_POST["seller_id"]) : null;

$error = array();
################################################################################
if (!$budget_id) {
    array_push($error, 'budget_id is mandatory');
}
if (!$seller_id) {
    array_push($error, 'seller_id is mandatory');
}
#************************************************************************
// Busca si uya existe el texto en la BD
if (budgets_field_id("seller_id", $budget_id)) {
    array_push($error, "The budget already has seller");
}
################################################################################
################################################################################
if (!$error) {
    budgets_update_seller($budget_id, $seller_id);

    header("Location: index.php?c=budgets&a=details&id=$budget_id");
} else {
    include view("home", "pageError");
}    