<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$type_id = (!empty($_REQUEST['type_id'])) ? clean($_REQUEST['type_id']) : false;

$error = array();

if (!$type_id) {
    array_push($error, "You must choose a type");
}

################################################################################
if (!$error) {


    switch ($_SESSION['order']['side']) {
        case 'L':
            if ($_SESSION['order']['type_id']['L'] != $type_id) {
                $_SESSION['order']['type_id']['L'] = $type_id;
// reseteo                
                $_SESSION['order']['modele_id'] = null;
                $_SESSION['order']['mesure_id'] = null;
                // forme ya esta 
                $_SESSION['order']['material_id'] = null;
                $_SESSION['order']['colour_id'] = null;
                $_SESSION['order']['perte_id'] = null;
                $_SESSION['order']['marque_id'] = null;
                $_SESSION['order']['ecouteur_id'] = null;
                $_SESSION['order']['event_id'] = null;
                $_SESSION['order']['diametre_id'] = null;
                $_SESSION['order']['longuer_id'] = null;
                $_SESSION['order']['constitution_id'] = null;
                $_SESSION['order']['option_id'] = null;
                $_SESSION['order']['address_delivery'] = null;
            }

            if (_types_modeles_formes_search_modele_by_type_id($_SESSION['order']['type_id']['L'])) {
                $next = "order_new_20";
            } else {
                $next = "order_new_40";
            }


            break;

        case 'R':
            if ($_SESSION['order']['type_id']['R'] != $type_id) {
                $_SESSION['order']['type_id']['R'] = $type_id;
// reseteo                
                $_SESSION['order']['modele_id'] = null;
                $_SESSION['order']['mesure_id'] = null;
                // forme ya esta 
                $_SESSION['order']['material_id'] = null;
                $_SESSION['order']['colour_id'] = null;
                $_SESSION['order']['perte_id'] = null;
                $_SESSION['order']['marque_id'] = null;
                $_SESSION['order']['ecouteur_id'] = null;
                $_SESSION['order']['event_id'] = null;
                $_SESSION['order']['diametre_id'] = null;
                $_SESSION['order']['longuer_id'] = null;
                $_SESSION['order']['constitution_id'] = null;
                $_SESSION['order']['option_id'] = null;
                $_SESSION['order']['address_delivery'] = null;
            }

            if (_types_modeles_formes_search_modele_by_type_id($_SESSION['order']['type_id']['R'])) {
                $next = "order_new_20";
            } else {
                $next = "order_new_40";
            }


            break;

        case 'S':
            if ($_SESSION['order']['type_id']['L'] != $type_id) {

                $_SESSION['order']['type_id']['L'] = $type_id;
                $_SESSION['order']['type_id']['R'] = $type_id;
// reseteo                
                $_SESSION['order']['modele_id'] = null;
                $_SESSION['order']['mesure_id'] = null;
                // forme ya esta 
                $_SESSION['order']['material_id'] = null;
                $_SESSION['order']['colour_id'] = null;
                $_SESSION['order']['perte_id'] = null;
                $_SESSION['order']['marque_id'] = null;
                $_SESSION['order']['ecouteur_id'] = null;
                $_SESSION['order']['event_id'] = null;
                $_SESSION['order']['diametre_id'] = null;
                $_SESSION['order']['longuer_id'] = null;
                $_SESSION['order']['constitution_id'] = null;
                $_SESSION['order']['option_id'] = null;
                $_SESSION['order']['address_delivery'] = null;
            }

            if (
                    _types_modeles_formes_search_modele_by_type_id($_SESSION['order']['type_id']['L']) ||
                    _types_modeles_formes_search_modele_by_type_id($_SESSION['order']['type_id']['R'])
            ) {
                $next = "order_new_20";
            } else {
                $next = "order_new_40";
            }


            break;

        default:
            $next = "order_new_20";
            break;
    }



    header("Location: index.php?c=shop&a=$next#order");

//    if (_types_modeles_formes_search_modele_by_type_id($_SESSION['order']['type_id']['L'])) {
//        
//        header("Location: index.php?c=shop&a=order_new_20");
//        
//    } else {
//        header("Location: index.php?c=shop&a=order_new_40");
//    }
} else {
    include view("home", "pageError");
}