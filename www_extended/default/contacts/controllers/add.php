<?php

if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$vat = (isset($_GET['vat'])) ? clean($_GET['vat']) : false;
$new = (isset($_GET['new'])) ? clean($_GET['new']) : false;

$error = array();

if (contacts_field_id('tva', $u_owner_id) == $vat) {
    array_push($error, 'The vat number is yours');
}

//if (contacts_field_vat('id', $txt)) {
//    array_push($error, "TVA number already exists in your system");
//}
// Busca contactos en la base de datos cloud
// Pero debo buscar tambien en mi base de datos 
//
$contacts = array();

if ($vat) {

//    include "www/contacts/models/Vat.php";
    // esto busca en cloud 
//    $cloud_contacts = cloud_contacts_search($txt);
//    $vat = new Vat($txt);
//    vardump($vat->vat_is_correct_format('BE'));
//    echo "<hr>";
//    vardump(array(
//        '$cloud_contacts' => $cloud_contacts
//    ));
    // Busca en mis contactos
//    $my_contacts = contacts_search_my_contacts($txt);
    // si invierto el orden cambio la prioridad
    // juntos los dos resultados 
//    $contacts = array_merge($my_contacts, $cloud_contacts);
    //
    // los resultados de la busqueda
//    vardump($contacts);
    //
    //
// au no esta listo para la red de factux
// au no esta listo para la red de factux
// au no esta listo para la red de factux
// au no esta listo para la red de factux
// au no esta listo para la red de factux
    $contacts = contacts_search_my_contacts($vat);
}


################################################################################
// Si la vat existe, error
// sino enviar al formulario 
################################################################################
if (!$error) {

    include view("contacts", "add");
} else {

    include view("home", "pageError");
}



