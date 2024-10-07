<?php

if (!permissions_has_permission($u_rol, "rols", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}
/**
 * Cambia de oficina un contacto 
 * debe cambiar de oficina y de empleado git commti 
 */
/**
$contact_id = (isset($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
$office_id = (isset($_REQUEST['office_id'])) ? clean($_REQUEST['office_id']) : false;
$redi = (isset($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : false;


$error = array();
////////////////////////////////////////////////////////////////////////////////
if (!($contact_id)) {
    array_push($error, '$contact_id dont send');
}
if (!($office_id)) {
    array_push($error, '$office_id dont send');
}
//------------------------------------------------------------------------------
if (!contacts_is_id($contact_id)) {
    array_push($error, 'contact_id format incorrect');
}
if (!contacts_is_id($office_id)) {
    array_push($error, '$office_id format incorrect');
}
////////////////////////////////////////////////////////////////////////////////
// CONDICIONALES
if (contacts_why_cannot_change_office($contact_id)) {
    array_merge($error, contacts_why_cannot_change_office($contact_id));
}

################################################################################
# 
################################################################################
################################################################################

if (!$error) {

    // cambio de oficina
    contacts_update_owner_id($contact_id, $office_id);

    // registro como empleado en esa oficina    
    contacts_update_company_id($contact_id, $office_id);





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
    $description = "Change office, contact: [$contact_id] new office [$office_id] ";
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
            header("Location: index.php?c=contacts&a=details&id=$contact_id&smst=success&smsm=Updated#1");
            break;

        default:

            header("Location: index.php?c=contacts&a=system&id=$contact_id&smst=success&smsm=Rol update");
            break;
    }
} else {
    include view("home", "pageError");
}


*/


