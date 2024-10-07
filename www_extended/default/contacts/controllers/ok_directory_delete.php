<?php

if (!permissions_has_permission($u_rol, "directory", "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$name = (($_POST['name']) != "") ? clean($_POST['name']) : false;
$data = (($_POST['data']) != "") ? clean($_POST['data']) : false;
$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : false;

$error = array();

if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}
if (!is_id($contact_id)) {
    array_push($error, "contact_id format error is mandatory");
}

if (!$name) {
    array_push($error, "name is mandatory");
}

if (!$data) {
    array_push($error, "data is mandatory");
}



////////////////////////////////////////////////////////////////////////////////
if (!$error) {

    directory_delete_item($contact_id, $name, $data);

    ############################################################################
//    $data = json_encode(array(
//        $contact_id, $name, $data
//    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "directory";
    $a = "Delete";
    $w = null;
    // $txt
    $description = "Delete directory from contact: $contact_id name: [$name] data: [$data]";
    $doc_id = $contact_id;
    $crud = "delete";
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
        case '1':
            header("Location: index.php?c=contacts&a=directory&id=$contact_id#1");
            break;

        case '2':
            header("Location: index.php?c=contacts&a=details&id=$contact_id#2");
            break;

        case 3:
            header("Location: index.php?c=contacts&a=directory&id=$contact_id#3");
            break;

        default:
            header("Location: index.php?c=contacts&a=directory&id=$contact_id");
            break;
    }
} else {

    include view("home", "pageError");
}
