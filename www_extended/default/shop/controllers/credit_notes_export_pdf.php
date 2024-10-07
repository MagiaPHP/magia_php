<?php

if (!permissions_has_permission($u_rol, 'shop_invoices', "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Rol externo, solo puede ver las credit notes de su empresa 
 * Verifica si el id que quiere ver pertenece a esta empresa 
 * poner  el codigo de la nota de credito hashe
 * 
 */
################################################################################
# Recolection de variables desde el formulario
################################################################################
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$code = (isset($_REQUEST['code'])) ? clean($_REQUEST['code']) : false;

$error = array();
################################################################################
if (!$id) {
    array_push($error, "Error S-40");
}
if (!$code) {
    array_push($error, "Error S-50");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!credit_notes_is_id($id)) {
    array_push($error, "Error S-400");
}
if (!credit_notes_is_code($code)) {
    array_push($error, "Error S-500");
}
################################################################################
if (!credit_notes_field_id("id", $id)) {
    array_push($error, "Error S-4000");
}
if (!credit_notes_field_code('id', $code)) {
    array_push($error, "Error S-5000");
}
if (!shop_credit_notes_details_credit_notes_code($id, $code)) {
    array_push($error, "Error S-6000");
}
################################################################################
################################################################################
################################################################################
################################################################################


$credit_note = shop_credit_notes_details_credit_notes_code($id, $code);

$addresses_billing = json_decode($credit_note['addresses_billing'], true);

$addresses_delivery = json_decode($credit_note['addresses_delivery'], true);

//// esto es para la expotacion en qr
//$invoice_qr['factux']['version'] = "beta";
////$invoice_qr['factux']['date'] = "2020-04-11"; 
//$invoice_qr['invoice']['number'] = $id;
////    $invoice_qr['invoice']['from_budget'] = $invoices['budget_id']; 
////    $invoice_qr['invoice']['addresses_billing'] = $invoices['addresses_billing']; 
////    $invoice_qr['invoice']['addresses_delivery'] = $invoices['addresses_delivery']; 
//
//
//$invoice_qr_json = json_encode($invoice_qr);


if (!$error) {

    include view("credit_notes", "export_pdf");

    ############################################################################
    ############################################################################
    ############################################################################
    $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "credit_notes";
    //$a , 
    $w = null;
    $description = "Print credit_notes [$id]";
    $doc_id = $id;
    $crud = "read";
    $error = ($error) ? json_encode($error) : null;
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
} else {


    include view("home", "pageError");

    ############################################################################
    ############################################################################
    ############################################################################
    $level = 4; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "credit_notes";
    //$a , 
    $w = null;
    $description = "Try print credit_notes [$id] but error ";
    $doc_id = $id;
    $crud = "read";
    $error = ($error) ? json_encode($error) : null;
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
}