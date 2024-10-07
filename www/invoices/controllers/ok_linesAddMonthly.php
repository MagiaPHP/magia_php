<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$client_id = invoices_field_id("client_id", $invoice_id); // id a quien se le factura 
$budgets_ids = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : false;
$type = "M"; // Mensual M
$error = array();

################################################################################
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
################################################################################
# 
# cuento los ids
# bucle
# debe



foreach ($budgets_ids as $budget_id) {

    if (budgets_field_id("status", $budget_id) != 30) {

        array_push($error, "The budgets sent must have status 30");
    }

    if (offices_headoffice_of_office(budgets_field_id("client_id", $budget_id)) != $client_id) {
        array_push($error, "All budgets must have the same client id");
    }

    if (budgets_invoices_search_invoice_by_budget_id($budget_id)) {
        array_push($error, "There is one or more budget already invoiced");
    }
}

################################################################################

if (!$error) {

    // hago una bucle para agregar el budget a la tabla 

    $total = 0;
    $tax = 0;

    foreach ($budgets_ids as $budget_id) {

        // pongo en la tabla budgets-invoices
        // 
        // $budget_id, $invoice_id, $date_registre, $order_by, $status
        budgets_invoices_add($budget_id, $invoice_id, null, 1, 1);

        $total = $total + budgets_field_id("total", $budget_id);
        $tax = $tax + budgets_field_id("tax", $budget_id);

        invoices_update_total_tax($invoice_id, $total, $tax);

        // copiar los items del devis a la factura 
        (budgets_copy_items_to_invoice_items($budget_id, $invoice_id));
    }

    invoices_update_type($invoice_id, $type); // Normal o ensual
    // Actualiza los totales de la factura
    invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));

    header("Location: index.php?c=invoices&a=edit&id=$invoice_id#items_add");
} else {

    include view("home", "pageError");
}
