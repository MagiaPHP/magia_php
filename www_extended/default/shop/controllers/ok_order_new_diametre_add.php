<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$diametre_id_array = (!empty($_REQUEST['diametre_id'])) ? ($_REQUEST['diametre_id']) : false;

$error = array();
switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$diametre_id_array['L'] && $event_l_id) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$diametre_id_array['R'] && $event_r_id) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$diametre_id_array['L'] && $event_l_id) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$diametre_id_array['R'] && $event_r_id) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}

################################################################################
if (!$error) {


    if ($diametre_id_array['L']) {
        $_SESSION['order']['diametre_id']['L'] = $diametre_id_array['L'];
    }

    if ($diametre_id_array['R']) {
        $_SESSION['order']['diametre_id']['R'] = $diametre_id_array['R'];
    }




    header("Location: index.php?c=shop&a=order_new_9030#order");
} else {
    include view("home", "pageError");
}