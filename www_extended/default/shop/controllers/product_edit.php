<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

# Recolection de variables desde el formulario

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();

# Verificacion de varialbes obligatorias

if (!$id) {
    array_push($error, "id not send");
}

# Verification de formato de variables 
// Verifica que sea un id valido
if (!is_id($id)) {
    array_push($error, "Error in price");
}

# ##############################################################################
//if ( users_can_see_others_offices($u_id) ) {
//    if ( contacts_headoffice_of_contact_id($id) !== contacts_headoffice_of_contact_id($u_id) ) {
//
//        array_push($error , "This contact does not belong to your company") ;
//    }
//} else {
//    if ( contacts_field_id("owner_id" , $id) !== contacts_work_at($u_id) ) {
//        array_push($error , "This contact does not belong to your office") ;
//    }
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    $product = shop_product_details($id);

    include view("shop", "product_details");
} else {

    include view("home", "pageError");
}


