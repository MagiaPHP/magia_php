<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = ( ($_GET["id"]) != "" ) ? clean($_GET["id"]) : false;
$expense_id = balance_field_id("expense_id", $id);
$error = array();

################################################################################
if (!$id) {
    array_push($error, '$id is mandatory');
}
// si esta tr tiene cancel_code
if (balance_field_id("canceled_code", $id)) {
    array_push($error, 'Item already canceled');
}

//if (invoices_field_id("status", $invoice_id) == 30) {
//    // array_push($error , 'Invoice whit this status can t cancel payements ') ;
//}
//if (invoices_field_id("status", $invoice_id) < 0) {
//    array_push($error, 'You cannot delete a transaction from a canceled invoice');
//}
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
    expenses_update_total_advance($expense_id, balance_total_total_by_expense($expense_id));

    $total = expenses_field_id("total", $expense_id);
    $tax = expenses_field_id("tax", $expense_id);
    $advance = expenses_field_id("advance", $expense_id);

    // si lo cobrado es cero
    if ($advance == 0) {
        expenses_change_status_to($expense_id, 5); // registrada
    }
    // si lo cobrado es superior a 0
    if ($advance > 0 && $advance < ($total + $tax )) {
        expenses_change_status_to($expense_id, 20); // pongo parcial
    }

    // si el total + tax es superior a lo cobrado 
    if ($advance > 0 && $advance >= ($total + $tax)) {
        expenses_change_status_to($expense_id, 30); // Full totalmente
    }





    ############################################################################
    ############################################################################
    ############################################################################


    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Cancel payement <br> Balance details: [ Id:<a href='index.php?c=balance&a=details&id=$id'>$id</a>, cancel code: <a href='index.php?c=balance&a=search&w=cancelCode&txt=$cc'>$cc</a> ]";
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
    // actualiza los totales de la factura 
//    invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));
    expenses_update_total_tax($expense_id, expenses_lines_totalHTVA($expense_id), expenses_lines_totalTVA($expense_id));

    header("Location: index.php?c=expenses&a=details&id=$expense_id");
} else {

    include view("home", "pageError");
}
