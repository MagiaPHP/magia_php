<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$seller_id = (($_POST["seller_id"]) != "") ? clean($_POST["seller_id"]) : null;
$redi = (($_POST["redi"]) != "") ? clean($_POST["redi"]) : null;

$error = array();

if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$seller_id) {
    array_push($error, '$seller_id is mandatory');
}
################################################################################
if (!contacts_field_id('id', $seller_id)) {
    array_push($error, 'Contact not exist');
}
if (!invoices_field_id('id', $invoice_id)) {
    array_push($error, 'Invoice not exist');
}
################################################################################

if (!$error) {
    invoices_seller_id_update(
            $invoice_id, $seller_id
    );

    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $invoice_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Seller update : $invoice_id <br>New seller: [$seller_id]";
    $doc_id = $invoice_id;
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

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=invoices&a=details&id=$invoice_id#title");
            break;

        default:
            header("Location: index.php?c=invoices&a=details&id=$invoice_id#title");
            break;
    }
} else {

    include view("home", "pageError");
}
