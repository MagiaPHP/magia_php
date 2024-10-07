<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
//$contact_id = (! empty($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
$contact_id = $u_owner_id; // el usuario conectado
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$data = (!empty($_POST['data'])) ? clean($_POST['data']) : false;

//vardump($_POST); die(); 


$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$contact_id) {
    array_push($error, "Name is mandatory");
}
if (!$name) {
    array_push($error, "Name is mandatory");
}
if (!$data) {
    array_push($error, "Data is mandatory");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($u_owner_id)) {
    // array_push($error, "Error in price");
}

################################################################################
# proceso
################################################################################

if (!$error) {
    shop_contacts_directory_add($contact_id, $name, $data);

    header("Location: index.php?c=shop&a=myCompany");
} else {

    include view("home", "pageError");
}




