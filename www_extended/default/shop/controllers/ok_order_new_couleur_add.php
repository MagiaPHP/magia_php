<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$colour_id_array = (!empty($_REQUEST['colour_id'])) ? ($_REQUEST['colour_id']) : false;

$error = array();

switch ($_SESSION['order']['side']) {
    case 'L':

        // si este tmf tiene color y no lleva, error 
        if (_tmf_materials_colours_by_tmf_material_id($tmf_l_id, $material_l_id) && !$colour_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (_tmf_materials_colours_by_tmf_material_id($tmf_l_id, $material_l_id) && !$colour_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (_tmf_materials_colours_by_tmf_material_id($tmf_l_id, $material_l_id) && !$colour_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }

        if (_tmf_materials_colours_by_tmf_material_id($tmf_l_id, $material_l_id) && !$colour_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}

################################################################################
if (!$error) {

    if ($colour_id_array['L']) {
        $_SESSION['order']['colour_id']['L'] = $colour_id_array['L'];
    }

    if ($colour_id_array['R']) {
        $_SESSION['order']['colour_id']['R'] = $colour_id_array['R'];
    }


    header("Location: index.php?c=shop&a=order_new_70#order");
} else {
    include view("home", "pageError");
}