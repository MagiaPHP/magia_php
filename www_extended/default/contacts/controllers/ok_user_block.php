<?php

if (!permissions_has_permission($u_rol, "users", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$redi = (isset($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : false;
$error = array();

//------------------------------------------------------------------------------
if (!$contact_id) {
    array_push($error, 'contact_id dont send');
}
//------------------------------------------------------------------------------

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format incorrect');
}

if (users_rol_according_contact_id($contact_id) == "root") {
    array_push($error, 'Seriously... you want block root user?');
}

if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $contact_id))) {
    array_push($error, "You cannot block a user with a higher rank");
}


################################################################################

if (!$error) {

    contacts_block($contact_id);

    ############################################################################
    $data = json_encode(array(
        $contact_id
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Block user $contact_id";
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
            header("Location: index.php?c=contacts&a=system&id=$contact_id&smst=success&smsm=contact blocked");
            break;
        case 2:
            header("Location: index.php?c=contacts&a=users&id=$id&smst=success&smsm=contact blocked");
            break;

        default:
            header("Location: index.php?c=contacts&a=system&id=$contact_id&smst=success&smsm=contact blocked");
            break;
    }
} else {

    include view("home", "pageError");
}