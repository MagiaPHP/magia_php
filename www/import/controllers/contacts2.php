<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//$codigo = 'eyJjb21wYW55Ijp7Im5hbWUiOiJFY3VhZG9yIDAuMC4wLjAgU0EiLCJ2YXQiOiJFQzE3MTIyOTQx
//MDUwMDEiLCJGYWNlYm9vayI6ZmFsc2UsIlRlbCI6ZmFsc2UsIlRlbDIiOmZhbHNlLCJUZWwzIjpm
//YWxzZSwiRW1haWwiOmZhbHNlLCJHU00iOmZhbHNlLCJXZWIiOiJodHRwOlxcL1xcL2VjdWFkb3Iu
//Y29tIiwiRmF4IjpmYWxzZSwiRW1haWwtc2VjdXJlIjpmYWxzZX0sImNvbnRhY3QiOnsidGl0bGUi
//OiJFQzE3MTIyOTQxMDUwMDEiLCJuYW1lIjoiRUMxNzEyMjk0MTA1MDAxIiwibGFzdG5hbWUiOiJF
//QzE3MTIyOTQxMDUwMDEiLCJGYWNlYm9vayI6IiIsIlRlbCI6IiIsIlRlbDIiOiIiLCJUZWwzIjoi
//IiwiRW1haWwiOiIiLCJHU00iOiIiLCJXZWIiOiIiLCJGYXgiOiIiLCJFbWFpbC1zZWN1cmUiOiIi
//fSwiYWRkcmVzcyI6eyJCaWxsaW5nIjp7Im5hbWUiOiJCaWxsaW5nIiwiYWRkcmVzcyI6ImlzbGEg
//aXNhYmVsYSB5IGZsb3JlYW5hIiwibnVtYmVyIjoiMSIsInBvc3Rjb2RlIjoiMTcxMjA4IiwiYmFy
//cmlvIjoiU2FsdmFkb3IgQ2VsaSIsImNpdHkiOiJRdWl0byIsInJlZ2lvbiI6Im51bGwiLCJjb3Vu
//dHJ5IjoiRUMifSwiRGVsaXZlcnkiOnsibmFtZSI6bnVsbCwiYWRkcmVzcyI6bnVsbCwibnVtYmVy
//IjpudWxsLCJwb3N0Y29kZSI6bnVsbCwiYmFycmlvIjpudWxsLCJjaXR5IjpudWxsLCJyZWdpb24i
//Om51bGwsImNvdW50cnkiOm51bGx9fX0K
//'; 
//
//vardump($contact_json = base64_decode($codigo));
//($contact_json = base64_decode($codigo));
//
//die();

$tva = (isset($_GET["tva"]) && $_GET["tva"] != "" ) ? clean($_GET["tva"]) : false;

include view("import", "contacts");

/**
 * 


$tva = (isset($_GET["tva"]) && $_GET["tva"] != "" ) ? clean($_GET["tva"]) : false;
$tva = tva_formated($tva);

//// https://stackoverflow.com/questions/15617512/get-json-object-from-url
//
////$url = "https://cloud.web.com/index.php?c=_translations&a=api&s=home"; 
//$url = "http://localhost/index.php?c=_translations&a=api&s=home"; 
//
//$json = file_get_contents($url);
//$obj = json_decode($json);
//
//vardump($obj);
//vardump($obj->es_ES);
//
//    //$url = "https://cloud.web.com/index.php?c=_translations&a=api&s=home";
//    $url = "https://demo.factux.org/index.php?c=api&a=contacts&api_key=demo&id=52062";
$url = "https://demo.factux.org/index.php?c=api&a=contacts&api_key=demo&tva=$tva";
//vardump($url);
//
$json = file_get_contents($url);
$data_json = json_decode($json);
$array = json_decode($json, true);

//vardump($json);

//
//   vardump($cards = $obj->resultado[0]);
//vardump($cards = $array['estado']);
//vardump($cards = $array['codigo']);
//vardump($cards = $array['resultado'][1]);
($cards = $array['items'][0]);



//$data_json = '{"company":{"name":"3D F.A.S.T. SRL.","vat":"BE0427792566","Facebook":false,"Tel":false,"Tel2":false,"Tel3":false,"GSM":"+3226474143","Email":"info@3dfast.be","Web":"http:\\/\\/3dfast.be\\/","Fax":false,"Email-secure":false},"contact":{"title":"BE0427792566","name":"BE0427792566","lastname":"BE0427792566","Facebook":"","Tel":"","Tel2":"","Tel3":"","GSM":"","Email":"","Web":"","Fax":"","Email-secure":""},"address":{"Billing":{"name":"Billing","address":"Chauss\\u00e9e de Tubize, 485 Boite K","number":"485 Boite K","postcode":"1420","barrio":"Braine l\'Alleud","city":"Braine l\'Alleud","region":"null","country":"BE"},"Delivery":{"name":null,"address":null,"number":null,"postcode":null,"barrio":null,"city":null,"region":null,"country":null}}}';
$data_json = '{"company":{"name":"Ecuador 0.0.0.0 SA","vat":"EC1712294105001","Facebook":false,"Tel":false,"Tel2":false,"Tel3":false,"Email":false,"GSM":false,"Web":"http:\\/\\/ecuador.com","Fax":false,"Email-secure":false},"contact":{"title":"EC1712294105001","name":"EC1712294105001","lastname":"EC1712294105001","Facebook":"","Tel":"","Tel2":"","Tel3":"","Email":"","GSM":"","Web":"","Fax":"","Email-secure":""},"address":{"Billing":{"name":"Billing","address":"isla isabela y floreana","number":"1","postcode":"171208","barrio":"Salvador Celi","city":"Quito","region":"null","country":"EC"},"Delivery":{"name":null,"address":null,"number":null,"postcode":null,"barrio":null,"city":null,"region":null,"country":null}}}';



include view("import", "contacts");

if ($debug) {
    include "www/expenses/views/debug.php";
}
 * 
 */