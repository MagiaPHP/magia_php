<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include "www/ubl_InvoiceLine/models/Ubl_InvoiceLine.php";
include "www/ubl_Period/models/Ubl_Period.php";

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

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

    $invoice = invoices_details($id);

    // http://docs.oasis-open.org/ubl/os-UBL-2.1/UBL-2.1.html
    // http://docs.oasis-open.org/ubl/os-UBL-2.1/UBL-2.1.html#T-INVOICE


    $inv = new Ubl_InvoiceLine();
    $inv->setUbl_InvoiceLine(1);

//    
//    
//    
//
//    $addresses_billing = json_decode($invoice['addresses_billing'] , true) ;
//
//    $addresses_delivery = json_decode($invoice['addresses_delivery'] , true) ;
//    
//    // lista de items de esa factura 
//    $lines = invoice_lines_list_by_invoice_id($id);
//    
//    // agrego estas lineas al array de la factura
//    //array_push($invoice, $lines); 
//    $invoice['lines'] = $lines; 
//    
//    // convierto en json todo 
//    $invoice_json = json_encode($invoice);
//    
//    $invoice_json['id'] = $invoice['id'];
//    $invoice_json['budget_id'] = $invoice['budget_id'];
//    $invoice_json['credit_note_id'] = $invoice['credit_note_id'];
//    $invoice_json['client_id'] = $invoice['client_id'];
//    $invoice_json['seller_id'] = $invoice['seller_id'];
//    $invoice_json['addresses_billing'] = $invoice['addresses_billing'];
//    $invoice_json['addresses_delivery'] = $invoice['addresses_delivery'];
//    $invoice_json['date'] = $invoice['date'];
//    $invoice_json['date_registre'] = $invoice['date_registre'];
//    $invoice_json['total'] = $invoice['total'];
//    $invoice_json['tax'] = $invoice['tax'];
//    $invoice_json['advance'] = $invoice['advance'];
//    $invoice_json['balance'] = $invoice['balance'];
//    $invoice_json['comments'] = $invoice['comments'];
//    $invoice_json['comments_private'] = $invoice['comments_private'];
//    $invoice_json['r1'] = $invoice['r1'];
//    $invoice_json['r2'] = $invoice['r2'];
//    $invoice_json['r3'] = $invoice['r3'];
//    $invoice_json['fc'] = $invoice['fc'];
//    $invoice_json['date_update'] = $invoice['date_update'];
//    $invoice_json['days'] = $invoice['days'];
//    $invoice_json['ce'] = $invoice['ce'];
//    $invoice_json['code'] = $invoice['code'];
//    $invoice_json['type'] = $invoice['type'];
//    $invoice_json['status'] = $invoice['status'];




    include view("invoices", "export_xml");

    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Export json invoice: $id";
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
