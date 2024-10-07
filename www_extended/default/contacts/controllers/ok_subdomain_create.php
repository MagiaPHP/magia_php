<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Esta pagina agrega un usuario de factux https://xxx.factux.be
 */
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
$redi = (isset($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : 1;

$error = array();
################################################################################
# Debe estar activo el modulo subdomain
#################################################################################
// identificador
if (!$id) {
    array_push($error, 'id is mandatory');
}
// Id
if (!contacts_is_id($id)) {
    array_push($error, 'id format error');
}
################################################################################
// Creo el objeto 
$company = new Company();
// agrego la empresa
$company->setCompany($id);
// setting all i neet o create a subdomain
$company->setSubdomain();
#########################################################################
// get errors
if ($company->Why_can_not_add_a_subdomain()) {
    array_merge($error, $company->Why_can_not_add_a_subdomain());
}
##########################################################################

if (!$error) {

    // Crea el subdominio
    $company->create_subdomain();

    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=subdomain&id=$id");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {
    include view("home", "pageError");
}
