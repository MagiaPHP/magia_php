<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
// diametre
include "order_new_00_REG.php";
$error = array();

if (!$patient_id) {
    array_push($error, 'Select a patient');
}


// si el tipo no tien event, se va directo al 40
if (
        $side == 'L' && !_type_event_list_by_type($type_l_id) ||
        $side == 'R' && !_type_event_list_by_type($type_r_id) ||
        $side == 'S' && !_type_event_list_by_type($type_l_id)
) {
    header("Location: index.php?c=shop&a=order_new_9040&typesinevent");
}


if (!$date_delivery && !$delivery_days) {
    array_push($error, 'Select shipping date');
}
if (!$order['side']) {
    array_push($error, "You must choose the side");
}
//------------------------------------------------------------------------------
//if (!$type_l_id) {array_push($error, "You must choose the type");}
//if( ! $modele_l_id    ){ array_push($error, "You must choose the modele"); }
//if( ! $mesure_l_id    ){ array_push($error, "You must choose the mesure"); }
//if( ! $forme_l_id) {array_push($error, "You must choose the form");}
//if( ! $material_l_id  ){ array_push($error, "You must choose material"); }
//if( ! $colour_l_id    ){ array_push($error, "You must choose color"); }
//if( ! $perte_l_id     ){ array_push($error, "You must choose hearing loss"); }
//if( ! $marque_l_id    ){ array_push($error, "You must choose brand"); }
//if( ! $ecouteur_l_id  ){ array_push($error, "You must choose hearphone"); }
switch ($side) {
    case 'L':
        if (!$event_l_id) {
            array_push($error, "You must choose event L");
        }
        break;
    case 'R':
        if (!$event_r_id) {
            array_push($error, "You must choose event R");
        }
        break;
    case 'S':
        if (!$event_l_id) {
            array_push($error, "You must choose event Ls");
        }
        if (!$event_r_id) {
            array_push($error, "You must choose event Rs");
        }
        break;

    default:
        break;
}
//if( ! $diametre_l_id  ){ array_push($error, "You must choose diameter"); }
//if( ! $option_l_id    ){ array_push($error, "You must choose option"); }
//if( ! $longueur_l_id  ){ array_push($error, "You must choose length"); }
//if( ! $constitution_l_id ){ array_push($error, "You must choose contitution"); }
if (!$error) {
    switch ($side) {
        case 'L':
            //  $diametre_registred = ($diametre_l_id) ? true : false;
            $has_l_diametre = _event_diametre_list_by_event($event_l_id);
            $has_r_diametre = null;
            break;
        case 'R':
            //    $diametre_registred = ($diametre_r_id) ? true : false;
            $has_l_diametre = null;
            $has_r_diametre = _event_diametre_list_by_event($event_r_id);
            break;
        case 'S':
            //    $diametre_registred = ($diametre_l_id && $diametre_r_id) ? true : false;
            $has_l_diametre = _event_diametre_list_by_event($event_l_id);
            $has_r_diametre = _event_diametre_list_by_event($event_r_id);
            break;
        default:
            //    $diametre_registred = false;
            break;
    }
    ##############################    
    if (($has_l_diametre || $has_r_diametre)) {
        include view("shop", "order_new_9020");
    } else {
        header("Location: index.php?c=shop&a=order_new_9030");
    }
} else {
    include view("home", "pageError");
}