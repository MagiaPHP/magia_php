<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!$_SESSION['u_expense']) {
    header("Location: index.php?c=expenses&a=add");
}

$expense = new Expenses();
$expense->setExpenses($_SESSION['u_expense']['id']);
// direccion del provehedor
$address = new Addresses();
$address->setAddresses(addresses_billing_by_contact_id($expense->getProvider_id())['id']);

include view("expenses", "add_80");
