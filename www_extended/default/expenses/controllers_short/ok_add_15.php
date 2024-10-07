<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$deadline = (isset($_POST["deadline"]) && $_POST["deadline"] != "" && $_POST["deadline"] != "null" ) ? clean($_POST["deadline"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" && $_POST["redi"] != "null" ) ? clean($_POST["redi"]) : 1;

// obligatorio
// fomato
// condiciones
////////////////////////////////////////////////////////////////////////////////
if (!$error) {


    expenses_update_deadline($_SESSION['u_expense']['id'], $deadline);

    switch ($redi) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_20#20");
            break;

        default:
            header("Location: index.php?c=expenses&a=add_20#20");
            break;
    }
} else {
    include view("home", "pageError");
}
