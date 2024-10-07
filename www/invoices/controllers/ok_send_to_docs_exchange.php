<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Registra la factura en la tabla docs_exchange
 * 
 */
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? (int) clean($_REQUEST["id"]) : null;

$error = array();

#########################################################################
#########################################################################
if (!$id) {
    array_push($error, 'Id ies mandatory');
}
// formato 
if (!invoices_is_id($id)) {
    array_push($error, 'Invoice number format error');
}
################################################################################
# Extraction de data
# 
################################################################################
// Busca si ya existe el texto en la BD
// busco segun controller y id en la tabla docs_exchange
################################################################################

if (!$error) {


    $inv = new Invoices();
    $inv->setInvoice($id);

    docs_exchange_add(
            $inv->getClient()->getTva(), //$reciver_tva, 
            $inv->getSender()->getName(), //$sender_name,
            'Invoice',
            $inv->getSender()->getTva(), //$sender_tva,
            'invoices', // controller $doc_type,
            $inv->getId(), // $doc_id, // numero de factura
            $inv->export("json"), // toda la factura en json $json, //
            'base 64', // pdf codificado en formato $pdf_base64,
            null, // $date_send Fecha de registro del envio ,
            1,
            1
    );

    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Add to docs_exchange invoice [$id]";
    $doc_id = $id;
    $crud = "create";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
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


    switch ($redi) {

        default:
            header("Location: index.php?c=invoices&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
