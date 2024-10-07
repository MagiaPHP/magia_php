<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * creo la factura 
 * registro en la tabla budgets_invoices
 * 
 */
$budget_id = ( isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : null;
////
//
//$createInvoice = (($_POST["createInvoice"]) != "" ) ? clean($_POST["createInvoice"]) : null ;
//$new_invoice_id = null ;
//
//$client_id = budgets_field_id("client_id", $budget_id); 
//
//$invoiceMontlyRegistred = invoices_search_registre_by_cliente_id_type($client_id , "M"); 
//
//
//// hay factura mensual abierta de este cliente?
//$montlyInvoiceRegistred  = (($invoiceMontlyRegistred))? $invoiceMontlyRegistred : false; 
//
////vardump($invoiceMontlyRegistred); 
////
////die(); 

$key = magia_uniqid();
$array_budgets = array();

//array_push($array_budgets , $budget_id) ;



$error = array();

################################################################################
if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}




################################################################################
# // si el budget esta en status enviado o registrado
# Error si: 
# 40 // si ha sido rechazado 
# -10 // ha sido anulada
# != 30 // debe ser aceptado primero
# si esta en la tabla budgets_invoices
# 
# 
# 

if (budgets_field_id("status", $budget_id) != 30) {
    array_push($error, 'Budget must be accepted before');
}
if (budgets_field_id("status", $budget_id) == 40) {
    array_push($error, 'Budget already rejected');
}
if (budgets_field_id("status", $budget_id) == -10) {
    array_push($error, 'Budget already candeled');
}
if (budgets_invoices_search_invoice_by_budget_id($budget_id)) {
    array_push($error, 'This budget is already in the budgets_invoices table');
}

################################################################################
################################################################################
################################################################################

if (!$error) {



    // creo la factura copiando el budget
    // si ok, copio los items del budget a la factura 
    // cambio de estatus al budget
    $new_invoice_id = budgets_copy_to_invoice($budget_id, $key);

    if ($new_invoice_id) {

        // 
        // registro el contador de esta nueva factura
        invoices_counter_add($invoice_id, date('Y'), invoices_counter_next_number(date('Y')));

        // recojo cada uno de los busdgets_id que viene en el array y copio enuna sola factura 
        //foreach ( $array_budgets as $budget_id ) {
        // copio los items de budget a invoice
        budgets_copy_items_to_invoice_items($budget_id, $new_invoice_id);
        // 
        budgets_change_status_to($budget_id, 35); // aceptado por el cliente
        // pongo en la tabla budgets_invoices
        // 
        //budgets_invoices_add($budget_id , $invoice_id , $date_registre , $order_by , $status); 
        budgets_invoices_add($budget_id, $new_invoice_id, null, 1, 1);

        // budgets_update_invoice_id($budget_id , $new_invoice_id) ;                
        // invoice
        invoices_update_ce($new_invoice_id, generate_structured_communication($new_invoice_id));
    }

    header("Location: index.php?c=budgets&a=details&id=$budget_id");
} else {
    include view("home", "pageError");
}    