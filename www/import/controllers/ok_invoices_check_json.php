<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$json = (isset($_POST["json"]) && $_POST['json'] != '' ) ? ($_POST["json"]) : false;

$error = array();

$icj = new Invoices();
$icj->importFromJson($json);
$icj->getImportErrors();

include view('import', 'invoices_check_json');

