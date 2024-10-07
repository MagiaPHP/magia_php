<?php

if (!permissions_has_permission($u_rol, "shop_logs", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (!empty($_POST['id'])) ? clean($_POST['id']) : false;

$logs = shop_logs('directory_by_office', $doc_id);

include view("shop", "logs");

