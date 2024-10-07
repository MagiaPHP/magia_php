<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$s = (!empty($_REQUEST['s'])) ? clean($_REQUEST['s']) : false;
$error = array();
################################################################################
if (!$error) {

    $_SESSION['order']['side'] = $s;

    header("Location: index.php?c=shop&a=order_choose_date#order");
} else {
    include view("home", "pageError");
}