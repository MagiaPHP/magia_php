<?php

if (!permissions_has_permission($u_rol, "patients", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$type = 0;
//$type = (isset($_POST['type'])) ? clean($_POST['type']) : false;
$company_id = (isset($_POST['company_id'])) ? clean($_POST['company_id']) : false;
$company_ref = (isset($_POST['company_ref'])) ? clean($_POST['company_ref']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$status = 1;

$error = array();

################################################################################

if (!$company_id) {
    array_push($error, "company_id not send");
}

if (!$contact_id) {
    array_push($error, "contact_id not send");
}
//------------------------------------------------------------------------------
if (!is_id($company_id)) {
    array_push($error, 'company_id format incorrect');
}

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format incorrect');
}




if (!$error) {

    contacts_add_patient(
            $company_id, $company_ref, $contact_id, $status
    );

    ############################################################################
    $data = json_encode(array(
        $company_id, $company_ref, $contact_id, $status
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
    $description = "Add like patient contact $contact_id to company $company_id";
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

    header("Location: index.php?c=contacts&a=details&id=$company_id");
} else {


    include view("home", "pageError");
}

