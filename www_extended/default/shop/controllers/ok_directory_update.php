<?php

if (!permissions_has_permission($u_rol, 'shop_directory', "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}


################################################################################
# Recolection de variables desde el formulario
################################################################################
//$id = (! empty($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$id = (!empty($_POST['id'])) ? clean($_POST['id']) : false;
$data = (!empty($_POST['data'])) ? clean($_POST['data']) : false;

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$id) {
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


if (directory_field_id("contact_id", $id) != $u_id) {
    array_push($error, "This directory is not yours");
}


################################################################################
# proceso
################################################################################

if (!$error) {


    shop_contacts_directory_update($id, $data);

    header("Location: index.php?c=shop&a=myInfo&e");
} else {


    include view("home", "pageError");
}




