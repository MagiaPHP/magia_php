<?php

if (!permissions_has_permission($u_rol, "shop_myinfo", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$my_title = (!empty($_POST['my_title'])) ? clean($_POST['my_title']) : false;
$my_name = (!empty($_POST['my_name'])) ? clean($_POST['my_name']) : false;
$my_lastname = (!empty($_POST['my_lastname'])) ? clean($_POST['my_lastname']) : false;

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$u_owner_id) {
    array_push($error, '$u_owner_id not send');
}
if (!$my_name) {
    array_push($error, '$my_name not send');
}
if (!$my_lastname) {
    array_push($error, '$my_lastname not send');
}

################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($u_owner_id)) {
    array_push($error, "Error in price");
}

################################################################################
# proceso
################################################################################
if (!$error) {

    shop_contacts_update_name_lastname(
            $my_title, $my_name, $my_lastname
    );

//    foreach ( $_POST["directory"] as $key => $value ) {
//        if ( $value ) {
//            directory_add($u_owner_id , null , clean($key) , clean($value) , 1 , 1) ;
//        }
//    }


    header("Location: index.php?c=shop&a=myInfo");
} else {

    include view("home", "pageError");
}




