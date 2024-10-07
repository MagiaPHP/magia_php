<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$invoice_number = ( $_POST["invoice_number"] != "" && $_POST["invoice_number"] != "null" ) ? clean($_POST["invoice_number"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" && $_POST["redi"] != "null" ) ? clean($_POST["redi"]) : 1;

// obligatorio
// formato 
// condiciones
//      si mando el numero de factura,
//      Busco si hay una factura de ese provedor con ese mismo numero 
////////////////////////////////////////////////////////////////////////////////
if (!$error) {

    expenses_update_invoice_number($_SESSION['u_expense']['id'], $invoice_number);

    switch ($redi) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_20#20");
            break;

        default:
            header("Location: index.php?c=expenses&a=add_20#20");
            break;
    }
} else {
    include view("home", "pageError");
}


    