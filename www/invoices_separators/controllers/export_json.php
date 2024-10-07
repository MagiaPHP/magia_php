<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $invoices_separators = new Invoices_separators();
    $invoices_separators->setInvoices_separators($id);

    include view("invoices_separators", "export_json");
} else {
    include view("home", "pageError");
}    
