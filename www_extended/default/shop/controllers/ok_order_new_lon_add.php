<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//ok 
$longuer_id_array = (!empty($_REQUEST['longuer_id'])) ? ($_REQUEST['longuer_id']) : false;

$error = array();
switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$longuer_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$longuer_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$longuer_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$longuer_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}

################################################################################
if (!$error) {
    if ($longuer_id_array['L']) {
        $_SESSION['order']['longuer_id']['L'] = $longuer_id_array['L'];
    }

    if ($longuer_id_array['R']) {
        $_SESSION['order']['longuer_id']['R'] = $longuer_id_array['R'];
    }


    header("Location: index.php?c=shop&a=order_new_9050#order");
} else {
    include view("home", "pageError");
}