<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
// options
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
//if (!$type_l_id) {array_push($error, "You must choose the type");}
//if( ! $modele_l_id    ){ array_push($error, "You must choose the modele"); }
//if( ! $mesure_l_id    ){ array_push($error, "You must choose the mesure"); }
//if( ! $forme_l_id) {array_push($error, "You must choose the form");}
if ($side == "L") {
    if (!$material_l_id) {
        array_push($error, "You must choose material");
    }
    //
    if (!$tmf_l_id) {
        array_push($error, "You must choose material");
    }
}
if ($side == "R") {
    if (!$material_r_id) {
        array_push($error, "You must choose material");
    }
    //
    if (!$tmf_r_id) {
        array_push($error, "You must choose material");
    }
}
if ($side == "S") {
    if (!$material_l_id) {
        array_push($error, "You must choose material");
    }
    if (!$material_r_id) {
        array_push($error, "You must choose material");
    }
    //
    if (!$tmf_l_id) {
        array_push($error, "You must choose material");
    }
    if (!$tmf_r_id) {
        array_push($error, "You must choose material");
    }
}

//if( ! $colour_l_id    ){ array_push($error, "You must choose color"); }
//if( ! $perte_l_id     ){ array_push($error, "You must choose hearing loss"); }
//if( ! $marque_l_id    ){ array_push($error, "You must choose brand"); }
//if( ! $ecouteur_l_id  ){ array_push($error, "You must choose hearphone"); }
//if( ! $event_l_id     ){ array_push($error, "You must choose event"); }
//if( ! $diametre_l_id  ){ array_push($error, "You must choose diameter"); }
//if( ! $option_l_id    ){ array_push($error, "You must choose option"); }
//if( ! $longueur_l_id  ){ array_push($error, "You must choose length"); }
//if( ! $constitution_l_id ){ array_push($error, "You must choose contitution"); }
if (!$error) {
    switch ($side) {
        case 'L':
            //    $options_registred = ($option_l_id) ? true : false;            
            $has_l_options = _tmf_materials_options_search_options_by_tmf_material_id($tmf_l_id, $material_l_id);
            $has_r_options = null;
            break;
        case 'R':
            //    $options_registred = ($option_r_id) ? true : false;
            $has_l_options = null;
            $has_r_options = _tmf_materials_options_search_options_by_tmf_material_id($tmf_r_id, $material_r_id);
            break;
        case 'S':
            //    $options_registred = ($option_l_id && $option_r_id) ? true : false;
            $has_l_options = _tmf_materials_options_search_options_by_tmf_material_id($tmf_l_id, $material_l_id);
            $has_r_options = _tmf_materials_options_search_options_by_tmf_material_id($tmf_r_id, $material_r_id);
            break;
        default:
            //    $options_registred = false;
            break;
    }
    ##############################    
    if (($has_l_options || $has_r_options)) {
        include view("shop", "order_new_9060");
    } else {
        header("Location: index.php?c=shop&a=order_new_9070");
    }
} else {
    include view("home", "pageError");
}