<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}

if (!$a) {
    array_push($error, "Action Don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}


################################################################################

if (!budgets_invoices_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!budgets_invoices_field_id("id", $id)) {
    array_push($error, "id not exist");
}



if (!$error) {
    $budgets_invoices = budgets_invoices_details($id);
    include view("budgets_invoices", "details");
} else {
    array_push($error, "Check your form");
    include view("budgets_invoices", "index");
}

