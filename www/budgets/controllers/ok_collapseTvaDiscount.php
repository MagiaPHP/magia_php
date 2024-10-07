<?php

if (!permissions_has_permission($u_rol, 'config', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = ($_REQUEST["data"] !== '' ) ? clean($_REQUEST["data"]) : null;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;
$error = array();

if ($data) {
    $data = 1;
} else {
    $data = 0;
}
//if ($data < 1 || $data > 1000) {
//    array_push($error, "Must be between 1 and 1000");
//}
################################################################################
################################################################################
################################################################################

if (!$error) {

    // si no existe lo crea
    _options_push("config_budgets_edit_collapseTvaDiscount", $data, "budgets");

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=budgets#1");
            break;

        case 2:
            header("Location: index.php?c=budgets&a=details&id=$redi[id]#2");
            break;

        case 3:
            header("Location: index.php?c=budgets&a=edit&id=$redi[id]#3");
            break;

        case 4:
            header("Location: index.php?c=budgets&a=delete&id=$redi[id]#4");
            break;

        case 5:
            header("Location: index.php?c=budgets&a=aaaaaaaa&id=$redi[id]#5");
            break;

        default:
            header("Location: index.php?c=config#default");
            break;
    }
} else {

    include view("home", "pageError");
}
