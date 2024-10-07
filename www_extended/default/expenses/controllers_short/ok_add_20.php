<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$title = (isset($_POST["title"]) && $_POST["title"] != "" && $_POST["title"] != "null" ) ? clean($_POST["title"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" && $_POST["redi"] != "null" ) ? clean($_POST["redi"]) : 1;

// obligatorio
// fomato
// condiciones
////////////////////////////////////////////////////////////////////////////////
if (!$error) {


    expenses_update_title($_SESSION['u_expense']['id'], $title);

    switch ($redi) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_25#25");
            break;

        default:
            header("Location: index.php?c=expenses&a=add_25#25");
            break;
    }
} else {
    include view("home", "pageError");
}


include view("expenses", "add_20");
