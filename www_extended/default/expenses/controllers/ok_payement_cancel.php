<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Cancela el pago 
 * Regresa el id de banki lines a su estado de origen 
 * regresa el estatus de la expenses a su estado de origen 
 * 
 */
// el id de la balance
$id = ( ($_GET["id"]) != "" ) ? clean($_GET["id"]) : false;
$redi = ( ($_GET["redi"]) != "" ) ? clean($_GET["redi"]) : 1;

$expense_id = balance_field_id("expense_id", $id);
$error = array();

//vardump(balance_field_id('ref', $id)); 
//die(); 
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
        expenses_change_status_to($expense_id, 10); // registrada
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
    // actualiza los totales de la factura 
    expenses_update_total_tax($expense_id, expenses_lines_totalHTVA($expense_id), expenses_lines_totalTVA($expense_id));

    // regreso al estado de origen del bank_lines
    $my_account = balance_field_id('account_number', $id);
    // operation 
    $operation = balance_field_id('ref', $id);

    banks_lines_update_status_by_my_account_operation($my_account, $operation, 40);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#1");
            break;
        case 3:
            header("Location: index.php?c=expenses&a=details_payement&id=$expense_id#3");
            break;

        default:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#default");
            break;
    }
    //
    //
    //
    //
    //
    //
} else {

    include view("home", "pageError");
}
