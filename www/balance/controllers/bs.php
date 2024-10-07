<?php

if (!permissions_has_permission($u_rol, "budgets", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_REQUEST['contact_id']) && $_REQUEST['contact_id'] != "" ) ? clean($_REQUEST['contact_id']) : false;

$error = array();

################################################################################
# REQUERIDO
//if (!is_id($id)) {
//    array_push($error, 'id format error send');
//}
################################################################################
# FORMATO
################################################################################
# CONDICIONES
################################################################################
################################################################################
################################################################################

if ($contact_id) { // si envio 
    $business_situation = balance_business_situation_client_id($id);
} else {
    $business_situation = balance_business_situation($id);
}

if (!$error) {

    include view("balance", "page_bs");
} else {

    include view("home", "pageError");
}





