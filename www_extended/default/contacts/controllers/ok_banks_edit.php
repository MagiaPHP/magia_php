<?php

/**
 * Se remplaza este por ok_bank_update.php
 * para editar el banco sin editar el numero de cuenta 
 * asi poner un form solo para el numero de cuenta 
 * 
 * 
if (!permissions_has_permission($u_rol, "banks", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (($_POST['bank_id']) != "") ? clean($_POST['bank_id']) : false;
$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$bank = (($_POST['bank']) != "") ? clean($_POST['bank']) : false;
$account_number = (($_POST['account_number']) != "") ? clean($_POST['account_number']) : false;
$bic = (($_POST['bic']) != "") ? clean($_POST['bic']) : false;
$iban = (($_POST['iban']) != "") ? clean($_POST['iban']) : false;
$status = (($_POST['status']) != "") ? clean($_POST['status']) : false;

$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}
if (!is_id($id)) {
    array_push($error, 'id format error send');
}
if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format error send');
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

    banks_edit(
            $id, $contact_id, $bank, $account_number, $bic, $iban, $status
    );

    ############################################################################
    $data = json_encode(array(
        $id, $contact_id, $bank, $account_number, $bic, $iban, $status
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Edit bank account id: [$id]";
    $doc_id = $id;
    $crud = "update";
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
*/

