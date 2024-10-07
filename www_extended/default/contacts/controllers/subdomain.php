<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Agrega un subdominio
 */
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false; // Numero de contacto
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
// si este contacto no tiene tva, da error 
$error = array();

////////////////////////////////////////////////////////////////////////////////
// Requerido
if (!$id) {
    array_push($error, 'id is mandatory');
}
// formato error
if (!is_id($id)) {
    array_push($error, 'id format error');
}
// not in db
if (!contacts_field_id('id', $id)) {
    array_push($error, 'id not in DB');
}
// si el modulo no esta activo 
if (!modules_field_module('status', 'subdomains')) {
    array_push($error, 'Module subdomains is inactived');
}
// si contacto 1022 erro 
//if ((int) $id == 1022) {
//    array_push($error, 'Subdomains are not available for this company');
//}
#########################################################################
$company = new Company();
$company->setCompany($id);
// activo los subdomino
$company->setSubdomain();

/////////////////////////////////////////////////////////////////////////////////
if (!$error) {
    include view("contacts", "page_subdomain");
} else {

    include view("home", "pageError");
}
