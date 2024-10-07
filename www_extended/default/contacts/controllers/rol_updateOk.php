<?php

if (!permissions_has_permission($u_rol, "rols", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$rol = (isset($_REQUEST['rol'])) ? clean($_REQUEST['rol']) : false;
$redi = (isset($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : false;
$error = array();

if (!($contact_id)) {
    array_push($error, 'contact_id dont send');
}
if (!$rol) {
    array_push($error, "Rol dont send");
}

//------------------------------------------------------------------------------
if (!is_id($contact_id)) {
    array_push($error, 'contact_id format incorrect');
}

// rangos de 10 para abajo si es externo 
// saco el rol 
// saco el rango 
// si no trabaja para 1022 solo rangos 10 para abajo 
//$newRango = rols_rango_by_rol($rol);
//$actualRango = rols_rango_by_rol(users_rol_according_contact_id($contact_id));
//// si el rol actual tiene rango uno, no puede usar otro tipo de rango 
//
//$actualRango = rols_rango_by_rol(users_rol_according_contact_id($contact_id));
//
//$newRango = rols_rango_by_rol($rol);
//
//// si el rango actual es de 1, solo se puede agregar un rol de rango 1
//// esto es para evitar que usuarios externos se agregen roles internos
////
//if ($actualRango == 1 && ($newRango > 1)) {
//    array_push($error, "You cannot assign this type of role to a user external to the company");
//}
//// Solo puede existir un root en el sistema
//if ($rol == 'root') {
//    array_push($error, 'Only one root can exist on the system');
//}
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
################################################################################
################################################################################

if (!$error) {

    users_rol_update($contact_id, $rol);

    ############################################################################
    $data = json_encode(array(
        null, $contact_id, $rol
    ));
    $error = json_encode($error);
    $level = 2; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "contacts";
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Change user role, user: [$contact_id] new role [$rol] ";
    $doc_id = $contact_id;
    $crud = "update";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################  



    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=system&id=$contact_id&smst=success&smsm=Rol update");
            break;

        case 2:
            header("Location: index.php?c=contacts&a=users&id=$id&smst=success&smsm=Rol update");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {
    include view("home", "pageError");
}





