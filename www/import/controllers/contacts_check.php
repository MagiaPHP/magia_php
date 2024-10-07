<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$check = (isset($_GET["check"]) && $_GET["check"] != "" ) ? clean($_GET["check"]) : false;

//$directory_names = directory_names_list_names();
//
//$directory_names_array = array();
//
//foreach ($directory_names as $dn) {
//    if (
//            $dn !== 'Email-secure' &&
//            $dn !== 'nationalNumber' &&
//            $dn !== 'Tel2' &&
//            $dn !== 'Fax' &&
//            $dn !== 'Tel3'
//    ) {
//        array_push($directory_names_array, strtolower($dn));
//    }
//
////    array_push($directory_names_new, strtolower($dn));
//}




//$addresses_col_array = array();
//vardump(db_cols_from_table('addresses'));

//foreach (db_cols_from_table('addresses') as $key => $col) {
//
////    vardump($col);
//
//    if ($col['Field'] !== "id" &&
//            $col['Field'] !== "contact_id" &&
//            $col['Field'] !== "name" &&
//            $col['Field'] !== "code" &&
//            $col['Field'] !== "status"
//    ) {
//        array_push($addresses_col_array, $col['Field']);
//    }
//}

//vardump($addresses_col_array);

//$contacts_cols = array(
//    'id',
//    'owner_id',
//    'type',
//    'title',
//    'name',
//    'lastname',
//    'birthdate',
//    'tva',
//    'billing_method',
//    'discounts',
////    'code',
//    'language',
////    'order_by',
////    'status',
//);

//$items_list_array = array_merge($contacts_cols, $directory_names_array);

//$items_list = array_merge($items_list_array, $addresses_col_array);

//vardump($items_list);

//$fp = fopen("tmp/contacts.csv", "r");

// Contar las columnas del archivo
// contar las lineas del archivo max 500
// las columnas del archivo deben ser las siguientes: $items_list
// si es test, solo debe haer 5 lineas en el archivo 
//
//vardump(import_contacts_col_check_format('id', 'robin'));





include view("import", "contacts_check");
