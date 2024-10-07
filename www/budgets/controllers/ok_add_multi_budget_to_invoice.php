<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Esto agrega uno o mas budgets a una factura 
 *     
 * 
 * INVOICE
 * ------------------------------------
 * Si es 'new'
 *  - creo una nueva factura 
 *  - 
 * La factura viene con un id es antigua: 
 * 
 *      debe tener un client_id == al headoffice del presupuesto 
 *      estar en status registrada
 *      No debe tener cobros 
 *  D E V I S 
 * ----------------------------------
 * Verificamos si son id de devis 
 * - existentes
 * - buen status 
 * - debe tener el headoffice el mismo que el de la factura
 * - no debe estar en la tabla budgets_invoices
 * - La misma empresa 
 * - La misma direccion 
 * 
 * Procedimiento 
 * ------------------------------------
 * Recepciono el id de la factura 
 *      - ES NUEVA
 *      - EXISTE
 * recepciono los id de los devis en array
 * hago la verificacion de la factura 
 * hago la verificacion de los devis 
 * si no hay error, hago un bucle para 
 *      -- Agregar el devis a la factura 
 * 
 * Al final hago la compracion de los devis agregados y los devis enviados 
 *  
 * 
 * 
 */
// a que factura se desea agregar ?
$budgets_id = (isset($_POST['budgets_id']) && $_POST['budgets_id'] != "" ) ? clean($_POST['budgets_id']) : false;
$invoice_id = (isset($_POST['invoice_id']) && $_POST['invoice_id'] != "" ) ? clean($_POST['invoice_id']) : false;
$error = array();

//if ($invoice_id == 'new') {
//    // creamos la factura y mandamos el array de budgets para agregar a esa factura 
//} else {
//    //  mandar la factura y mandamos el array de budgets para agregar a esa factura
//}
################################################################################
// si no se envia un solo budget, error 
if (!$budgets_id) {
    array_push($error, '$budget_id is mandatory');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
//if ( ! is_id($budget_id) ) {
//    array_push($error , '$budget_id format error') ;
//}
if (!is_id($invoice_id)) {
    array_push($error, '$invoice_id format error');
}

#################################################################################
# Hago un control en bucle 
#################################################################################
//if ( budgets_field_id("status" , $budget_id) !== 30 ) {
//  //  array_push($error , 'The budget must be in status') ;
//  //  array_push($error , budget_status_by_status(30)) ;
//}
//
foreach ($budgets_id as $budget_id) {
    // verifico que el presupuesto y la factura sean de la misma empresa
    if (offices_headoffice_of_office(budgets_field_id("client_id", $budget_id)) != offices_headoffice_of_office(invoices_field_id("client_id", $invoice_id))) {
        array_push($error, 'The budget headoffice is not the same as the invoice headoffice');
    }
// no debe estar en la tabla budgets_invoices
    if (budgets_invoices_search_budgets_id_invoice_id($budget_id, $invoice_id)) {
        array_push($error, 'The budget is already in table budgets_invoices');
    }
//------------------------------------------------------------------------------
// Si la factura no existe
    if (!invoices_field_id("id", $invoice_id)) {
        array_push($error, 'The invoice does not exist');
    }
// Da error si las facturas tienen status superior a 10
// stats 10 
// sttaus 0
    if (invoices_field_id("status", $invoice_id) > 10) {
        array_push($error, 'Only invoices with status ' . invoice_status_by_status(10) . ' or ' . invoice_status_by_status(0) . ' are accepted');
    }
//
    if (invoices_field_id("type", $invoice_id) !== "M") {
        array_push($error, 'Only invoices type M are accepted');
    }
}


################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {


    foreach ($budgets_id as $budget_id) {

        // hago un bucle para registrar cada budget
        budgets_add_budget_to_invoice($invoice_id, $budget_id);

        ############################################################################
        ############################################################################
        ############################################################################
        $level = null;
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , $a , 
        $w = null;
        $description = "Add budget [$budget_id] to invoice [$invoice_id]";
        $doc_id = $budget_id;
        $crud = "update";
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
        //**************************************************************************
        //**************************************************************************
        //**************************************************************************
        $level = null;
        $date = null;
        //$u_id
        //$u_rol , 
        $c = "invoices";
        //$a , 
        $w = null;
        $description = "Add budget [$budget_id] to invoice [$invoice_id]";
        $doc_id = $invoice_id;
        $crud = "update";
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
    } // fin del foreach de budgets



    header("Location: index.php?c=invoices&a=details&id=$invoice_id");
} else {
    include view("home", "pageError");
}    