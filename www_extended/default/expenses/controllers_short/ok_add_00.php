<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$expense_id = $_SESSION['u_expense']['id'];

$f = (!empty($_POST["f"]) && $_POST["f"] !== "null") ? clean($_POST["f"]) : false;
$v = (!empty($_POST["v"]) && $_POST["v"] !== "null") ? clean($_POST["v"]) : false;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" && $_POST["redi"] != "null" ) ? clean($_POST["redi"]) : 1;

////////////////////////////////////////////////////////////////////////////////
if (!$error) {

    if ($times) {
        expenses_update_times($expense_id, $times);
    } else {
        expenses_update_times($expense_id, null);
    }

    switch ($every) {
        case 'day':
        case 'month':
        case 'tri':
        case 'sem':
        case 'year':
        case 'once':
            expenses_update_every($expense_id, $every ?: null);
            expenses_update_date_start($expense_id, $date_start ?: null);
            expenses_update_date_end($expense_id, $date_end ?: null);
            break;

        default:
            expenses_update_every($expense_id, $every ?: null);
            expenses_update_date_start($expense_id, $date_start ?: null);
            expenses_update_date_end($expense_id, $date_end ?: null);
            break;
    }


    switch ($redi) {
        case 5:
        case "5":
            header("Location: index.php?c=expenses&a=add_10#10");
            break;
    }
    //
    //
    //
    //
} else {
    include view("home", "pageError");
}


include view("expenses", "add_40");
