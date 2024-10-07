<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = ( ($_GET["id"]) != "" ) ? clean($_GET["id"]) : false;

$invoice_id = balance_field_id("invoice_id", $id);

$error = array();

if (!$id) {
    array_push($error, '$id is mandatory');
}

if (balance_field_id("canceled_code", $id)) {
    array_push($error, 'item already canceled');
}


#************************************************************************



if (!$error) {
    // se debe aun revisar esto 
    die("Revisar esto ");
    /**
      $cc = balance_next_cancel_code();

      balance_cancel($id, $cc);

      balance_set_cancel_code($id, $cc);




      if ($invoice_id) {

      invoices_update_total_advance($invoice_id, balance_total_total_by_invoice($invoice_id));

      if ((invoices_field_id("total", $invoice_id) + invoices_field_id("tax", $invoice_id) ) < invoices_field_id("advance", $invoice_id)) {

      invoices_change_status_to($invoice_id, 20);
      }
      }




     */
    header("Location: index.php?c=balance");
} else {

    include view("home", "pageError");
}
