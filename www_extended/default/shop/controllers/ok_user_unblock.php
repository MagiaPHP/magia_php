<?php

if (!permissions_has_permission($u_rol, "shop_users", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$contact_id = (!empty($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
$error = array();

//------------------------------------------------------------------------------
if (!$contact_id) {
    array_push($error, 'contact_id dont send');
}
//------------------------------------------------------------------------------

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format incorrect');
}

if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $contact_id))) {
    array_push($error, "You cannot block a user with a higher rank");
}


////////////////////////////////////////////////////////////////////////////////

if (permissions_has_permission($u_rol, "shop_offices", "create")) {
    // ver todos los contactos de la empresa    
    if (contacts_work_for($contact_id) !== contacts_work_for($u_id)) {
        array_push($error, "This contact dont work for your company");
    }
} else {
    // solo los de mi oficina

    if (contacts_work_at($contact_id) !== contacts_work_at($u_id)) {
        array_push($error, "This contact dont work for your office");
    }
}




################################################################################

if (!$error) {

    contacts_unblock($contact_id);

    header("Location: index.php?c=shop&a=contacts_system&id=$contact_id&ok");
} else {

    include view("home", "pageError");
}



############################################################################
$data = json_encode(array(
    "contact" => $contact_id
        ));
$error = json_encode($error);
$level = 2; // 1 atention, 2 medio, 3 critico, 4 fatal
$date = null;
//$u_id
//$u_rol , 
//$c = "orders" ;
//$a = "Change order status" ;
$w = null;
// $txt
$description = "User unblock: $contact_id, data: $data";
$doc_id = $contact_id;
$crud = "update";
//$error = null ;
$val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
$val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
$val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
$ip4 = get_user_ip();
$ip6 = get_user_ip6();
$broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
logs_add(
        $level, $date, $u_id, $u_rol, $c, $a, $w,
        $description, $doc_id, $crud, $error,
        $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
);
############################################################################ 