<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$date = (isset($_POST["date"]) && $_POST["date"] != "" && $_POST["date"] != "null" ) ? clean($_POST["date"]) : null;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" && $_POST["redi"] != "null" ) ? clean($_POST["redi"]) : 1;

// obligatorio
// fomato
// condiciones
////////////////////////////////////////////////////////////////////////////////
if (!$error) {

    expenses_update_date($_SESSION['u_expense']['id'], $date);

    switch ($redi) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_40#40");
            break;

        default:
            header("Location: index.php?c=expenses&a=add_40#40");
            break;
    }
} else {
    include view("home", "pageError");
}


