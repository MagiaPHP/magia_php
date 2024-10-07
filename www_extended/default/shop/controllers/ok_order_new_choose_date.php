<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$date_delivery = (!empty($_REQUEST['date_delivery'])) ? clean($_REQUEST['date_delivery']) : false;
$delivery_days = (!empty($_REQUEST['delivery_days'])) ? clean($_REQUEST['delivery_days']) : false;

$error = array();

################################################################################
if (!$error) {


    $_SESSION['order']['delivery_days'] = ($delivery_days == 'null') ? null : $delivery_days;
// Dejo activo ya q se puede agregar sea dias o fecha
    $_SESSION['order']['date_delivery'] = ($date_delivery == 'null') ? null : $date_delivery;

    header("Location: index.php?c=shop&a=order_new_10#order");
} else {
    include view("home", "pageError");
}