<?php

if (!permissions_has_permission($u_rol, 'shop_directory', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$contact_id = (!empty($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
//$contact_id = $u_id; // el usuario conectado
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$data = (!empty($_POST['data'])) ? clean($_POST['data']) : false;
$type = contacts_field_id("type", $contact_id);
$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$contact_id) {
    array_push($error, "Name is mandatory");
}
if (!$name) {
    array_push($error, "Name is mandatory");
}
if (!$data) {
    array_push($error, "Data is mandatory");
}

// Verificamos que sea un email 
if (strtolower($name) == "email" && !is_email($data)) {
    array_push($error, "Email fomat error");
}


//vardump($contact_id); 
//vardump($name); 
//vardump($data); 
//die(); 
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($u_owner_id)) {
    // array_push($error, "Error in price");
}

################################################################################
################################################################################
################################################################################
if (!$error) {


    shop_contacts_directory_add(
            $contact_id, $name, $data
    );

    ############################################################################
    ############################################################################
    $data_json = json_encode(array(
        $contact_id, $name, $data
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "shop";
    $a = 'directory_by_office';
    $w = null;
    // $txt
    $description = "Directory add [$name] new data [$data] ";
    $doc_id = $contact_id;
    $crud = "update";
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



    if ($type == 1) {

        header("Location: index.php?c=shop&a=directory_by_office&id=$contact_id");
    } else {
        header("Location: index.php?c=shop&a=contacts_directory&id=$contact_id");
    }
} else {

    include view("home", "pageError");
}




