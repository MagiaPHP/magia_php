<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$invoice_id = (isset($_POST['invoice_id']) && $_POST['invoice_id'] != "") ? $_POST['invoice_id'] : false;
$budget_id = (isset($_POST['budget_id']) && $_POST['budget_id'] != "") ? $_POST['budget_id'] : false;
$error = array();

################################################################################
if (!$budget_id) {
    array_push($error, '$budgets_id is mandatory');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
################################################################################


if (budgets_field_id("status", $budget_id) != 30) {
    array_push($error, "The budgets sent must have status 30");
}

################################################################################

if (!$error) {


    budgets_invoices_delete_by($budget_id, $invoice_id);

    invoice_remove_items_by_budget_id($budget_id);

    invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));

    header("Location: index.php?c=invoices&a=edit&id=$invoice_id#items_add");
} else {

    include view("home", "pageError");
}
