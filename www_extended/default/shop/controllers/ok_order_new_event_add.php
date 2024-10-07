<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$event_id_array = (!empty($_REQUEST['event_id'])) ? ($_REQUEST['event_id']) : false;

$error = array();
switch ($_SESSION['order']['side']) {
    case 'L':
        if (!$event_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        break;
    case 'R':
        if (!$event_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;
    case 'S':
        if (!$event_id_array['L']) {
            array_push($error, "You must choose an option on the left side");
        }
        if (!$event_id_array['R']) {
            array_push($error, "You must choose an option on the right side");
        }
        break;

    default:
        break;
}

################################################################################
if (!$error) {

    // si lo que viene es diferente a lo que hay 
    // cambio y reseteo diametro 
    // dejo igual


    switch ($_SESSION['order']['side']) {
        case 'L':
            if ($event_id_array['L'] != $_SESSION['order']['event_id']['L']) {

                if ($event_id_array['L']) {
                    $_SESSION['order']['event_id']['L'] = $event_id_array['L'];
                }

//                if ($event_id_array['R']) {
//                    $_SESSION['order']['event_id']['R'] = $event_id_array['R'];
//                }
            }

            $_SESSION['order']['diametre_id'] = null;

            break;
        case 'R':
            if (
                    $event_id_array['R'] != $_SESSION['order']['event_id']['R']
            ) {
//                
//                if ($event_id_array['L']) {
//                    $_SESSION['order']['event_id']['L'] = $event_id_array['L'];
//                }

                if ($event_id_array['R']) {
                    $_SESSION['order']['event_id']['R'] = $event_id_array['R'];
                }

                $_SESSION['order']['diametre_id'] = null;
            }
            break;
        case 'S':


            if (($event_id_array['L'] != $_SESSION['order']['event_id']['L']) ||
                    ($event_id_array['R'] != $_SESSION['order']['event_id']['L'])
            ) {

                if ($event_id_array['L']) {
                    $_SESSION['order']['event_id']['L'] = $event_id_array['L'];
                }

                if ($event_id_array['R']) {
                    $_SESSION['order']['event_id']['R'] = $event_id_array['R'];
                }

                $_SESSION['order']['diametre_id'] = null;
            }
            break;

        default:
            break;
    }


    header("Location: index.php?c=shop&a=order_new_9020#order");
} else {
    include view("home", "pageError");
}