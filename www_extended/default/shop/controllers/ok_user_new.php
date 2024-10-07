<?php

if (!permissions_has_permission($u_rol, 'shop_users', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// id de la oficina en cuestion 
//
$id = (!empty($_POST['id'])) ? clean($_POST['id']) : false;

$title = (!empty($_POST['title']) && $_POST['title'] != '') ? clean($_POST['title']) : null;
$office_id = (!empty($_POST['office_id'])) ? clean($_POST['office_id']) : false;
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : null;
$lastname = (!empty($_POST['lastname'])) ? clean($_POST['lastname']) : null;
$rol = (!empty($_POST['rol'])) ? clean($_POST['rol']) : _options_option("default_rol");
$email = (!empty($_POST['email'])) ? clean($_POST['email']) : null;
$password = (!empty($_POST['password'])) ? clean($_POST['password']) : null;
// redirection
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : null;

$np = password_hash($password, PASSWORD_DEFAULT);

$nationalNumber = (!empty($_POST['nationalNumber'])) ? clean($_POST['nationalNumber']) : null;
//$language = ($_POST['language'] != "" ) ? clean($_POST["language"]) : _options_option("config_system_lang_default") ;
$language = _options_option("config_system_lang_default");

$year = (!empty($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (!empty($_POST['month'])) ? clean($_POST['month']) : 01;
$day = (!empty($_POST['day'])) ? clean($_POST['day']) : 01;

$month = str_pad($month, 2, "0", STR_PAD_LEFT);
$day = str_pad($day, 2, "0", STR_PAD_LEFT);

$birthdate = "$year-$month-$day";
## 
$type = 0; // 0 perona 1 empresa
$status = 1;
$order_by = 0;
$login = $email;
$code = magia_uniqid();

$error = array();

#************************************************************************
// Data
$dataName = (!empty($_POST['dataName'])) ? clean($_POST['dataName']) : false;
$data = (!empty($_POST['data'])) ? clean($_POST['data']) : false;

if (!$office_id) {
    array_push($error, '$office_id is mandatory');
}

if (!$name) {
    array_push($error, '$name is mandatory');
}

if (!$lastname) {
    array_push($error, '$lastname is mandatory');
}

if (!$rol) {
    array_push($error, '$rol is mandatory');
}

if (!$email) {
    array_push($error, '$email is mandatory');
}

if (!$password) {
    array_push($error, '$password is mandatory');
}

// contacto 
if (shop_contacts_search_name_lastname_birthdate($office_id, $name, $lastname, $birthdate)) {
    array_push($error, 'This contact already exists');
}

// user
if (users_according_email($email)) {
    array_push($error, 'The email already exists');
}

################################################################################
if (!$error) {


    // agrego como contacto 
    shop_contacts_add(
            $office_id, $type, $title, $name, $lastname, $birthdate, $code, $order_by, $status
    );

    $contactslastInsertId = contacts_field_code('id', $code);

    if ($contactslastInsertId) {

        // agrego como empleado
        employees_add(
                $office_id, $contactslastInsertId, null, null, "Employee", $order_by, $status
        );
        // ad directory
//        directory_add(
//                $contact_id, $address_id, $name, $data, $code, $order_by, $status
//                );

        directory_add(
                $contactslastInsertId, null, "Email", $email, $code, $order_by, $status
        );
        // add user
        users_add(
                $contactslastInsertId, $language, $rol, $login, $np, $email, $code, $status
        );

        $lastUsersInsertId = users_field_code("id", $code);

        ############################################################################
        ############################################################################
        $data_json = json_encode(array(
            $office_id, $type, $title, $name, $lastname, $birthdate, $code, $order_by, $status
        ));
        $error = json_encode($error);
        $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
        $date = null;
        //$u_id
        //$u_rol , 
        $c = "shop";
        $a = 'users_by_office';
        $w = null;
        // $txt
        $description = "Users new [$contactslastInsertId] ";
        $doc_id = $office_id;
        $crud = "create";
        //$error = null ;
        //-------------------------------------------------------------------------
        $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
        $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
        $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
        //-------------------------------------------------------------------------
        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
    }



// redirections
    switch ($redi) {
        case 1:
            header("Location: index.php?c=shop&a=offices");
            break;

        default:
            header("Location: index.php?c=shop&a=users_by_office&id=$id");
            break;
    }
} else {


    include view("home", "pageError");
}

