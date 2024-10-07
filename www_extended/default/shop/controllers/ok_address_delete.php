<?php

/**
 * Me hice unos rollos terribles y ya no se como s borra la direccion 
 * mejor dicho com overificar para borarla
 * por eso se desactia
 * 
 
if (!permissions_has_permission($u_rol, "shop_addresses", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$address_id = (!empty($_POST['address_id'])) ? intval(clean($_POST['address_id'])) : false;
$id = (!empty($_POST['id'])) ? intval(clean($_POST['id'])) : false;
$redi = (!empty($_POST['redi'])) ? intval(clean($_POST['redi'])) : false;

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$address_id) {
    array_push($error, "id is mandatory");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($address_id)) {
    array_push($error, "Id format error");
}
if (!addresses_field_id('id', $address_id)) {
    array_push($error, 'Address does not exist');
}
// Esta direecion debe pertenecer a la oficina que esta entre las oficinas de esta empresa

$office_id = addresses_field_id('contact_id', $address_id);

// si la sede de la oficina es diferente a la empresa donde trabajo, 
// error 
if (offices_headoffice_of_office($office_id) !== contacts_work_for($u_id)) {
    array_push($error, 'Address does not belong to you');
}
// puede editar otras direcciones?
if (!users_can_update_others_offices($u_id)) {
    array_push($error, "You can not update others offices");
}

// puede editar otras direcciones?
if (addresses_field_id('name', $address_id) == 'Billing') {
    array_push($error, 'You cannot delete a billing address');
}

//vardump($office_id);
//vardump($office_id);
//die(); 

################################################################################
# proceso
# if name, lastname an bd is not change, yes you can edit title
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    shop_address_delete($address_id, $office_id);
    
    
    shop_address_details($id);

    switch ($redi) {
        case 1:
            header("Location: index.php?c=shop&a=adresses_by_office&id=$id");
            break;

        default:
            header("Location: index.php?c=shop");
            break;
    }
} else {


    include view("home", "pageError");
}


*/