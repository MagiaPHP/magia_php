<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Creo una factura individual 
 * agrego el budgets a la table budgets_invoices
 * copio los items del budgets al inoices
 * actualizo el total de la factura 
 * Cambio el status del budgets a aceptado y facturado 
 * 
 * 
 * 
 */
$budget_id = ( isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : null;

$create_project = ( isset($_POST["create_project"]) && $_POST["id"] != "" ) ? clean($_POST["create_project"]) : false;

$client_id = budgets_field_id("client_id", $budget_id);
$ab = budgets_field_id("addresses_billing", $budget_id);
$ad = budgets_field_id("addresses_delivery", $budget_id);

$array_budgets = array();

$error = array();

################################################################################
if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}

################################################################################
//if (budgets_field_id("status", $budget_id) == 10) {
//    // array_push($error , 'Budget must be accepted before') ;
//}
//
//if (budgets_field_id("status", $budget_id) == 20) {
//    // array_push($error , 'Budget must be accepted before') ;
//}
//
//
//if (budgets_field_id("status", $budget_id) == 30) {
//    //  array_push($error , 'Budget must be accepted before') ;
//}
//
//
if (budgets_field_id("status", $budget_id) == 35) {
    array_push($error, 'Budget already invoiced');
}
//
if (budgets_field_id("status", $budget_id) == 40) {
    array_push($error, 'The budget has rejected status');
}
//
if (budgets_field_id("status", $budget_id) == -10) {
    array_push($error, 'Budget already cancel');
}
//
if (budgets_invoices_search_invoice_by_budget_id($budget_id)) {
    array_push($error, 'This budget is already in the budgets_invoices table');
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    // creo un codigo unico
    $code = magia_uniqid();

    // creo la factura con codigo unico
    invoices_add_individual_by_client_id($client_id, $ab, $ad, $code, 0, $budget_id);

    // buscco la factura con el codigo unico
    $invoice_id = invoices_field_code("id", $code);

    // registro el contador de esta nueva factura
    invoices_counter_add($invoice_id, date('Y'), invoices_counter_next_number(date('Y')));

    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    // si hay la factura con con codigo unico
    if ($invoice_id) {
        // recojo cada uno de los busdgets_id que viene en el array y copio enuna sola factura 
        //foreach ( $array_budgets as $budget_id ) {
        // copio los items de budget a invoice
        budgets_copy_items_to_invoice_items($budget_id, $invoice_id);

        budgets_change_status_to($budget_id, 35); // aceptado por el cliente
        // pongo en la tabla budgets_invoices
        budgets_invoices_add($budget_id, $invoice_id, null, 1, 1);

        // invoice
        invoices_update_ce($invoice_id, generate_structured_communication($invoice_id));

        // actaulizo el total de la factura 
        invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));

        // si desea crear un proyecto, 
        if ($create_project) {

            $budget = new Budgets();
            $budget->setBudgets($budget_id);

            projects_create_from_budget($budget);
        }
    }


    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=budgets&a=details&id=$budget_id");
            break;

        default:
            header("Location: index.php?c=budgets&a=details&id=$budget_id");
            break;
    }
    //
    //
    //
    //
} else {
    include view("home", "pageError");
}    