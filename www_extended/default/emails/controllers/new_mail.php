<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$tmp_id = (isset($_REQUEST["tmp_id"]) && $_REQUEST["tmp_id"] != "" ) ? clean($_REQUEST["tmp_id"]) : false;
$reciver_id = (isset($_REQUEST["reciver_id"]) && $_REQUEST["reciver_id"] != "" ) ? clean($_REQUEST["reciver_id"]) : false;

if ($tmp_id) {
    $tmp = new Emails_tmp();
    $tmp->setEmails_tmp($tmp_id);
}

include view("emails", "new_mail");

