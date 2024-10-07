<?php

if (!permissions_has_permission($u_rol, "users", "delete")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$login = (isset($_REQUEST['login'])) ? clean($_REQUEST['login']) : false;
$i_want = (isset($_REQUEST['i_want'])) ? clean($_REQUEST['i_want']) : false;
$redi = (isset($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : false;
$error = array();

//------------------------------------------------------------------------------
if (!$contact_id) {
    array_push($error, 'contact_id dont send');
}
if (!$login) {
    array_push($error, '$login dont send');
}
if (!$i_want) {
    array_push($error, '$i_want dont send');
}
//------------------------------------------------------------------------------

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format incorrect');
}

if (users_rol_according_contact_id($contact_id) == "root") {
    array_push($error, 'Seriously... you want delete root user?');
}

if (!users_according_login($login)) {
    array_push($error, 'Login dont find');
}

if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $contact_id))) {
    array_push($error, "You cannot delete a user with a higher rank");
}


################################################################################

if (!$error) {

    users_delete_contact_id_login($contact_id, $login);

    ############################################################################
    $data = json_encode(array(
        $contact_id, $login
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "users";
    $a = "delete";
    $w = null;
    // $txt
    $description = "Delete user $contact_id ($login)";
    $doc_id = $contact_id;
    $crud = "delete";
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
            header("Location: index.php?c=contacts&a=system&id=$id&smst=success&smsm=User deleted");
            break;

        default:
            header("Location: index.php?c=contacts&smst=success&smsm=User deleted");
            break;
    }
} else {

    include view("home", "pageError");
}