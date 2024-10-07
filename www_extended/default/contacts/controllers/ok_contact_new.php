<?php
/**
if (!permissions_has_permission($u_rol, 'contacts', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// id de la oficina en cuestion 
// Nuevo contacto no empresa
//
$id = (!empty($_POST['id'])) ? clean($_POST['id']) : false;
$title = (!empty($_POST['title']) && $_POST['title'] != '') ? clean($_POST['title']) : null;
$office_id = (!empty($_POST['office_id'])) ? clean($_POST['office_id']) : false;
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : null;
$lastname = (!empty($_POST['lastname'])) ? clean($_POST['lastname']) : null;
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : null;
//
$language = config_system_lang_default();

//
$year = (!empty($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (!empty($_POST['month'])) ? clean($_POST['month']) : 01;
$day = (!empty($_POST['day'])) ? clean($_POST['day']) : 01;

$month = str_pad($month, 2, "0", STR_PAD_LEFT);
$day = str_pad($day, 2, "0", STR_PAD_LEFT);
$birthdate = "$year-$month-$day";
//
## 
$type = 0; // 0 perona 1 empresa
$status = 1;
$order_by = 1;

$code = magia_uniqid();

$error = array();

#************************************************************************
if (!$office_id) {
    array_push($error, '$office_id is mandatory');
}

if (!$name) {
    array_push($error, '$name is mandatory');
}

if (!$lastname) {
    array_push($error, '$lastname is mandatory');
}

// contacto 
if (contacts_search_by_company_id_name_lastname_birthdate($office_id, $name, $lastname, $birthdate)) {
    array_push($error, 'This contact already exists');
}

################################################################################
if (!$error) {

    contacts_add(
            $office_id, 0, $title, $name, $lastname, $birthdate, null, $code, 1, 1
    );

    $contactslastInsertId = contacts_field_code('id', $code);

    // actualizo el idioma con el idioma por defecto del sistema
    contacts_update_language($contactslastInsertId, config_system_lang_default());

    if ($contactslastInsertId) {

        ############################################################################
        $data = json_encode(array(
            $office_id, 0, $title, $name, $lastname, $birthdate, null, $code, 1, 1
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
        $description = "Contact add: $contactslastInsertId, data: $data";
        $doc_id = $contactslastInsertId;
        $crud = "create";
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
    } else {
        ############################################################################
        $data = json_encode(array(
            $office_id, 0, $title, $name, $lastname, $birthdate, null, $code, 1, 1
        ));
        $error = json_encode($error);
        $level = 3; // 1 atention, 2 medio, 3 critico, 4 fatal
        $date = null;
        //$u_id
        //$u_rol , 
        $c = "contacts";
        $a = "ok_contact_new";
        $w = null;
        // $txt
        $description = "Error add contact";
        $doc_id = null;
        $crud = "create";
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
        ############################################################################
        ############################################################################ 
        ############################################################################
        ############################################################################ 
    }



    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=contacts&id=$office_id");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {


    include view("home", "pageError");
}

