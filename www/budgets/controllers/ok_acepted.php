<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Este solo registra como aceptado, pero no crea factura 
 * 
 * id
 * cambio el status si
 *      creo la factura, 
 *      copio los items 
 * 
 * Registro el numero de devis y factura en budgets_invoices

 *      
 * 
 */
$budget_id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$createInvoice = (isset($_POST["createInvoice"]) && $_POST["createInvoice"] != "" ) ? clean($_POST["createInvoice"]) : null;
// saco el valor numerico por que me viene como texto 
$createInvoice = intval($createInvoice);

$new_invoice_id = null;
$client_id = budgets_field_id("client_id", $budget_id);
$invoiceMontlyRegistred = invoices_search_registre_by_cliente_id_type($client_id, "M");
// hay factura mensual abierta de este cliente?
$montlyInvoiceRegistred = (($invoiceMontlyRegistred)) ? $invoiceMontlyRegistred : false;
//vardump($invoiceMontlyRegistred); 
//
//die(); 
$array_budgets = array();
array_push($array_budgets, $budget_id);
$key = magia_uniqid();

$error = array();

################################################################################
if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
if (!budgets_field_id("client_id", $budget_id)) {
    array_push($error, 'client_id not present in budget');
}
################################################################################
# // si el budget esta en status enviado o registrado
if (budgets_field_id("status", $budget_id) == 30) {
    array_push($error, 'Budget already accepted');
}
if (budgets_field_id("status", $budget_id) == 40) {
    array_push($error, 'Budget already rejected');
}
if (budgets_field_id("status", $budget_id) == -10) {
    array_push($error, 'Budget already candeled');
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    if ($createInvoice) {


        // creo la factura copiando el budget
        // si ok, copio los items del budget a la factura 
        // cambio de estatus al budget
        budgets_copy_to_invoice($budget_id, $key);

        $new_invoice_id = invoices_field_code('id', $key);

        if ($new_invoice_id) {

            // registro el contador de la facura 
            // registro el contador de la facura 
            // registro el contador de la facura 
            invoices_counter_add($new_invoice_id, date('Y'), invoices_counter_next_number(date('Y')));

            // recojo cada uno de los busdgets_id que viene en el array y copio enuna sola factura 
            foreach ($array_budgets as $budget_id) {
                // copio los items de budget a invoice
                budgets_copy_items_to_invoice_items($budget_id, $new_invoice_id);
            }

            invoices_update_ce($new_invoice_id, generate_structured_communication($new_invoice_id));
            budgets_invoices_add($budget_id, $new_invoice_id, null, 1, 1);
            budgets_change_status_to($budget_id, 30);
        }
    } else {

        // sino simplemente cambio de status 
        budgets_change_status_to($budget_id, 30);
    }

    ############################################################################
    ############################################################################
    ############################################################################
    // $id = $budget_id ;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Accept budget ($budget_id) ";
    $doc_id = $budget_id;
    $crud = "edit";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
    ############################################################################
    ############################################################################ 



    header("Location: index.php?c=budgets&a=details&id=$budget_id");
} else {

    include view("home", "pageError");
}    