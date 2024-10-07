<?php

if (!permissions_has_permission($u_rol, "users", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//
$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$rol = (($_POST['rol']) != "" ) ? clean($_POST['rol']) : false;
$login = (($_POST['login']) != "" ) ? clean($_POST['login']) : false;
$password = (($_POST['password']) != "" ) ? clean($_POST['password']) : false;
//$email            = (($_POST['email']) != "") ? clean($_POST['name']) : false;
$email = ( directory_list_by_contact_name($contact_id, "email") ) ? directory_list_by_contact_name($contact_id, "email") : false;
$language = _options_option("config_system_lang_default");
$status = (isset($_POST['status'])) ? clean($_POST['status']) : 0;
$status = 1; // usuario por defecto activo 
$code = magia_uniqid();
$error = array();

if (!$contact_id) {
    array_push($error, "id not send");
}

if (!$rol) {
    array_push($error, 'rol not send');
}

if (!$login) {
    array_push($error, 'login not send');
}
if (!$password) {
    array_push($error, '$password not send');
}

if (!$email) {
    array_push($error, '$email not send');
}

################################################################################
/*
  if ($a != "edit") {
  array_push($error, "Action format error");
  }
  if (!is_id($id)) {
  array_push($error, "ID format error");
  }
  if (!$name) {
  array_push($error, "Name format error");
  }
 */

if (users_according_login($login)) {
    array_push($error, 'Login exist in the users data base ');
}

// si el empleado es externo 
if (contacts_field_id("owner_id", $contact_id) != _options_option("default_id_company")) {
    // solo debe tener roles inferiores a lo configurado
    if (rols_rango_by_rol($rol) > $config_rango_max_for_labo) {
        array_push($error, 'This role with this rank cannot be added to an external user');
    }
}






################################################################################
$password = password_hash($password, PASSWORD_DEFAULT);
################################################################################

if (!$error) {


    users_add(
            $contact_id, $language, $rol, $login, $password, $email, $code, $status
    );

    ############################################################################
    $data = json_encode(array(
        $contact_id, $language, $rol, $login, $password, $email, $code, $status
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    // $c = "contacts" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Add user [$login] contact_id [$contact_id] to system";
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



    $lastInsertId = users_field_code("id", $code);

    if ($lastInsertId) {
        header("Location: index.php?c=contacts&a=system&id=$contact_id");
    }
}

include view("home", "pageError");

