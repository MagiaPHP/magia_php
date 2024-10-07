<?php

if (!permissions_has_permission($u_rol, "contacts", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$subdomain = (($_POST['subdomain']) != "") ? clean($_POST['subdomain']) : false;
$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : false;

$error = array();

################################################################################

if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}

if (!$subdomain) {
    array_push($error, "Subdomain is mandatory");
}

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format error send');
}


#################################################################################
# El formato del subdominio
# solo letras y numeros 
# maxivo x caracteres
# 
#################################################################################
#################################################################################

if (!$error) {

    //https://docs.hostsuar.com/guias/hosting/entorno/api-cpanel-desarrollo-local-externo
//    contacts_update_name(
//            $contact_id, $name
//    );
    ############################################################################
    $data = json_encode(array(
        $contact_id, "subdomain", $subdomain
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
    $description = "Update subdomain : [$contact_id], new data [ $subdomain ]";
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
            header("Location: index.php?c=contacts&a=cpanel&id=$contact_id");
            break;

        default:
            header("Location: index.php?c=contacts&a=cpanel&id=$contact_id");
            break;
    }
} else {

    include view("home", "pageError");
}


