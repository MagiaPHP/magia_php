<?php

if (!permissions_has_permission($u_rol, 'shop', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$status = (!empty($_REQUEST["status"])) ? clean($_REQUEST["status"]) : false;
$redi = (!empty($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

if (!$status) {
    array_push($error, "status is mandatory");
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    if ($status == "unlinked") {
        // change to false
        _options_update('order_linked', 0);
    } else {
        // change to true
        _options_update('order_linked', 1);
    }


    switch ($redi) {
        case 1:

            header("Location index.php?c=shop&a=order_new_40#order");

            break;

        default:
            header("Location index.php?c=shop&a=order_new_40#order");
            break;
    }
} else {
    include view("home", "errorPage");
}






