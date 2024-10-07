<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$forme_id_array = (!empty($_REQUEST['forme_id'])) ? ($_REQUEST['forme_id']) : false;

$error = array();

switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$forme_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$forme_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$forme_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$forme_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}

################################################################################
if (!$error) {

    switch ($_SESSION['order']['side']) {
        case 'L':
            if ($_SESSION['order']['forme_id']['L'] != $forme_id_array['L']) {
                $_SESSION['order']['forme_id']['L'] = $forme_id_array['L'];
                // reseteo 
                $_SESSION['order']['material_id'] = null;
                $_SESSION['order']['colour_id'] = null;
                $_SESSION['order']['option_id'] = null;
            }
            break;
        case 'R':
            if ($_SESSION['order']['forme_id']['R'] != $forme_id_array['R']) {
                $_SESSION['order']['forme_id']['R'] = $forme_id_array['R'];
                // reseteo 
                $_SESSION['order']['material_id'] = null;
                $_SESSION['order']['colour_id'] = null;
                $_SESSION['order']['option_id'] = null;
            }


            break;
        case 'S':

            if ($_SESSION['order']['forme_id']['L'] != $forme_id_array['L']) {
                $_SESSION['order']['forme_id']['L'] = $forme_id_array['L'];
                // reseteo 
                $_SESSION['order']['material_id']['L'] = null;
                $_SESSION['order']['colour_id']['L'] = null;
                $_SESSION['order']['option_id']['L'] = null;
            }


            if ($_SESSION['order']['forme_id']['R'] != $forme_id_array['R']) {
                $_SESSION['order']['forme_id']['R'] = $forme_id_array['R'];
                // reseteo 
                $_SESSION['order']['material_id']['R'] = null;
                $_SESSION['order']['colour_id']['R'] = null;
                $_SESSION['order']['option_id']['R'] = null;
            }



            break;

        default:
            break;
    }






    header("Location: index.php?c=shop&a=order_new_50#order");
} else {
    include view("home", "pageError");
}