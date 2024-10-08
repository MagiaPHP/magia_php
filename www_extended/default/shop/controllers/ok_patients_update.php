<?php

if (!permissions_has_permission($u_rol, 'shop_patients', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$id = (!empty($_POST['id'])) ? intval(clean($_POST['id'])) : false;
$title = (!empty($_POST['title']) && $_POST['title'] != '') ? clean($_POST['title']) : null;
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$lastname = (!empty($_POST['lastname'])) ? clean($_POST['lastname']) : false;
$year = (!empty($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (!empty($_POST['month'])) ? clean($_POST['month']) : 1;
$day = (!empty($_POST['day'])) ? clean($_POST['day']) : 1;
$birthdate = "$year-$month-$day";

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$id) {
    array_push($error, "id is mandatory");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($id)) {
    array_push($error, "id format error");
}

################################################################################
# proceso
# if name, lastname an bd is not change, yes you can edit title





if (shop_contacts_search_name_lastname_birthdate($u_owner_id, $name, $lastname, $birthdate)) {
    array_push($error, "Contact already exists in the database");
}

if (!$name && !$lastname) {
    //array_push($error, "Name ? lastname?");
}
################################################################################




if (!$error) {


    shop_contacts_update(
            $id, $title, $name, $lastname, $birthdate
    );

    header("Location: index.php?c=shop&a=patients_details&id=$id");
} else {


    include view("home", "pageError");
}




