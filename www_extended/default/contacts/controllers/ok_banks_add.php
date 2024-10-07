<?php

if (!permissions_has_permission($u_rol, "banks", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$bank = (($_POST['bank']) != "") ? clean($_POST['bank']) : 'Bank name';
$account_number = (($_POST['account_number']) != "") ? clean($_POST['account_number']) : false;
$bic = (($_POST['bic']) != "") ? clean($_POST['bic']) : false;
$iban = (($_POST['iban']) != "") ? clean($_POST['iban']) : false;
$status = (($_POST['status']) != "") ? clean($_POST['status']) : 1;

$code = magia_uniqid();

$error = array();

if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}
if (!$bank) {
    array_push($error, '$bank is mandatory');
}
if (!$account_number) {
    array_push($error, '$account_number is mandatory');
}

if (banks_search_by_account_contact($account_number, $contact_id)) { // banco y contacto 
    array_push($error, 'Account number already exists');
}


if (!$error) {

    banks_add(
            $contact_id, $bank, $account_number, $bic, $iban, $code, $status
    );

    ############################################################################
    $data = json_encode(array(
        $contact_id, $bank, $account_number, $bic, $iban, $code, $status
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "contacts";
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Add bank account [$account_number] to contact : [$contact_id]";
    $doc_id = $contact_id;
    $crud = "create";
    //$error = null ;
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



    header("Location: index.php?c=contacts&a=banks&id=$contact_id&error=error#");
} else {

    include view("home", "pageError");
}