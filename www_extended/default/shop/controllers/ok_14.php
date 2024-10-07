<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$bank = (!empty($_POST['bank'])) ? clean($_POST['bank']) : null;
$account_number = (!empty($_POST['account_number'])) ? clean($_POST['account_number']) : null;
$bic = (!empty($_POST['bic'])) ? clean($_POST['bic']) : null;
$iban = (!empty($_POST['iban'])) ? clean($_POST['iban']) : null;

$error = array();

#########################################################################
# Obligatorias
if ($bank == "" || $bank == null) {
    array_push($error, 'Bank name is mandatory');
}
if ($account_number == '' || $account_number == null) {
    array_push($error, 'Account number is mandatory');
}
#########################################################################
# Formato
$bank = banks_format_bank($bank);
$account_number = banks_format_account_number($account_number);
$bic = banks_format_bic($bic);
$iban = banks_format_iban($iban);

if (!banks_is_account_number($account_number)) {
    array_push($error, 'Account number format incorrect');
}
#########################################################################
# Condicional
// si hay cuenta la edito, sino la creo
// si ya existe la cuenta para este contacto, error 
if (banks_search_by_account_contact($account_number, $u_owner_id)) {
    array_push($error, 'Account number already exists');
}

if (banks_field_account_number('id', $account_number)) {
    array_push($error, 'Account number already exists');
}
#########################################################################
//vardump($bank);
//vardump($account_number);
//vardump($bic);
//vardump($iban);
//vardump($u_owner_id);
//die();

if (!$error) {


    banks_push($u_owner_id, $bank, $account_number, $bic, $iban, 1);

    header("Location: index.php?c=shop&a=14&sms=update");
} else {
    include view('home', 'pageError');
}




