<?php

if (!permissions_has_permission($u_rol, "offices", "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$office_id = (($_POST['office_id']) != "") ? clean($_POST['office_id']) : false;
$id = (($_POST['id']) != "") ? clean($_POST['id']) : false;
$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : false;

$error = array();

if (!$office_id) {
    array_push($error, '$office_id is mandatory');
}
if (!is_id($office_id)) {
    array_push($error, '$office_id format error');
}


////////////////////////////////////////////////////////////////////////////////
if (!$error) {


    offices_delete($office_id);

    ############################################################################
    $data = json_encode(array(
        $contact_id, null, $name, $data, $code, 1, 1
    ));
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
            header("Location: index.php?c=contacts&a=offices&id=$id#1");
            break;
        case '2':
            header("Location: index.php?c=contacts&a=offices&id=$contact_id#2");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {

    include view("home", "pageError");
}
