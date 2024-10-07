<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

// busco si este presupuesto tiene ya transporte agregado
// lista de codigos de las lineas del budget
$codes_by_lines = invoice_lines_list_code_by_invvoice_id($id);
$codes_transport = transport_list_code_by_status(1);
$code_transport_in_invoice = array_intersect($codes_by_lines, $codes_transport);

################################################################################
###############################################################################
# fue enviada?
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
# F O R M A T
$id = format_id($id); // formateo el id, pasandole solo a numeros enteros 
###############################################################################
# BUEN F O R M A T ?
if (!invoices_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################
# Existe en la base de datos?
if (!invoices_field_id("id", $id)) {
    array_push($error, "id not exist");
}

################################################################################
if (!$error) {

    $invoices = invoices_details($id);

    $addresses_billing = json_decode($invoices['addresses_billing'], true);

    $addresses_delivery = json_decode($invoices['addresses_delivery'], true);

    // incluyo el modelo para exportar beta
    //include "export_tmp_beta.php"; 

    $inv = new Invoices();
    $inv->setInvoice($id);

//    vardump($inv->getLines());


    $inv->setExport();
//    vardump($inv->getExport()); 





    include "export_tmp_0.0.2.php";

    include view("invoices", "export");

    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "See invoice to export [$id]";
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
} else {

    include view("home", "pageError");
}
