<?php

// Cambia o actualiza el cliente de la factura
// ok_client_update

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$new_client_id = (($_POST["client_id"]) != "" ) ? clean($_POST["client_id"]) : null;

$error = array();

################################################################################
################################################################################
if (!invoices_can_change_client($id, $new_client_id)) {
    $error = array_merge($error, invoices_why_can_not_change_client($id, $new_client_id));
}

$headOffice_id = contacts_headoffice_of_contact_id($new_client_id);

$ba = json_encode(addresses_billing_by_contact_id($headOffice_id));
$da = json_encode(addresses_delivery_by_contact_id($new_client_id));

################################################################################
################################################################################

if (!$error) {

    invoices_update_client_id($id, $headOffice_id);
    invoices_update_billing_address($id, $ba);
    invoices_update_delivery_address($id, $da);

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
    $description = "Change client from invoice: $id <br>New client: [$new_client_id]";
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




    header("Location: index.php?c=invoices&a=edit&id=$id#details");
} else {

    include view("home", "pageError");
}

