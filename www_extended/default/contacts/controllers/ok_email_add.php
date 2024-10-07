<?php

if (!permissions_has_permission($u_rol, "directory", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$email = (($_POST['email']) != "") ? clean($_POST['email']) : false;
$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : false;
$code = magia_uniqid();

$error = array();

if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}
if (!$email) {
    array_push($error, "email is mandatory");
}
#///////////////////////////////////////////////////////////////////////////////
if (!is_id($contact_id)) {
    array_push($error, "contact_id format error is mandatory");
}

if (!is_email($email)) {
    array_push($error, "email format error is mandatory");
}
#///////////////////////////////////////////////////////////////////////////////

if (users_according_email($email)) {
    array_push($error, "Email already in the system");
}

################################################################################
################################################################################
################################################################################
################################################################################


if (!$error) {

    directory_add(
            $contact_id, null, "Email", $email, $code, 1, 1
    );

    $li = directory_field_code('Email', $code);

    ############################################################################
    $data = json_encode(array(
        $contact_id, null, "Email", $email, $code, 1, 1
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "directory";
    $a = "create";
    $w = null;
    // $txt
    $description = "Add email contact: $contact_id data: [$email] [id: $li]";
    $doc_id = $li;
    $crud = "create";
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
            header("Location: index.php?c=contacts&a=system&id=$contact_id#1");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {

    include view("home", "pageError");
}
