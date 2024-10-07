<?php

if (!permissions_has_permission($u_rol, "contacts", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$name = (($_POST['name']) != "") ? clean($_POST['name']) : false;
$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : false;

$error = array();

################################################################################

if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}

if (!$name) {
    array_push($error, "Name is mandatory");
}

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format error send');
}


#################################################################################
#################################################################################
#################################################################################

if (!$error) {

    contacts_update_name(
            $contact_id, $name
    );

    ############################################################################
    $data = json_encode(array(
        $contact_id, "name", $name
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
    $description = "Update contact : [$contact_id], new data [name : $name ]";
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
            header("Location: index.php?c=contacts&a=details&id=$contact_id");
            break;

        default:
            header("Location: index.php?c=contacts&a=details&id=$contact_id");
            break;
    }
} else {

    include view("home", "pageError");
}


