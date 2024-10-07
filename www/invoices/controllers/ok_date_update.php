<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// numero de factura 
$id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$new_date = (($_POST["date"]) != "" ) ? clean($_POST["date"]) : null;
$redi = (($_POST["redi"]) != "" ) ? clean($_POST["redi"]) : null;

$date_invoice = date_create($new_date);
$date_expiration = date_create(invoices_field_id('date_expiration', $id));
$diff = date_diff($date_expiration, $date_invoice);
$diff_days = $diff->format('%R%a');

$error = array();

################################################################################
if (!$id) {
    array_push($error, 'id is mandatory');
}
if (!$new_date) {
    array_push($error, '$new_date is mandatory');
}
################################################################################

if (!is_id($id)) {
    array_push($error, 'Id format error');
}

if (!is_date($new_date)) {
    array_push($error, 'Date format error');
}

if (!invoices_can_be_edit($id)) {
    array_push($error, 'Invoice can not be edit');
}


if ($diff_days > 0) {
    array_push($error, 'The date must be before expiration date');
}



################################################################################
################################################################################

if (!$error) {

    invoices_update_date($id, $new_date);

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
    $description = "Change date : $id <br>New date: [$new_date]";
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


    switch ($redi) {
        case 1:
            header("Location: index.php?c=invoices&a=edit&id=$id");

            break;

        default:
            header("Location: index.php?c=invoices&a=edit&id=$id#details");
            break;
    }
} else {

    include view("home", "pageError");
}

