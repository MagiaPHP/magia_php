<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

$email = new Emails();
$email->setEmails($id);

// Actualizo a mensaje leido
if ($email->getDate_read() == null) {
    emails_update_date_read($id, date("Y-m-d h:i:s"));
}
include view("emails", "details");

if ($debug) {
    include "www/emails/views/debug.php";
}