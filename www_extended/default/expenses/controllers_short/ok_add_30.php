<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$total = (isset($_POST["total"]) && $_POST["total"] != "" && $_POST["total"] != "null" ) ? clean($_POST["total"]) : null;
$tax = (isset($_POST["tax"]) && $_POST["tax"] != "" && $_POST["tax"] != "null" ) ? clean($_POST["tax"]) : null;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" && $_POST["redi"] != "null" ) ? clean($_POST["redi"]) : 1;

// obligatorio
// fomato
// condiciones
////////////////////////////////////////////////////////////////////////////////
if (!$error) {


    expenses_update_total($_SESSION['u_expense']['id'], $total);
    expenses_update_tax($_SESSION['u_expense']['id'], $tax);

    switch ($redi) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_35#35");
            break;

        default:
            header("Location: index.php?c=expenses&a=add_35#35");
            break;
    }
} else {
    include view("home", "pageError");
}

include view("expenses", "add_30");
