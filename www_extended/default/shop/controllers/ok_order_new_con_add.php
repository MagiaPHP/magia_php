<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$constitution_id_array = (!empty($_REQUEST['constitution_id'])) ? ($_REQUEST['constitution_id']) : false;

$error = array();
switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$constitution_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$constitution_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$constitution_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$constitution_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}

################################################################################
if (!$error) {

    if ($constitution_id_array['L']) {
        $_SESSION['order']['constitution_id']['L'] = $constitution_id_array['L'];
    }

    if ($constitution_id_array['R']) {
        $_SESSION['order']['constitution_id']['R'] = $constitution_id_array['R'];
    }


    header("Location: index.php?c=shop&a=order_new_9060#order");
} else {
    include view("home", "pageError");
}