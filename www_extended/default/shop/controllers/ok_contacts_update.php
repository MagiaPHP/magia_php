<?php

if (!permissions_has_permission($u_rol, 'shop_contacts', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$id = (!empty($_POST['id'])) ? intval(clean($_POST['id'])) : false;
//$owner_id = (! empty($_POST['owner_id'])) ? clean($_POST['owner_id']) : false;
$title = ($_POST['title'] != "" ) ? clean($_POST['title']) : null;
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
################################################################################
################################################################################

if (!$error) {

    shop_contacts_update(
            $id, $title, $name, $lastname, $birthdate
    );

    ############################################################################
    ############################################################################
    $data = json_encode(array(
        $id, $title, $name, $lastname, $birthdate
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "shop";
    $a = 'ok_contacts_update';
    $w = null;
    // $txt
    $description = "Directory update [$id] new data [$data] ";
    $doc_id = $id;
    $crud = "update";
    //$error = null ;
    //-------------------------------------------------------------------------
    $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
    $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
    $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    //-------------------------------------------------------------------------
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################




    header("Location: index.php?c=shop&a=contacts_details&id=$id");
} else {

    include view("home", "pageError");
}

