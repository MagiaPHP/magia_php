<?php

// Cambia de estatus
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST['invoice_id']) && $_POST['invoice_id'] != "") ? $_POST['invoice_id'] : false;
$status_code = (isset($_POST['status_code']) && $_POST['status_code'] != "") ? $_POST['status_code'] : false;

$error = array();

### MANDATORY ##################################################################
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
### FORMAT #####################################################################
if (!invoices_is_id($invoice_id)) {
    array_push($error, '$invoice_id format error');
}
if (!invoice_status_is_status($status_code)) {
    array_push($error, '$status format error');
}

################################################################################
################################################################################

if (!$error) {

    invoices_change_status_to($invoice_id, $status_code);

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
    $description = "Change invoice status to $status_code [" . invoice_status_by_status($status_code) . "] ";
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






    header("Location: index.php?c=invoices&a=details&id=$invoice_id");
} else {

    include view("home", "pageError");
}
