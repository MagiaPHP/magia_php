<?php

if (!permissions_has_permission($u_rol, 'expenses', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_number = ($_POST["invoice_number"] !== '' ) ? clean($_POST["invoice_number"]) : null;
$provider_id = ($_POST["provider_id"] !== '' ) ? clean($_POST["provider_id"]) : null;
$expense_id = ($_POST["expense_id"] !== '' ) ? clean($_POST["expense_id"]) : null;
$redi = (isset($_POST["redi"])) ? ($_POST["redi"]) : false;
$error = array();

################################################################################
#
if (!$invoice_number) {
    array_push($error, "Invoice number is mandatory");
}
if (!$provider_id) {
    array_push($error, "Provider id is mandatory");
}
if (!$expense_id) {
    array_push($error, "Expense id is mandatory");
}
################################################################################
#
// provider_id && invoice_number
if (expenses_search_by_provider_invoice($provider_id, $invoice_number)) {
    array_push($error, "This invoice number with this provider is already registered in your database");
}
################################################################################

if (!$error) {

    // si no existe lo crea        
    expenses_update_invoice_number($expense_id, $invoice_number);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses#1");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#2");
            break;

        case 3:
            header("Location: index.php?c=expenses&a=edit&id=$redi[id]#3");
            break;

        case 4:
            header("Location: index.php?c=expenses&a=delete&id=$redi[id]#4");
            break;

        case 5:
            header("Location: index.php?c=expenses&a=aaaaaaaa&id=$redi[id]#5");
            break;

        default:
            header("Location: index.php?c=config#default");
            break;
    }
} else {

    include view("home", "pageError");
}
