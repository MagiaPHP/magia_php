<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

// M E S U R E S
include "order_new_00_REG.php";
$error = array();
/////////////////////////////////////////////////////////////////////////////////
if (!$order['patient_id']) {
    array_push($error, "You must choose the patient");
}
if (!$date_delivery && !$delivery_days) {
    array_push($error, "You must choose the date");
}
if (!$order['side']) {
    array_push($error, "You must choose the side");
}
//////////////////////////////////////////////////////////////////////////////////
if ($side == "L") {
    if (!$type_l_id) {
        array_push($error, "You must choose the type");
    }
    // modele
    if (!$modele_l_id) {
        array_push($error, "You must choose the modele");
    }
}
////////////////////////////////////////////////////////////////////////////////
if ($side == "R") {
    if (!$type_r_id) {
        array_push($error, "You must choose the type");
    }
    //modele
    if (!$modele_r_id) {
        array_push($error, "You must choose the modele");
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
    // modele
    if (!$modele_l_id) {
        array_push($error, "You must choose the modele");
    }
    if (!$modele_r_id) {
        array_push($error, "You must choose the modele");
    }
}

if (!$error) {

    switch ($side) {
        case 'L':
            //   $mesure_registred = ($mesure_l_id) ? true : false;
            $has_l_mresure = _modeles_mesures_by_modele_id($modele_l_id);
            $has_r_mresure = null;
            break;

        case 'R':
            //    $mesure_registred = ($mesure_r_id) ? true : false;
            $has_l_mresure = null;
            $has_r_mresure = _modeles_mesures_by_modele_id($modele_r_id);

            break;

        case 'S':
            //    $mesure_registred = ($mesure_l_id && $mesure_r_id) ? true : false;
            $has_l_mresure = _modeles_mesures_by_modele_id($modele_l_id);
            $has_r_mresure = _modeles_mesures_by_modele_id($modele_r_id);
            break;

        default:
            $mesure_registred = false;
            break;
    }


    ##############################    
    if (($has_l_mresure || $has_r_mresure)) {
        include view("shop", "order_new_30");
    } else {

        header("Location: index.php?c=shop&a=order_new_40");
    }
} else {

    include view("home", "pageError");
}
