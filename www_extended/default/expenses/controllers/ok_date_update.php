<?php

if (!permissions_has_permission($u_rol, 'config', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$date = ($_POST["date"] !== '' ) ? clean($_POST["date"]) : null;
$expense_id = ($_POST["expense_id"] !== '' ) ? clean($_POST["expense_id"]) : null;
$redi = (isset($_POST["redi"])) ? ($_POST["redi"]) : false;
$error = array();

if ($date == 0 || $date == null) {
    array_push($error, "Date error");
}

//if ($data < 1 || $data > 1000) {
//    array_push($error, "Must be between 1 and 1000");
//}
################################################################################
################################################################################
################################################################################

if (!$error) {

    // si no existe lo crea
    expenses_update_date($expense_id, $date);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses#1");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#2");
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
