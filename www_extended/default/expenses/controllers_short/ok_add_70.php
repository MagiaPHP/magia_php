<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$comments = (isset($_POST["comments"]) && $_POST["comments"] != "" && $_POST["comments"] != "null" ) ? clean($_POST["comments"]) : null;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" && $_POST["redi"] != "null" ) ? clean($_POST["redi"]) : 1;

// obligatorio
// fomato
// condiciones
////////////////////////////////////////////////////////////////////////////////
if (!$error) {

    expenses_update_comments($_SESSION['u_expense']['id'], $comments);

    switch ($redi) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_75#80");
            break;

        default:
            header("Location: index.php?c=expenses&a=add_75#80");
            break;
    }
} else {
    include view("home", "pageError");
}


