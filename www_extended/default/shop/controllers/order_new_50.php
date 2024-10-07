<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
// Material
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

    if (!$tmf_l_id) {
        array_push($error, "You must choose the tmf_l_id");
    }
}
////////////////////////////////////////////////////////////////////////////////
if ($side == "R") {
    if (!$type_r_id) {
        array_push($error, "You must choose the type");
    }
    //
    if (!$tmf_r_id) {
        array_push($error, "You must choose the tmf_r_id");
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
    if (!$tmf_l_id) {
        array_push($error, "You must choose the tmf_l_id");
    }
    if (!$tmf_r_id) {
        array_push($error, "You must choose the tmf_r_id");
    }
}
//if( ! $modele_l_id    ){ array_push($error, "You must choose the modele"); }
//if( ! $mesure_l_id    ){ array_push($error, "You must choose the mesure"); }
//if (!$forme_l_id) {
//    array_push($error, "You must choose the form");
//}
//if( ! $material_l_id  ){ array_push($error, "You must choose material"); }
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
            //$material_registred = ($material_l_id) ? true : false;
            $has_l_material = _tmf_material_search_by_tmf_id($tmf_l_id);
            $has_r_material = null;
            break;
        case 'R':
            //    $material_registred = ($material_r_id) ? true : false;
            $has_r_material = _tmf_material_search_by_tmf_id($tmf_r_id);
            $has_l_material = null;
            break;
        case 'S':
            //    $material_registred = ($material_l_id && $material_r_id) ? true : false;
            $has_l_material = _tmf_material_search_by_tmf_id($tmf_l_id);
            $has_r_material = _tmf_material_search_by_tmf_id($tmf_r_id);
            break;
        default:
            $material_registred = false;
            break;
    }
    ##############################    
    if (($has_l_material || $has_r_material)) {
        include view("shop", "order_new_50");
    } else {
        header("Location: index.php?c=shop&a=order_new_60");
    }
} else {
    include view("home", "pageError");
}



/*
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// M A T E R I A L


include "order_new_00_REG.php";

$error = array();

////////////////////////////////////////////////////////////////////////////////
// si no hay tipo error

if (!$error) {


    switch ($side) {
        case 'L':
            //_tmf_material_search_by_tmf_id
            // si no tiene aun una forma, 
            if (_tmf_material_search_by_tmf_id($tmf_l_id) && !$material_l_id) {

                include view("shop", "order_new_50");
            } else {
                // sino pasamos a formas
                header("Location: index.php?c=shop&a=order_new_60&order_id=$order_id");
            }

            break;
        case 'R':
            //_tmf_material_search_by_tmf_id
            // si no tiene aun una forma, 
            if (_tmf_material_search_by_tmf_id($tmf_r_id) && !$material_r_id) {

                include view("shop", "order_new_50");
            } else {
                // sino pasamos a formas
                header("Location: index.php?c=shop&a=order_new_60&order_id=$order_id");
            }


            break;
        case 'S':
            //_tmf_material_search_by_tmf_id
            // si no tiene aun una forma, 
            if (
                    ( _tmf_material_search_by_tmf_id($tmf_l_id) && !$material_l_id) ||
                    ( _tmf_material_search_by_tmf_id($tmf_r_id) && !$material_r_id)
            ) {

                include view("shop", "order_new_50");
            } else {
                // sino pasamos a formas
                header("Location: index.php?c=shop&a=order_new_60&order_id=$order_id");
            }

            break;

        default:
            break;
    }
} else {

    include view("home", "pageError");
}
 * 
 */
