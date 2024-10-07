<?php

if (!permissions_has_permission($u_rol, "contacts", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if ($u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


/**
 * Aca hay posibilidad de editar al tva, por eso solo lo dejamos que root lo haga
 */
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
//$owner_id = (isset($_REQUEST['owner_id'])) ? clean($_REQUEST['owner_id']) : false;
$name = (isset($_REQUEST['name'])) ? clean($_REQUEST['name']) : false;
$status = (isset($_REQUEST['status'])) ? clean($_REQUEST['status']) : false;

$error = array();
################################################################################
if ($id == 1022) {
    array_push($error, "Company edit disabled");
}

if (offices_is_headoffice($id)) {

    $tva = (isset($_REQUEST['tva'])) ? clean($_REQUEST['tva']) : false;

    $discounts = (isset($_REQUEST['discounts'])) ? intval(clean($_REQUEST['discounts'])) : false;

    if (!$tva) {
        array_push($error, "Tva is mandatory");
    }
    // verifica el valor de descuento aplicable a un cliente en sus compras 

    if ($discounts < 0 || $discounts > _options_option("config_discounts_max_to_customer")) {
        array_push($error, 'Discount must be positive and it cannot exceed the maximum authorized ');
        array_push($error, _options_option("config_discounts_max_to_customer"));
    }
} else {
    $tva = null;
    $discounts = null;
}




if (!$id) {
    array_push($error, 'id is mandatory');
}
if (!$name) {
    array_push($error, "Name is mandatory");
}

//------------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, "ID format error");
}

////////////////////////////////////////////////////////////////////////////
if (!$error) {

    contacts_edit_company(
            $id, $name, $status, $tva, $discounts
    );

    ############################################################################
    $data = json_encode(array(
        $id, $name, $status, $tva, $discounts
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
    $description = "Edit company $id ";
    $doc_id = $id;
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




    header("Location: index.php?c=contacts&a=details&id=$id");
} else {
    include view("home", "pageError");
}