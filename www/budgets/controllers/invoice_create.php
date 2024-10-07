<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Esta crea una factura con los presupuestos enviados
 * 
 * Verifico que: 
 *      todos los presupuesos tenga una mismo headoffice_id
 *      cada uno de los presupuestos tengan el status correcto, ( $status == 10 || status == 20) 
 *      que cada presupuesto tenga null en invoice_id
 *      
 * 
 */
$headoffice_id_array = array();
$invoice_id_array = array();

$headoffice_id = null; // debe tener un solo item
$status_ok = false;
$has_invoice = false;
$tax = 0;
$total = 0;
// lista de todos los presupuestos enviados //
$budgets = (isset($_POST["id"])) ? ($_POST["id"]) : false;

$error = array();

$i = 1;
foreach ($budgets as $id) {

    $headoffice_id = offices_headoffice_of_office(budgets_field_id("client_id", $id));
    // si no esta presente, lo agrego a la lista de clientes
    if (!in_array($headoffice_id, $headoffice_id_array)) {
        array_push($headoffice_id_array, $headoffice_id);
    }
    // agrego a la lista de clientes
    if (count($headoffice_id_array) > 1) {
        array_push($error, 'You are trying to make an invoice for budgets that belong to different clients, that cannot be done');
        break;
    }
    if (count($headoffice_id_array) < 1) {
        array_push($error, 'Customer identifier not received');
        break;
    }
    ############################################################################

    $invoice_id = budgets_field_id("invoice_id", $id);

    if ($invoice_id > 0 && !in_array($invoice_id, $invoice_id_array)) {
        array_push($invoice_id_array, $invoice_id);
    }

    if (count($invoice_id_array) > 0) {
        array_push($error, 'Only budgets that have not been invoiced are accepted');

        break;
    }

    $status = budgets_field_id("status", $id);
    if ($status != 30) {
        array_push($error, 'Only status ' . budget_status_by_status(30) . " are accepted");
        break;
    }

    $tax = $tax + budgets_field_id("tax", $id);
    $total = $total + budgets_field_id("total", $id);

    $i++;
}



$addresses_billing = addresses_billing_by_contact_id($headoffice_id);

if (!$headoffice_id) {
    array_push($error, '$headoffice_id dont send');
}
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    // $budgets = budgets_search_by_client_status(50027, 30); 

    include view("budgets", "invoice_create");

    // header("Location: index.php?c=invoices&a=edit&id=$lastInsertId") ;
} else {

    include view("home", "pageError");
}


