<?php

$id = (!empty($_REQUEST["id"]) ) ? clean($_REQUEST["id"]) : false;
$code = (!empty($_REQUEST["code"]) ) ? clean($_REQUEST["code"]) : false;
$a = (!empty($_REQUEST["a"]) ) ? clean($_REQUEST["a"]) : false;
$lang = (!empty($_REQUEST["lang"]) ) ? clean($_REQUEST["lang"]) : false;

$error = array();
################################################################################       
################################################################################
if (!modules_field_module('status', 'app')) {
    array_push($error, 'Module app is inactived');
}
################################################################################
# REQUERIDOS
if (!$id) {
    array_push($error, '$id dont send');
}
if (!$code) {
    array_push($error, '$code dont send');
}
if (!$a) {
    array_push($error, '$a dont send');
}
//
if (!$lang) {
    array_push($error, '$lang dont send');
}
################################################################################
# FORMAT
// 
// id
if (!invoices_is_id($id)) {
    array_push($error, 'Id format send');
}
// 
// p_i
if ($a != 'p_i') {
    array_push($error, '$a is not p_i');
}
################################################################################
# 
# 
// 
// 
// si la factura no existe
if (!invoices_field_id('id', $id)) {
    array_push($error, 'Document number error');
}
// 
// 
// si el codigo no pertenece a esa factura
if ($code != invoices_field_id('code', $id)) {
    array_push($error, 'Document code error');
}
//
// 
//   si modulo app inactivo 
if (!modules_field_module('status', 'app')) {
    array_push($error, 'App module is inactived');
}
//
// 
//   si el idioma no esta activo o no existe
if (!_languages_search_by_language($lang)) {
    // si el cliente tiene idioma,
    // sino el idioma por defecto del sistema 
    $lang = (contacts_field_id(invoices_field_id('client_id', $id), 'language')) ? contacts_field_id(invoices_field_id('client_id', $id), 'language') : $config_lang_default;
}
//
//
// si modulo activo pero facturas inactivas 
if (!_options_option('config_invoices_see_via_web')) {
    array_push($error, "Invoces can't see via web");
}
################################################################################
// 
// 
// solo facturas con ciertos status se pueden ver
switch (invoices_field_id('status', $id)) {
    case -10:
    case -20:
        array_push($error, 'Invoices with this status cannot be viewed here');
        break;

    default:
        break;
}
############################################################################
################################################################################
################################################################################


if (!$error) {

    $invoices = invoices_details($id);
    $addresses_billing = json_decode($invoices['addresses_billing'], true);
    $addresses_delivery = json_decode($invoices['addresses_delivery'], true);

    // esto es para la expotacion en qr
    $invoice_qr['factux']['version'] = "beta";
    $invoice_qr['invoice']['number'] = $id;
    $invoice_qr_json = json_encode($invoice_qr);

    ############################################################################
    ############# APP ##########################################################
    ############################################################################
    $level = null;
    $date = null;
    $u_id = null;
    $u_rol = null;
    //$c , $a , 
    $w = null;
    $description = "Print invoice via app: $id";
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
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "invoices";
    $a = "see_app";
    $w = null;
    $description = "Print invoice via app: $id";
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











    include view("invoices", "export_pdf");
} else {

    include view("home", "pageError");
}
