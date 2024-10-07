<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$comments = (isset($_REQUEST["comments"]) && $_REQUEST["comments"] != '' ) ? clean($_REQUEST["comments"]) : '';

$error = array();

###############################################################################
if (!$invoice_id) {
    array_push($error, "ID Don't send");
}
###############################################################################
# Variables obligatoias
###############################################################################
if (!invoices_is_id($invoice_id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# Transformacion
#
###############################################################################
//if (invoices_field_id("status", $invoice_id) == -10) {
//    array_push($error, 'Invoice already cancel');
//}
################################################################################
################################################################################
if (!$error) {

    // pongo la factura como anulada
    invoices_change_status_to($invoice_id, -10);
    // add comment
    invoices_comments_update($invoice_id, $comments);

    ############################################################################
    ############################################################################
    ############################################################################
    // $id = $lastInsertCreditNotes; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Invoices canceled";
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
    #
    ############################################################################
    ############################################################################
    ############################################################################

    header("Location: index.php?c=invoices&a=details&id=$invoice_id");
} else {

    include view("home", "pageError");
}
