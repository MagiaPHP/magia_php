<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


include "includes/parsecsv-for-php-main/parsecsv.lib.php";

$file = (isset($_REQUEST["file"]) && $_REQUEST["file"] != "" ) ? clean($_REQUEST["file"]) : false;
$account_number = ($_REQUEST["account_number"] != "" && $_REQUEST["account_number"] != "null" ) ? clean($_REQUEST["account_number"]) : false;
$fl = (!empty($_REQUEST['fl'])) ? clean($_REQUEST['fl']) : false;

$bank_id = banks_field_account_number('id', $account_number);

$bank = new Banks();
$bank->setBanks($bank_id);

$error = array();
////////////////////////////////////////////////////////////////////////////////
// si la extencion del archivo no es csv, error 

switch ($bank->getDelimiter()) {
    case "c":
        $delimiter_value = ',';
        break;

    case "pc":
        $delimiter_value = ';';
        break;

    case "t":
        $delimiter_value = '\t';
        break;

    default:
        $delimiter_value = ';';
        break;
}

$limit_lines_by_file = 999;
//el subdominio
// seria mejor 
// 
$file_csv = "www/gallery/img/_" . $config_db . '/' . $file;
//
$csv_file = file("$file_csv");
//
////////////////////////////////////////////////////////////////////////////////
// https://github.com/parsecsv/parsecsv-for-php/blob/main/examples/limit.php
//
$csv = new \ParseCsv\Csv();
//$csv->heading = true;
//$csv->encoding('UTF-16', 'UTF-8');
switch ($bank->getCodification()) {
    case 1:
        $csv->encoding('UTF-16', 'UTF-8');
        break;
    case 2:
        $csv->encoding('UTF-8');
        break;
    case 3:
        $csv->encoding('UTF-16');
        break;
    case 4:
        $csv->encoding('ISO-8859-1');
        break;
    default:
        $csv->encoding('UTF-16', 'UTF-8');
        break;
}

$csv->delimiter = $delimiter_value;
$csv->limit = $limit_lines_by_file;
$csv->parseFile("$file_csv");
$headers = $csv->getDatatypes();
$banks_lines = $csv->data;
// total de lineas
$cpt_lines = $csv->getTotalDataRowCount();
//
$cpt_cols_max = 0;
foreach ($banks_lines as $key => $line) {
    // cuento los elementos en el array, 
    if (count($line) > $cpt_cols_max) {
        $cpt_cols_max = count($line);
    }
}
// auumentamos uno para poner el año
//$cpt_cols_max = $cpt_cols_max + 1; 
////////////////////////////////////////////////////////////////////////////////
if ($cpt_lines > $limit_lines_by_file) {
    array_push($error, 'The lines in the file exceed the maximum allowed');
}


// si hay alguna linea en la Db banks_lines_check da error 
if (banks_lines_check_list()) {
    array_push($error, 'You still have bank lines waiting to be reviewed and corrected, you should do that first before continuing.');
}

################################################################################
if (!$error) {
    include view("banks_lines", "import_check");
} else {
    include view("home", "pageError");
}


