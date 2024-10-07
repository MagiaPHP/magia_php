<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : null;

$quantity = (($_POST["quantity"]) != "") ? clean($_POST["quantity"]) : 1;
$description = (products_field_code("description", $code)) ? products_field_code("description", $code) : null;
$price = (products_field_code("price", $code)) ? products_field_code("price", $code) : null;
$discounts = (($_POST["discounts"]) != "" ) ? clean($_POST["discounts"]) : 0;
$discounts_mode = (($_POST["discounts_mode"]) != "" ) ? clean($_POST["discounts_mode"]) : null;
$tax = (products_field_code("tax", $code)) ? products_field_code("tax", $code) : null;
$order_by = invoice_lines_next_order_by($invoice_id) ?? 1;
$status = (isset($_POST["status"]) ) ? clean($_POST["status"]) : 1;
// Factura mensual no normail
$type = "I"; // Mensual M, N, normal

$error = array();

if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$code) {
    array_push($error, 'code is mandatory');
}
if (!$quantity) {
    array_push($error, '$quantity is mandatory');
}
if (!$description) {
    array_push($error, 'description is mandatory');
}
if (!$price) {
    array_push($error, 'price is mandatory');
}
if (!$tax) {
    array_push($error, 'tax is mandatory');
}





#************************************************************************
#************************************************************************
# PROCESO
# si hay descuento, el descuento mode hay 
//$discounts_mode = ( $discounts > 0)? $discounts_mode : null;  
if ($discounts < 0) {
    array_push($error, 'The discount must be positive');
}
// el descuento no puede ser superior al limite fijado como maximo para los clientes 

if ($discounts > _options_option("config_discounts_max_to_customer") && $discounts_mode == '%') {
    array_push($error, 'The discount cannot exceed the limit of x%');
    //array_push($error , 'The discount cannot exceed the limit of x%') ;
}
#************************************************************************
// Busca si uya existe el texto en la BD

if (invoice_lines_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}

################################################################################
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
if ($quantity) {
    $quantity = abs($quantity);
}
if ($price) {
    $price = abs($price);
}
if ($discounts) {
    $discounts = abs($discounts);
}
if ($tax) {
    $tax = abs($tax);
}
if ($discounts_mode != "%" && $discounts > ($price * $quantity)) {
    array_push($error, 'The discount cannot exceed the price');
}

if ($discounts_mode == "%" && $discounts > 100) {
    array_push($error, 'The discount cannot exceed 100%');
}
################################################################################
################################################################################

if (!$error) {

    invoice_lines_add(
            $invoice_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
    );

    ############################################################################
    ############################################################################
    ############################################################################
    $id = $invoice_id;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Add item line to invoice: $id <br>Line: [Code: $code, Quantity: $quantity, Description: $description, Price: $price, Discounts: $discounts, Discounts_mode: $discounts_mode]";
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


    invoices_update_type($invoice_id, $type); // Normal o ensual
//    vardump(invoice_lines_totalHTVA($invoice_id)); 
//    vardump(invoice_lines_totalTVA($invoice_id)); 
//    die(); 
    // Esto me actualiza los totales en la factura
    invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));

    header("Location: index.php?c=invoices&a=edit&id=$invoice_id#items_add");
} else {

    include view("home", "pageError");
}

