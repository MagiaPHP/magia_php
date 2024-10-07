<?php

if (!permissions_has_permission($u_rol, 'contacts', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST['id'])) ? intval(clean($_POST['id'])) : false;
$title = (($_POST['title']) != '') ? clean($_POST['title']) : null;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false;
$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : false;
$year = (isset($_POST['year'])) ? clean($_POST['year']) : false;
$month = (isset($_POST['month'])) ? clean($_POST['month']) : false;
$day = (isset($_POST['day'])) ? clean($_POST['day']) : false;
//
$birthdate = ($year && $month && $day) ? "$year-$month-$day" : contacts_field_id('birthdate', $id);
$error = array();

if ($id == 1022) {
    array_push($error, "Company edit disabled");
}
################################################################################
################################################################################


if (!$id) {
    array_push($error, "id is mandatory");
}

//if (!$title) {
//    //array_push($error, "Title is mandatory");
//}

if (!$name) {
    array_push($error, "Name is mandatory");
}

if (!$lastname) {
    array_push($error, "Lastname is mandatory");
}

if (!$birthdate) {
    array_push($error, "Birthday is mandatory");
}

################################################################################

if (!is_id($id)) {
    array_push($error, "ID format error");
}

if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $id))) {
    array_push($error, "You cannot edit a user with a higher rank");
}


// Busco el contacto 
//if (contacts_search_by_company_and_name_lastname_birthdate(contacts_field_id("owner_id", $id), $name, $lastname)) {
if (contacts_search_name_lastname_birthdate(contacts_field_id("owner_id", $id), $name, $lastname, $birthdate)) {
    array_push($error, "Contact exist in this company");
}

################################################################################

if (!$error) {

    contacts_update(
            $id, $title, $name, $lastname, $birthdate
    );

    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Update contact $id";
    $doc_id = $id;
    $crud = "update";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = "1.2.3";
    $ip6 = "ip6";
    $broswer = "navegador";

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################

    header("Location: index.php?c=contacts&a=details&id=$id&e");
}

include view("home", "pageError");
