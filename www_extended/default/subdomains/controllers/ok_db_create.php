<?php

die();
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$owner_id = (isset($_POST["owner_id"])) ? clean($_POST["owner_id"]) : false;
//$prefix = (isset($_POST["prefix"])) ? clean($_POST["prefix"]) : false;
//$subdomain = (isset($_POST["subdomain"])) ? clean($_POST["subdomain"]) : false;
//$domain = (isset($_POST["domain"])) ? clean($_POST["domain"]) : false;
//$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
//$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
//$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
//$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
$db_name = (!empty($_POST["db_name"])) ? clean($_POST["db_name"]) : false;

$error = array();

if (!is_only_letters_numbers($db_name)) {
    array_push($error, 'solo letras y numeros error');
}




//if (!$owner_id) {
//    array_push($error, '$owner_id is mandatory');
//}
//if (!$prefix) {
//    array_push($error, '$prefix is mandatory');
//}
//if (!$subdomain) {
//    array_push($error, '$subdomain is mandatory');
//}
//if (!$domain) {
//    array_push($error, '$domain is mandatory');
//}
//if (!$code) {
//    array_push($error, '$code is mandatory');
//}
//if (!$date_registre) {
//    array_push($error, '$date_registre is mandatory');
//}
//if (!$order_by) {
//    array_push($error, '$order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, '$status is mandatory');
//}
//
//#************************************************************************
//// Busca si uya existe el texto en la BD
//
//if (subdomains_search_by_unique("id", "subdomain", $subdomain)) {
//    array_push($error, 'subdomain already exists in data base');
//}
//
//
//
//if (subdomains_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}





if (!$error) {



    subdomains_db_create($db_name);

    //subdomains_config_create_config_file($subdomain, $domain, 'localhost', $prefix . "_" . $subdomain, '$db_user', '$db_pass');

    subdomains_db_user_create("uer", $db_name, 'Pu.emWFwz.v@)hi6');

    subdomains_db_fill($db_name);

    die();

    header("Location: index.php?c=subdomains&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


