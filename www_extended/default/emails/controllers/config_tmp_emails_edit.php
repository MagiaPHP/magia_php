<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

if ($id) {
    $emails_tmp = new Emails_tmp();
    $emails_tmp->setEmails_tmp($id);
}

include view("emails", "config_tmp_emails_edit");
