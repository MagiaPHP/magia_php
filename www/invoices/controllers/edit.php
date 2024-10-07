<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$der = (isset($_REQUEST["der"])) ? clean($_REQUEST["der"]) : "default";

$error = array();

################################################################################
if (!invoices_can_be_edit($id)) {
    $error = invoices_why_can_not_be_edit($id);
}
################################################################################
if (!$error) {

    $invoices = invoices_details($id);

    $client_id = $invoices['client_id'];

    $addresses_billing = json_decode($invoices['addresses_billing'], true);

    $addresses_delivery = json_decode($invoices['addresses_delivery'], true);

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    // este include necesita del $client_id
    // esto registra el cliente en la data base de cloud
//    include controller('cloud', 'cloud_company_add_from_json');
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
//    ////////////////////////////////////////////////////////////////////////////
//    // id del cliente
//    $cp_client_id = ($invoices['client_id']);
//    // contact details
//    $contacts_details = contacts_details($cp_client_id);
//    // tva cliente
//    $tva_client = strtolower($contacts_details['tva']);
//    // si el modulo esta activado
//    // si subdominio no existe
//    if (modules_field_module('status', 'subdomains') && modules_field_module('status', 'cpanel')) {
//        // si tiene tva 
//        // si no tiene subdominio 
//        $prefix = $cpanel3["user"]; // cpanel user
//        $domain = $cpanel3["domain"]; // factux.be
//        $subdomain = strtolower($tva_client . "." . $domain);
//        $cp3_db = $prefix . "_" . $tva_client;
//        $cp3_user = $prefix . "_u" . $tva_client;
//        $pass = "+-*/Rc" . passwordRandom();
//
//        vardump(array(
//            '$prefix' => $prefix,
//            '$domain' => $domain,
//            '$subdomain' => $subdomain,
//            '$cp3_db' => $cp3_db,
//            '$cp3_user' => $cp3_user,
//            '$pass' => $pass,
//        ));
//        
//
//        // tva de quien crea // fecha // unique
//        $code = contacts_field_id('tva', $u_owner_id) . '_' . date("Ymd") . '_' . uniqid();
//
//        if ($tva_client && (subdomains_search_subdomain($subdomain) || !subdomains_search_subdomain($subdomain))) {
//            // creamos cuenta 
//            subdomains_create_account($subdomain, $domain, $cp3_db, $cp3_user, $pass, $cp_client_id);
//            // registro en la tabla de subdomains
//            subdomains_add($cp_client_id, $prefix, $subdomain, $domain, $code, null, 1, 1);
//        }
//    }
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
//    include view("invoices", "edit");
//    vardump(_options_option('config_invoices_edit_tmp')); 


    switch (_options_option('config_invoices_edit_tmp')) {
        case 'short':
            include view("invoices", "short_edit");
            break;

        case 'default':
        default:
            include view("invoices", "edit");
            break;
    }
} else {

    include view("home", "pageError");
}
