<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$mesure_id_array = (!empty($_REQUEST['mesure_id'])) ? ($_REQUEST['mesure_id']) : false;

$error = array();

switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$mesure_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$mesure_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$mesure_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$mesure_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}

################################################################################
if (!$error) {

    if ($mesure_id_array['L']) {
        $_SESSION['order']['mesure_id']['L'] = $mesure_id_array['L'];
    }

    if ($mesure_id_array['R']) {
        $_SESSION['order']['mesure_id']['R'] = $mesure_id_array['R'];
    }

    header("Location: index.php?c=shop&a=order_new_40#order");
} else {
    include view("home", "pageError");
}