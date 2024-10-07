<?php

// Cambia de direccion de envio 
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$new_adress_id = (($_POST["new_adress_id"]) != "" ) ? clean($_POST["new_adress_id"]) : null;

$error = array();

################################################################################
if (!$id) {
    array_push($error, 'id is mandatory');
}
if (!$new_adress_id) {
    array_push($error, '$new_adress_id is mandatory');
}
/////////////////////////////////////////////////////////////////////////////////
if (!is_id($id)) {
    array_push($error, '$id format error');
}
if (!is_id($new_adress_id)) {
    array_push($error, '$new_adress_id format error');
}

//if ( addresses_field_id("contact_id" , $new_adress_id) != budgets_field_id("client_id" , $id) ) {
//    array_push($error , 'This address does not belong to the company') ;
//}

$address = addresses_details($new_adress_id);

$new_address_json = json_encode($address);

################################################################################
################################################################################

if (!$error) {

    invoices_update_delivery_address($id, $new_address_json);

    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $invoice_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Change delivery address invoice: $id <br>New address: [$new_adress_id]";
    $doc_id = $id;
    $crud = "update";
    $error = null;
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
    ############################################################################
    ############################################################################  




    header("Location: index.php?c=invoices&a=edit&id=$id#1");
} else {

    include view("home", "pageError");
}

