<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (!empty($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
$redi = (!empty($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : false;

$error = array();

################################################################################
if (!$error) {

    $_SESSION['order'] = null;
    $_SESSION['order']['side'] = null;
    $_SESSION['order']['patient_id'] = $contact_id;
    $_SESSION['order']['date_delivery'] = null;
    $_SESSION['order']['delivery_days'] = null;
    $_SESSION['order']['address_delivery'] = null;
    $_SESSION['order']['side'] = null;
    // necesito tener null en los dos lados en ok_.....type_add.php
    $_SESSION['order']['type_id']['L'] = null;
    $_SESSION['order']['type_id']['R'] = null;
    $_SESSION['order']['forme_id']['L'] = null;
    $_SESSION['order']['forme_id']['R'] = null;

    header("Location: index.php?c=shop&a=order_choose_side#order");

    switch ($redi) {
        case 1:

            header("Location: index.php?c=shop&a=order_choose_side#order");
            break;

        default:
            header("Location: index.php?c=shop&a=order_choose_side#order");
            break;
    }
} else {

    include view("home", "pageError");
}