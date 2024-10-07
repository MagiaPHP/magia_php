<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$tva = (isset($_GET["tva"]) && $_GET["tva"] != "" ) ? clean($_GET["tva"]) : false;
$tva = tva_formated($tva);

$url = "https://demo.factux.org/index.php?c=api&a=contacts&api_key=demo&tva=$tva";

$json = file_get_contents($url);
$data_json = json_decode($json);
$array = json_decode($json, true);

($cards = $array['items'][0]);

vardump($cards);

//$data_json = '{"company":{"name":"3D F.A.S.T. SRL.","vat":"BE0427792566","Facebook":false,"Tel":false,"Tel2":false,"Tel3":false,"GSM":"+3226474143","Email":"info@3dfast.be","Web":"http:\\/\\/3dfast.be\\/","Fax":false,"Email-secure":false},"contact":{"title":"BE0427792566","name":"BE0427792566","lastname":"BE0427792566","Facebook":"","Tel":"","Tel2":"","Tel3":"","GSM":"","Email":"","Web":"","Fax":"","Email-secure":""},"address":{"Billing":{"name":"Billing","address":"Chauss\\u00e9e de Tubize, 485 Boite K","number":"485 Boite K","postcode":"1420","barrio":"Braine l\'Alleud","city":"Braine l\'Alleud","region":"null","country":"BE"},"Delivery":{"name":null,"address":null,"number":null,"postcode":null,"barrio":null,"city":null,"region":null,"country":null}}}';
$data_json = '{"company":{"name":"Ecuador 0.0.0.0 SA","vat":"EC1712294105001","Facebook":false,"Tel":false,"Tel2":false,"Tel3":false,"Email":false,"GSM":false,"Web":"http:\\/\\/ecuador.com","Fax":false,"Email-secure":false},"contact":{"title":"EC1712294105001","name":"EC1712294105001","lastname":"EC1712294105001","Facebook":"","Tel":"","Tel2":"","Tel3":"","Email":"","GSM":"","Web":"","Fax":"","Email-secure":""},"address":{"Billing":{"name":"Billing","address":"isla isabela y floreana","number":"1","postcode":"171208","barrio":"Salvador Celi","city":"Quito","region":"null","country":"EC"},"Delivery":{"name":null,"address":null,"number":null,"postcode":null,"barrio":null,"city":null,"region":null,"country":null}}}';

vardump($data_json);

die();

// https://stackoverflow.com/questions/6041741/fastest-way-to-check-if-a-string-is-json-in-php


$contacts_json = (isset($_POST["contacts"]) && $_POST["contacts"] != "" ) ? ($_POST["contacts"]) : false;
$error = array();

$contacts_array = json_decode($contacts_json, true);
var_dump($contacts_json);
echo "<hr>";
var_dump(substr($contacts_json, 5, -1));
echo "<hr>";
vardump($contacts_array);
vardump($contacts_array['company']);

$code = magia_uniqid();

//
################################################################################
# REQUERIDOS
################################################################################
################################################################################
# FORMAT
################################################################################
################################################################################
# CONDICIONAL
################################################################################
################################################################################


if (!$error) {

    contacts_add(
            // $owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $code, $order_by, $status
            null, 1, null, $contacts_array["company"]['name'], null, '1900-01-01', $contacts_array['company']["vat"], $code, 1, 1
    );

    $company_id = contacts_field_code(id, $code);

    contacts_update_owner_id($company_id, $company_id);
    // agrego los datos del directory

    foreach (directory_names_list() as $key => $dir) {
        $code_dir = magia_uniqid();
        if ($contacts_array['company'][$dir['name']]) {
            directory_add($company_id, null, $dir['name'], $contacts_array['company'][$dir['name']], $code_dir, 1, 1);
        }
    }


    //ADDRESSES

    addresses_add(
            $company_id, 'Billing',
            $contacts_array['address']['Billing']['address'],
            $contacts_array['address']['Billing']['number'],
            $contacts_array['address']['Billing']['postcode'],
            $contacts_array['address']['Billing']['barrio'],
            $contacts_array['address']['Billing']['sector'],
            $contacts_array['address']['Billing']['ref'],
            $contacts_array['address']['Billing']['city'],
            $contacts_array['address']['Billing']['province'],
            $contacts_array['address']['Billing']['region'],
            $contacts_array['address']['Billing']['country'],
            magia_uniqid(),
            1
    );

    addresses_add(
            $company_id, 'Delivery',
            $contacts_array['address']['Delivery']['address'],
            $contacts_array['address']['Delivery']['number'],
            $contacts_array['address']['Delivery']['postcode'],
            $contacts_array['address']['Delivery']['barrio'],
            $contacts_array['address']['Delivery']['sector'],
            $contacts_array['address']['Delivery']['ref'],
            $contacts_array['address']['Delivery']['city'],
            $contacts_array['address']['Delivery']['province'],
            $contacts_array['address']['Delivery']['region'],
            $contacts_array['address']['Delivery']['country'],
            magia_uniqid(),
            1
    );

    // agrego el contacto 

    $code_contact = magia_uniqid();

    contacts_add(
            // $owner_id, $type, $title, $name,                               $lastname,                              $birthdate,   $tva, $code,         $order_by, $status
            null, 0, null, $contacts_array['contact']["name"], $contacts_array['contact']["lastname"], '1900-01-01', null, $code_contact, 1, 1
    );

    $contact_id = contacts_field_code(id, $code_contact);

    contacts_update_owner_id($contact_id, $company_id);

    foreach (directory_names_list() as $key => $dir) {
        $code_dir = magia_uniqid();
        if ($contacts_array['contact'][$dir['name']]) {
            directory_add($company_id, null, $dir['name'], $contacts_array['contact'][$dir['name']], $code_dir, 1, 1);
        }
    }






    header("Location: index.php?c=contacts&a=details&id=$company_id");
}


