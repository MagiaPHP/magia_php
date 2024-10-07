<?php

/**
 * Agrega el paciente 
 */
if (!permissions_has_permission($u_rol, 'shop_patients', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$title = (!empty($_POST['title']) && $_POST['title'] != '') ? clean($_POST['title']) : null;

$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$lastname = (!empty($_POST['lastname'])) ? clean($_POST['lastname']) : false;
$nationalNumber = (!empty($_POST['nationalNumber'])) ? clean($_POST['nationalNumber']) : null;

$year = (!empty($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (!empty($_POST['month'])) ? clean($_POST['month']) : 1;
$day = (!empty($_POST['day'])) ? clean($_POST['day']) : 1;
$birthdate = "$year-$month-$day";
## 
$type = 0;
$code = magia_uniqid();
$status = 1;
$order_by = 1;

$error = array();

#************************************************************************

if (!$u_owner_id) {
    array_push($error, "owner_id is mandatory");
}

if (!$name || !$lastname) {
    array_push($error, "Name ? lastname?");
}

#
#************************************************************************
// verifico si el id del paciente pertenece al usuario logueado 
// Verifico si el paciente existe ya en la base de datos 
// 
// 
#************************************************************************
################################################################################
# Verificaciones extras
# 1) verifico si el usuario esta presente el el sistema
################################################################################
if (shop_contacts_search_name_lastname_birthdate($u_owner_id, $name, $lastname, $birthdate)) {
    array_push($error, "Patient ya existe");
}

################################################################################

if (!$error) {

    shop_contacts_add(
            $u_owner_id, $type, $title, $name, $lastname, $birthdate, $code, $order_by, $status
    );

    $contactslastInsertId = contacts_field_code("id", $code);

    patients_add($u_owner_id, '', $contactslastInsertId, null, null, null);

    if ($nationalNumber != "") {
        directory_add($contactslastInsertId, null, "nationalNumber", $nationalNumber, 1, 1);
    }





    header("Location: index.php?c=shop&a=patients");
} else {


    include view("home", "pageError");
}
