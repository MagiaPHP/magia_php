<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


// agrega la companya
// agrega la factura 
// redirecciona a la edicion de la factura 
// 
$error = array();
################################################################################
if (!$error) {

    $code = uniqid();

    $new_company = new Company($code, $owner_id, null, 'Company name');

    $new_company->createCompany($companyName);
    $new_company->getId();

    $new_invoice = new Invoices();
    $new_invoice->createInvoice($contact_id);
    $new_invoice->getId();
} else {
    include view("home", "pageError");
}
