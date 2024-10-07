<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// id del pago a ser anulado 
$id = ( ($_GET["id"]) != "" ) ? clean($_GET["id"]) : false;
$redi = ( ($_GET["redi"]) != "" ) ? clean($_GET["redi"]) : 1;
// factura segun este pago 
$invoice_id = balance_field_id("invoice_id", $id);
//
$error = array();

/**
 * Error si: 
 *      id no existe 
 *      id ya esta anulado 
 *          
 */
################################################################################
if (!$id) {
    array_push($error, '$id not send');
}
// si esta tr tiene cancel_code
if (balance_field_id("canceled_code", $id)) {
    array_push($error, 'Item already canceled');
}
if (invoices_field_id("status", $invoice_id) == 30) {
    // array_push($error , 'Invoice whit this status can t cancel payements ') ;
}
if (invoices_field_id("status", $invoice_id) < 0) {
    array_push($error, 'You cannot delete a transaction from a canceled invoice');
}



#************************************************************************
// 
// copiar la tr y poner valores nnegadtivos
// poner cancel-code en las tr involucradas
// Actualizr los subtotal y tax en la factura 
// si advance < SUM(subtotal + tax)  cambiar status factura a 20 por cobrar
//
//
################################################################################

if (!$error) {


    // cojo el codigop para la anulacion 
    $cc = balance_next_cancel_code();
    // anulo la linea de la balanza y registro el codigo de anulacion 
    balance_cancel($id, $cc);
    // registro el codigo de anulacion en la linea de entrada
    balance_set_cancel_code($id, $cc);
    // actualizo el total cobrado de la factura
    invoices_update_total_advance($invoice_id, balance_total_total_by_invoice($invoice_id));

    $total = invoices_field_id("total", $invoice_id);
    $tax = invoices_field_id("tax", $invoice_id);
    $advance = invoices_field_id("advance", $invoice_id);

    // si lo cobrado es cero
    if ($advance == 0) {
        invoices_change_status_to($invoice_id, 10); // registrada
    }
    // si lo cobrado es superior a 0
    if ($advance > 0 && $advance < ($total + $tax )) {
        invoices_change_status_to($invoice_id, 20); // pongo cobro parcial
    }

    // si el total + tax es superior a lo cobrado 
    if ($advance > 0 && $advance >= ($total + $tax)) {
        invoices_change_status_to($invoice_id, 30); // cobrado totalmente
    }

    // Cambio de status de la linea de banco, segun la cuenta y la ref/operation

    $account_number = balance_field_id('account_number', $id);
    $ref = balance_field_id('ref', $id);

    banks_lines_update_status_by_my_account_operation($account_number, $ref, 30);

    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Cancel payment <br> Balance details: [ Id : <a href='index.php?c=balance&a=details&id=$id'>$id</a>, cancel code: <a href='index.php?c=balance&a=search&w=cancelCode&txt=$cc'>$cc</a> ]";
    $doc_id = $invoice_id;
    $crud = "create";
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
    #
    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Change bank line status to 30";
    $doc_id = $invoice_id;
    $crud = "create";
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
    #
    #       
    #              
    #                            
    // actualiza los totales de la factura 
    invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=invoices&a=details&id=$invoice_id#1");
            break;

        case 2:
            header("Location: index.php?c=invoices&a=details_payement&id=$invoice_id#2");
            break;

        default:
            header("Location: index.php?c=invoices&a=details&id=$invoice_id#default");

            break;
    }
} else {

    include view("home", "pageError");
}
