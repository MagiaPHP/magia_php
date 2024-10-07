<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$file = ($_GET["file"] != "" ) ? clean($_GET["file"]) : '2024-04-10-19-37-45-x-6616ce69259b2.csv';
//$file = ($_GET["file"] != "" ) ? clean($_GET["file"]) : '2024-04-10-20-08-37-x-6616d5a532b09.csv';
//$account_number = ($_REQUEST["account_number"] != "" && $_REQUEST["account_number"] != "null" ) ? clean($_REQUEST["account_number"]) : 'BE37000442448928';
//$banks_lines_tmp = array(
//    'operation', 'date_operation', 'description', 'type', 'total', 'currency', 'date_value', 'account_sender', 'sender', 'comunication', 'ce', 'ref', 'ref2', 'ref3'
//);
//$banks_lines_tmp_json = json_encode($banks_lines_tmp); 
//vardump($banks_lines_tmp_json); 
//$csv = "2.csv";
$rows = array_map('str_getcsv', file('tmp/' . $file));

//vardump(file('tmp/' . $file)); 
//
//$data = str_getcsv("1");
// 
//var_dump($data);
//
//die();
//vardump($rows);




$cpt_lines = 0;
$cpt_cols_max = 0;
$banks_lines = array();

foreach ($rows as $key => $line) {

//    $cols = explode(',', $line[0]);
//    array_push($banks_lines, $cols);
//    $cpt_lines++;
//
//    if (count($cols) > $cpt_cols_max) {
//        $cpt_cols_max = count($cols);
//    }
}


//vardump($banks_lines); 
//
//
//
//
//$fields['my_account'] = null;
//$fields['operation'] = null;
//$fields['date_operation'] = null;
//$fields['description'] = null;
//$fields['type'] = null;
//$fields['total'] = null;
//$fields['currency'] = null;
//$fields['date_val'] = null;
//$fields['account'] = null;
//$fields['sender'] = null;
//$fields['comunication'] = null;
//$fields['ce'] = null;
//$fields['ref'] = null;
//$fields['ref2'] = null;
//$fields['ref3'] = null;
//
//$fields = [
//    'operation' => 'Operation de banque',
//    'date_operation' => 'Date operation',
//    'description' => 'Description',
//    'type' => 'Type(+/-)',
//    'total' => 'Total ',
//    'currency' => 'EUR/USD',
//    'date_value' => 'Date Value',
//    'account_sender' => 'Account sender',
//    'sender' => 'Sender Name',
//    'comunication' => 'Comunication',
//    'ce' => 'Comunication extructure',
//    'ref' => 'Ref ',
//    'ref2' => 'Ref 2',
//    'ref3' => 'Ref 3'
//];
//
//foreach ($fields as $key => $value) {
//    echo "$key, ";
//}
//
//

include view("banks_lines", "import_check");

