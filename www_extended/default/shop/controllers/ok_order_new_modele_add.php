<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$modele_id_array = (!empty($_REQUEST['modele_id'])) ? ($_REQUEST['modele_id']) : false;

$error = array();

switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$modele_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$modele_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$modele_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$modele_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}


################################################################################
if (!$error) {

    if ($modele_id_array['L']) {
        // si el modelo es diferente 

        $_SESSION['order']['modele_id']['L'] = $modele_id_array['L'];
    }

    if ($modele_id_array['R']) {
        $_SESSION['order']['modele_id']['R'] = $modele_id_array['R'];
    }



    header("Location: index.php?c=shop&a=order_new_30#order");
} else {
    include view("home", "pageError");
}