<?php

if (!permissions_has_permission($u_rol, "contacts", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$description = (($_POST['description']) != "") ? clean($_POST['description']) : false;

$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : false;

$error = array();

################################################################################
if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}

if (!$description) {
    array_push($error, "description is mandatory");
}
/////////////////////////////////////////////////////////////////////////////////

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format error send');
}


################################################################################
###############################################################################
#################################################################################

if (!$error) {

    // pongo un push
    contacts_update_description(
            $contact_id, $description
    );

    ############################################################################
    $data = json_encode(array(
        $contact_id, $description
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order description" ;
    $w = null;
    // $txt
    $description = "Update description for company $contact_id new description: [$description] ";
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


