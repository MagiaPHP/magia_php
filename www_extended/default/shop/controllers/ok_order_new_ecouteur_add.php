<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$ecouteur_id_array = (!empty($_REQUEST['ecouteur_id'])) ? ($_REQUEST['ecouteur_id']) : false;

$error = array();
switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$ecouteur_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$ecouteur_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$ecouteur_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$ecouteur_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}


################################################################################
if (!$error) {

    if ($ecouteur_id_array['L']) {
        $_SESSION['order']['ecouteur_id']['L'] = $ecouteur_id_array['L'];
    }

    if ($ecouteur_id_array['R']) {
        $_SESSION['order']['ecouteur_id']['R'] = $ecouteur_id_array['R'];
    }

    header("Location: index.php?c=shop&a=order_new_9010#order");
} else {
    include view("home", "pageError");
}