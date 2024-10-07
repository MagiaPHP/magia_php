<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$material_id_array = (!empty($_REQUEST['material_id'])) ? ($_REQUEST['material_id']) : false;

$error = array();

switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$material_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$material_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$material_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$material_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}


################################################################################
if (!$error) {

    if ($material_id_array['L']) {
        $_SESSION['order']['material_id']['L'] = $material_id_array['L'];
        $_SESSION['order']['colour_id'] = null;
    }

    if ($material_id_array['R']) {
        $_SESSION['order']['material_id']['R'] = $material_id_array['R'];
        $_SESSION['order']['colour_id'] = null;
    }




    header("Location: index.php?c=shop&a=order_new_60#order");
} else {
    include view("home", "pageError");
}