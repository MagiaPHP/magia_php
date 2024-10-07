<?php

$id = (!empty($_REQUEST["id"]) ) ? clean($_REQUEST["id"]) : false;
$code = (!empty($_REQUEST["code"]) ) ? clean($_REQUEST["code"]) : false;
$l = (isset($_REQUEST["l"])) ? clean($_REQUEST["l"]) : false;

$error = array();
################################################################################
if (!modules_field_module('status', 'app')) {
    array_push($error, 'Module app is inactived');
}
// si modulo activo pero facturas inactivas 
if (!_options_option('config_invoices_see_via_web')) {
    array_push($error, "Invoces can't see via web");
}
################################################################################
# REQUERIDOS
if (!$id) {
    array_push($error, 'Id dont send');
}
if (!$code) {
    array_push($error, 'Code dont send');
}

################################################################################
# FORMAT
# 
// si no existe
if (!invoices_field_id('id', $id)) {
    array_push($error, "Document number error");
}
// si el codigo no le pertenece
if ($code != invoices_field_id('code', $id)) {
    array_push($error, "Document code error");
}

################################################################################
//
$app_invoices_status_allowed_json = _options_option('config_app_invoices_status_to_show');
// lista en array
$app_invoices_status_allowed_array = ($app_invoices_status_allowed_json) ? json_decode($app_invoices_status_allowed_json, true) : "";

// si no esta en la lista de status permitidos, > error 
if (isset($app_invoices_status_allowed_array) && !in_array(invoices_field_id('status', $id), $app_invoices_status_allowed_array)) {
    array_push($error, "The budget is not ready yet");
}
############################################################################
################################################################################
################################################################################

if (!$error) {

    $invoices = invoices_details($id);

    $inv = new Invoices();

    $inv->setInvoice($id);

    $addresses_billing = json_decode($invoices['addresses_billing'], true);

    $addresses_delivery = json_decode($invoices['addresses_delivery'], true);

    ############################################################################
    ############# APP ##########################################################
    ############################################################################
    $level = null;
    $date = date("Y-m-d h:m:s");
    $u_id = null;
    $u_rol = null;
    //$c , $a , 
    $w = null;
    $description = "See invoice via app: $id";
    $doc_id = $id;
    $crud = "read";
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
    ############################################################################
    ###### I N V O I C E S #####################################################
    ############################################################################
    $level = null;
    $date = date("Y-m-d h:m:s");
    //$u_id
    //$u_rol , 
    $c = "invoices";
//    $a = "see_app";
    $w = null;
    $description = "See invoice via app: $id";
    $doc_id = $id;
    $crud = "read";
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

    include view("app", "invoices");
} else {


    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = date("Y-m-d h:m:s");
    $u_id = null;
    $u_rol = null;
//    $c = null; 
//    $a = null; 
    $w = null;
    $description = "Try see invoice via app";
    $doc_id = null;
    $crud = "read";
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

    include view("home", "pageError");
}

