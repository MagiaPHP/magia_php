<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$account_number = (isset($_REQUEST["account_number"]) && $_REQUEST["account_number"] != "null" ) ? clean($_REQUEST["account_number"]) : false;

if (isset($account_number) && $account_number == 'add_new') {
    header("Location: index.php?c=contacts&a=banks&id=" . $u_owner_id);
}

include view("banks_lines", "import");
