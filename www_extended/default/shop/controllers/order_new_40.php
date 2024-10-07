<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

// FORMES

include "order_new_00_REG.php";

$error = array();
//
if (!$patient_id) {
    array_push($error, 'Select a patient');
}
//if( ! $order['date_delivery']){ array_push($error, "You must choose the date"); }
if (!$order['side']) {
    array_push($error, "You must choose the side");
}

if (!$date_delivery && !$delivery_days) {
    array_push($error, 'Select shipping date');
}

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
    //
}

if (!$error) {

    switch ($side) {
        case 'L':
            //    $forme_registred = ($forme_l_id) ? true : false;
            $has_l_forme = _types_modeles_formes_search_by_type_modele($type_l_id, $modele_l_id);
            $has_r_forme = false;
            break;

        case 'R':
            //    $forme_registred = ($forme_r_id) ? true : false;
            $has_r_forme = _types_modeles_formes_search_by_type_modele($type_r_id, $modele_r_id);
            $has_l_forme = false;
            break;

        case 'S':
            //    $forme_registred = ($forme_l_id && $forme_r_id) ? true : false;
            $has_l_forme = _types_modeles_formes_search_by_type_modele($type_l_id, $modele_l_id);
            $has_r_forme = _types_modeles_formes_search_by_type_modele($type_r_id, $modele_r_id);
            break;

        default:
            $forme_registred = false;
            break;
    }


    ##############################    
    if (($has_l_forme || $has_r_forme)) {
        include view("shop", "order_new_40");
    } else {

        header("Location: index.php?c=shop&a=order_new_50");
    }
} else {

    include view("home", "pageError");
}
