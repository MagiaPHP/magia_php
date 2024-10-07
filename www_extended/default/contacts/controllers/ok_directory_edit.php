<?php

if (!permissions_has_permission($u_rol, "directory", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$directory_id = (($_POST['directory_id']) != "") ? clean($_POST['directory_id']) : false;
$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$name = (($_POST['name']) != "") ? clean($_POST['name']) : false;
$data = (($_POST['data']) != "") ? clean($_POST['data']) : false;
$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : false;

$error = array();

if (!($directory_id)) {
    array_push($error, 'directory_id not send');
}
if (!is_id($directory_id)) {
    array_push($error, 'directory_id format error');
}
if (!$contact_id) {
    array_push($error, "contact_id not send");
}
if (!is_id($contact_id)) {
    array_push($error, '$contact_id format error');
}
if (!$name) {
    array_push($error, "name not send");
}
if (!$data) {
    array_push($error, "data not send");
}



if (!$error) {

    // $id, $contact_id, $address_id, $name,  $data, $order_by,  $status
    directory_edit(
            $directory_id, $contact_id, null, $name, $data, null, null
    );

    ############################################################################
    $data = json_encode(array(
        $directory_id, $contact_id, null, $name, $data, null, null
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Edit directory contact: $contact_id new data: [$data]";
    $doc_id = $contact_id;
    $crud = "update";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################ 

    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=details&id=$contact_id#1");
            break;

        case 2:
            header("Location: index.php?c=contacts&a=directory&id=$contact_id#2");
            break;

        default:
            header("Location: index.php?c=contacts#default");
            break;
    }
} else {

    include view("home", "pageError");
}



