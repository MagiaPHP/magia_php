<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$new_date = (($_POST["date_expiration"]) != "") ? clean($_POST["date_expiration"]) : null;
$redi = (($_POST["redi"]) != "") ? clean($_POST["redi"]) : null;

$date_expiration = date_create($new_date);
$date_invoice = date_create(invoices_field_id('date', $invoice_id));
$diff = date_diff($date_invoice, $date_expiration);
$diff_days = $diff->format('%R%a');

$error = array();
///////////////////////////////////////////////////////////////////////////////

if (!$invoice_id) {
    array_push($error, 'Invoice id is mandatory');
}

if (!is_date($new_date)) {
    array_push($error, 'Date format error');
}

if ($diff_days < 0) {
    array_push($error, 'The expiration date must be after invoice date');
}

################################################################################

if (!$error) {
    invoices_date_expiration_update(
            $invoice_id, $new_date
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
    $description = "Date expiration update : $invoice_id <br>New date: [$new_date]";
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


    switch ($redi) {
        case 1:
            header("Location: index.php?c=invoices&a=edit&id=$invoice_id#title");

            break;

        default:
            header("Location: index.php?c=invoices&a=details&id=$invoice_id#title");
            break;
    }
} else {

    include view("home", "pageError");
}
