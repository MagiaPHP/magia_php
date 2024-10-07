<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : null;
//
//if ($id) {
//    $email = new Emails();
//    $email->setEmails($id);
//}



include view("emails", "folders");
