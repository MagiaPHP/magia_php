<?php

if (!permissions_has_permission($u_rol, "users", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$contact_id = (isset($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
//$ap = (isset($_REQUEST['ap'])) ? clean($_REQUEST['ap']) : false;
$np = (isset($_REQUEST['np'])) ? ($_REQUEST['np']) : false;
$rp = (isset($_REQUEST['rp'])) ? ($_REQUEST['rp']) : false;

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$redi = (isset($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : false;

$error = array();

if (!($contact_id)) {
    array_push($error, '$contact_id dont send');
}
//------------------------------------------------------------------------------
if (!is_id($contact_id)) {
    array_push($error, '$contact_id format incorrect');
}

if (!$np) {
    array_push($error, "New Password dont send");
}
if (!$rp) {
    array_push($error, "Repete Password dont send");
}

if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $contact_id))) {
    array_push($error, "You cannot change the password of a user with a higher rank");
}

/*
  if( ! password_verify($ap, users_password())  ){
  array_push($error, "Actual Password incorrect");
  }
 * 
 */

if ($np != $rp) {
    array_push($error, "Password not the same");
}



$isError = passwordIsGood($np);

if ($isError) {
    foreach ($isError as $key => $value) {
        array_push($error, $value);
    }
}



################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
$password = password_hash($np, PASSWORD_DEFAULT);

################################################################################
# proceso
################################################################################

if (!$error) {

    // update password
    contacts_password_update($contact_id, $password);

    ############################################################################
    $data = json_encode(array(
        null, $contact_id
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
    $description = "Update password user id: $contact_id ";
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
            header("Location: index.php?c=contacts&a=system&id=$contact_id&smst=success&smsm=Password update");
            break;

        case 2:
            header("Location: index.php?c=contacts&a=users&id=$id&smst=success&smsm=Password update");
            break;

        default:
            break;
    }
} else {

    include view("home", "pageError");
}
