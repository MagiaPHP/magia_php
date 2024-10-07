<?php

if (!permissions_has_permission($u_rol, "directory", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$txt = (($_POST['txt']) != "") ? clean($_POST['txt']) : false;

$data_json = '{"company":{"name":"web S.P.R.L.","vat":"BE0450478886","Facebook":"http:\\/\\/facebook.com\\/web","Tel":"+322621web","Tel2":"jiho-tel2","Tel3":"jiho-tel3","Email":"info@web.com","GSM":"+324746252552","Web":"http:\\/\\/web.com","Fax":"jiho-fax","Email-secure":"jiho-email-secure"},"contact":{"title":"BE0450478886","name":"BE0450478886","lastname":"BE0450478886","Facebook":"","Tel":"","Tel2":"","Tel3":"","Email":"","GSM":"","Web":"","Fax":"","Email-secure":""},"address":{"Billing":{"name":"Billing","address":"RUE DE GRAND-BIGARD","number":"485","postcode":"1082","barrio":"Berchem-Sainte-Agathe","city":"Bruxelles","region":"null","country":"BE"},"Delivery":{"name":null,"address":null,"number":null,"postcode":null,"barrio":null,"city":null,"region":null,"country":null}}}';

$data = json_decode($data_json, true);

$error = array();

################################################################################

if (!$error) {

    include view("contacts", "search_directory");
} else {

    include view("home", "pageError");
}
