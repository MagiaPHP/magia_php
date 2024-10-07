<?php

if (!permissions_has_permission($u_rol, 'shop_directory', "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$id = (($_POST['id']) != "") ? clean($_POST['id']) : false;
$name = (($_POST['name']) != "") ? clean($_POST['name']) : false;
$data = (($_POST['data']) != "") ? clean($_POST['data']) : false;

$type = contacts_field_id("type", $contact_id);

$error = array();

if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}
if (!$name) {
    array_push($error, "name is mandatory");
}
if (!$data) {
    array_push($error, "data is mandatory");
}

################################################################################
// puedo editar otras oficinas?
// puedo editar esta oficina ?
// puedo borrar este contacto que es mio ?
################################################################################
################################################################################
if (!$error) {

    shop_contacts_directory_delete(
            $contact_id, $name, $data
    );

    ############################################################################
    ############################################################################
    $data_json = json_encode(array(
        $contact_id, $name, $data
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "shop";
    $a = 'directory_by_office';
    $w = null;
    // $txt
    $description = "Directory delete [$name] > [$data] ";
    $doc_id = $contact_id;
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


    if (contacts_field_id('type', $contact_id) == 1) { // si es oficina 
        header("Location: index.php?c=shop&a=directory_by_office&id=$id");
    } else {
        header("Location: index.php?c=shop&a=contacts_directory&id=$id");
    }
} else {
    include view("home", "pageError");
}


