<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$marque_id_array = (!empty($_REQUEST['marque_id'])) ? ($_REQUEST['marque_id']) : false;

$error = array();
switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$marque_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$marque_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$marque_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$marque_id_array['R']) {
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
            if ($_SESSION['order']['marque_id']['L'] != $marque_id_array['L']) {
                $_SESSION['order']['marque_id']['L'] = $marque_id_array['L'];
                // reseteo
                $_SESSION['order']['ecouteur_id'] = null;
            }
            break;

        case 'R':
            if ($_SESSION['order']['marque_id']['R'] != $marque_id_array['R']) {
                $_SESSION['order']['marque_id']['R'] = $marque_id_array['R'];
                // reseteo
                $_SESSION['order']['ecouteur_id'] = null;
            }
            break;
        case 'S':
            if ($_SESSION['order']['marque_id']['L'] != $marque_id_array['L']) {
                $_SESSION['order']['marque_id']['L'] = $marque_id_array['L'];
                // reseteo
                $_SESSION['order']['ecouteur_id']['L'] = null;
            }

            if ($_SESSION['order']['marque_id']['R'] != $marque_id_array['R']) {
                $_SESSION['order']['marque_id']['R'] = $marque_id_array['R'];
                // reseteo
                $_SESSION['order']['ecouteur_id']['R'] = null;
            }


            break;

        default:
            break;
    }





    if ($marque_id_array['L']) {
        $_SESSION['order']['marque_id']['L'] = $marque_id_array['L'];
    }

    if ($marque_id_array['R']) {
        $_SESSION['order']['marque_id']['R'] = $marque_id_array['R'];
    }



    header("Location: index.php?c=shop&a=order_new_90#order");
} else {
    include view("home", "pageError");
}