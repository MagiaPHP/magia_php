<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$tva = (isset($_REQUEST['tva'])) ? clean($_REQUEST['tva']) : false;
//$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;

$company_cloud = false;

$error = array();

// si mando la tva, 
// busco empresas 

if ($tva) {
    // busco una empresa que tenga el tva como este
    // en este caso debe ser exactamente la tva 
    // sino debe dar error 
    $company_cloud = cloud_company_details($tva);
}
###############################################################################
if (!$error) {
    // add company 
    include view('contacts', 'cloud_add_company');
} else {

    include view("home", "pageError");
}