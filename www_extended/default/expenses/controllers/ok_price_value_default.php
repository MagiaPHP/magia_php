<?php

if (!permissions_has_permission($u_rol, 'config', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = ($_POST["data"] !== '' ) ? clean($_POST["data"]) : null;
$redi = (isset($_POST["redi"])) ? ($_POST["redi"]) : false;
$error = array();

if ($data == 0 || $data == null) {
    $data = '';
}
//if ($data < 1 || $data > 1000) {
//    array_push($error, "Must be between 1 and 1000");
//}
################################################################################
################################################################################
################################################################################

if (!$error) {

    // si no existe lo crea
    _options_push("config_expenses_price_value_default", $data, "expenses");

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses#1");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=details&id=$redi[id]#2");
            break;

        case 3:
            header("Location: index.php?c=expenses&a=edit&id=$redi[id]#3");
            break;

        case 4:
            header("Location: index.php?c=expenses&a=delete&id=$redi[id]#4");
            break;

        case 5:
            header("Location: index.php?c=expenses&a=aaaaaaaa&id=$redi[id]#5");
            break;

        default:
            header("Location: index.php?c=config#default");
            break;
    }
} else {

    include view("home", "pageError");
}
