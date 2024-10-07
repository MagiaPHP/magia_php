<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$category_id = (isset($_POST["category_id"]) && $_POST["category_id"] != "" && $_POST["category_id"] != "null" ) ? clean($_POST["category_id"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" && $_POST["redi"] != "null" ) ? clean($_POST["redi"]) : 1;

// obligatorio
// fomato
// condiciones
////////////////////////////////////////////////////////////////////////////////
if (!$error) {


    expenses_update_category_id($_SESSION['u_expense']['id'], $category_id);

    switch ($redi) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_30#30");
            break;

        default:
            header("Location: index.php?c=expenses&a=add_30#30");
            break;
    }
} else {
    include view("home", "pageError");
}



