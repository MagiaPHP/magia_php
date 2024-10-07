<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
// longeur
include "order_new_00_REG.php";
$error = array();
if (!$order['patient_id']) {
    array_push($error, "You must choose the patient");
}
if (!$date_delivery && !$delivery_days) {
    array_push($error, 'Select shipping date');
}
if (!$order['side']) {
    array_push($error, "You must choose the side");
}
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
if ($side == "L") {
    if (!$type_l_id) {
        array_push($error, "You must choose the type");
    }
}
////////////////////////////////////////////////////////////////////////////////
if ($side == "R") {
    if (!$type_r_id) {
        array_push($error, "You must choose the type");
    }
}
////////////////////////////////////////////////////////////////////////////////
if ($side == "S") {
    if (!$type_l_id) {
        array_push($error, "You must choose the type");
    }
    if (!$type_r_id) {
        array_push($error, "You must choose the type");
    }
}
//if( ! $modele_l_id    ){ array_push($error, "You must choose the modele"); }
//if( ! $mesure_l_id    ){ array_push($error, "You must choose the mesure"); }
//if( ! $forme_l_id) {array_push($error, "You must choose the form");}
//if( ! $material_l_id  ){ array_push($error, "You must choose material"); }
//if( ! $colour_l_id    ){ array_push($error, "You must choose color"); }
//if( ! $perte_l_id     ){ array_push($error, "You must choose hearing loss"); }
//if( ! $marque_l_id    ){ array_push($error, "You must choose brand"); }
//if( ! $ecouteur_l_id  ){ array_push($error, "You must choose hearphone"); }
//if( ! $event_l_id     ){ array_push($error, "You must choose event"); }
//if( ! $diametre_l_id  ){ array_push($error, "You must choose diameter"); }
//if( ! $option_l_id    ){ array_push($error, "You must choose option"); }
//if( ! $longuer_l_id  ){ array_push($error, "You must choose length"); }
//if( ! $constitution_l_id ){ array_push($error, "You must choose contitution"); }
if (!$error) {
    switch ($side) {
        case 'L':
            //    $longuer_registred = ($longuer_l_id) ? true : false;
            $has_l_longuer = _type_longuer_conduit_list_by_type($type_l_id);
            $has_r_longuer = null;
            break;
        case 'R':
            //    $longuer_registred = ($longuer_r_id) ? true : false;
            $has_l_longuer = null;
            $has_r_longuer = _type_longuer_conduit_list_by_type($type_r_id);
            break;
        case 'S':
            //    $longuer_registred = ($longuer_l_id && $longuer_r_id) ? true : false;
            $has_l_longuer = _type_longuer_conduit_list_by_type($type_l_id);
            $has_r_longuer = _type_longuer_conduit_list_by_type($type_r_id);
            break;
        default:
            //    $longuer_registred = false;
            break;
    }
    ##############################    
    if (($has_l_longuer || $has_r_longuer)) {
        include view("shop", "order_new_9040");
    } else {
        header("Location: index.php?c=shop&a=order_new_9050");
    }
} else {
    include view("home", "pageError");
}