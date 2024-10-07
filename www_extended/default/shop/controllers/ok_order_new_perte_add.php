<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$order_id = ( ! empty($_REQUEST['order_id'])) ? clean($_REQUEST['order_id']) : false;
$perte_id_array = (!empty($_REQUEST['perte_id'])) ? ($_REQUEST['perte_id']) : false;

$error = array();
switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$perte_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$perte_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$perte_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$perte_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}


################################################################################
if (!$error) {

    if ($perte_id_array['L']) {
        $_SESSION['order']['perte_id']['L'] = $perte_id_array['L'];
    }

    if ($perte_id_array['R']) {
        $_SESSION['order']['perte_id']['R'] = $perte_id_array['R'];
    }



    header("Location: index.php?c=shop&a=order_new_80#order");
} else {
    include view("home", "pageError");
}