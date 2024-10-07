<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// add expenses 
// escoje un proveedor
// Registra la session
// reenvia a paso 10

$provider_id = (isset($_REQUEST["provider_id"]) && $_REQUEST["provider_id"] != "" && $_REQUEST["provider_id"] != "null" ) ? clean($_REQUEST["provider_id"]) : null;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" && $_REQUEST["redi"] != "null" ) ? clean($_REQUEST["redi"]) : 1;

$error = array();
//
// obligatorio
// fomato
// condiciones
////////////////////////////////////////////////////////////////////////////////
if (!$error) {

    $lastInsert = expenses_add_short($provider_id, 0);

    if ($lastInsert) {
        $_SESSION['u_expense'] = null;
        $_SESSION['u_expense']['id'] = $lastInsert;
    }
    //
    switch ($redi) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_05");
            break;

        default:
            header("Location: index.php?c=expenses&a=add_05");
            break;
    }
} else {
    include view("home", "pageError");
}

