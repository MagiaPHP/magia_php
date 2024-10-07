<?php

if (!permissions_has_permission($u_rol, "shop_system", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}


$contact_id = (!empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$rol = (!empty($_POST['rol'])) ? clean($_POST['rol']) : false;
$error = array();

if (!($contact_id)) {
    array_push($error, 'contact_id dont send');
}
//------------------------------------------------------------------------------
if (!is_id($contact_id)) {
    array_push($error, 'contact_id format incorrect');
}



if (!$rol) {
    array_push($error, "Rol dont send");
}

// si el rol actual tiene rango uno, no puede usar otro tipo de rango 
//$actualRango = rols_rango_by_rol(users_rol_according_contact_id($contact_id)) ;

$newRango = rols_rango_by_rol($rol);

// si el rango actual es de 1, solo se puede agregar un rol de rango 1
// esto es para evitar que usuarios externos se agregen roles internos
//
if ($newRango > $config_rango_max_for_labo) {
    array_push($error, "You cannot assign this type of role to a user external to the company");
}

// Solo puede existi un root en el sistema
if ($rol == 'root') {
    array_push($error, 'Only one root can exist on the system');
}

################################################################################
# proceso
// no puedo editar un rol que tiene un rango superior
if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $contact_id))) {
    array_push($error, "You cannot change the rol of a user with a higher rank");
}

// no puedo dar un rango que sea superior al mio
if (rols_rango_by_rol($rol) > rols_rango_by_rol($u_rol)) {
    array_push($error, "You cannot assign ranks higher than yours");
}

if (contacts_work_for($contact_id) != contacts_work_for($u_id)) {
    array_push($error, "This is not a contact for your company");
}
################################################################################
################################################################################

if (!$error) {

    users_rol_update($contact_id, $rol);

    header("Location: index.php?c=shop&a=contacts_system&id=$contact_id&sms=1");
} else {

    include view("home", "pageError");
}





