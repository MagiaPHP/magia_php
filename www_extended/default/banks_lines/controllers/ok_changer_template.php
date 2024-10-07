<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Actualiza los datos del banco para una mejor lectura del archivo csv

$file = (isset($_REQUEST["file"]) && $_REQUEST["file"] != "" ) ? clean($_REQUEST["file"]) : false;

$account_number = ($_REQUEST["account_number"] != "" && $_REQUEST["account_number"] != "null" ) ? clean($_REQUEST["account_number"]) : false;

$fl = (!empty($_REQUEST['fl'])) ? clean($_REQUEST['fl']) : false;
//
$update = (isset($_REQUEST["update"]) && $_REQUEST["update"] != "" ) ? clean($_REQUEST["update"]) : false;
//
$delimiter = (isset($_REQUEST["delimiter"]) && $_REQUEST["delimiter"] != "" ) ? clean($_REQUEST["delimiter"]) : null;
$codification = (isset($_REQUEST["codification"]) && $_REQUEST["codification"] != "") ? clean($_REQUEST["codification"]) : null;
$date_format = (isset($_REQUEST["date_format"]) && $_REQUEST["date_format"] != "") ? clean($_REQUEST["date_format"]) : null;
$thousands_separator = (isset($_REQUEST["thousands_separator"]) && $_REQUEST["thousands_separator"] != "") ? clean($_REQUEST["thousands_separator"]) : null;
$decimal_separator = (isset($_REQUEST["decimal_separator"]) && $_REQUEST["decimal_separator"] != "") ? clean($_REQUEST["decimal_separator"]) : null;

$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;

$error = array();

if (!$error) {

    banks_update_field(banks_field_account_number('id', $account_number), 'codification', $codification);

    banks_update_field(banks_field_account_number('id', $account_number), 'delimiter', $delimiter);
    banks_update_field(banks_field_account_number('id', $account_number), 'date_format', $date_format);
    //banks_update_field(banks_field_account_number('id', $account_number), 'thousands_separator', $thousands_separator);
    //banks_update_field(banks_field_account_number('id', $account_number), 'decimal_separator', $decimal_separator);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=banks_lines&a=import_check&update=1&file=$file&account_number=$account_number");
            break;

        default:
            header("Location: index.php?c=banks_lines&a=import_check&update=1&file=$file&account_number=$account_number");
            break;
    }
} else {

    include view("home", "pageError");
}

