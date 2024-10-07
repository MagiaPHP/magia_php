<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $reminders_invoices = new Reminders_invoices();
    $reminders_invoices->setReminders_invoices($id);

    include view("reminders_invoices", "export_json");
} else {
    include view("home", "pageError");
}    
