<?php

if (!permissions_has_permission($u_rol, "patients", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$company_id = (isset($_POST['company_id'])) ? clean($_POST['company_id']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$owner_ref = (isset($_POST['owner_ref'])) ? clean($_POST['owner_ref']) : null;
$cargo = (isset($_POST['cargo'])) ? clean($_POST['cargo']) : 'Employee';
$rol = (isset($_POST['rol'])) ? clean($_POST['rol']) : false;
$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$password = (isset($_POST['password'])) ? clean($_POST['password']) : false;

$password = password_hash($password, PASSWORD_DEFAULT);

$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : false;
$date = null;
$order_by = 1;
$status = 1;

$error = array();

################################################################################
if (!$company_id) {
    array_push($error, '$company_id dont send');
}

if (!$contact_id) {
    array_push($error, '$contact_id dont send');
}

//if ( ! $cargo ) {
//    array_push($error , '$cargo dont send') ;
//}
################################################################################
if (!is_id($company_id)) {
    array_push($error, '$company_id format error');
}

if (!is_id($contact_id)) {
    array_push($error, '$contact_id format error');
}


################################################################################
if (!$error) {


    employees_add(
            $company_id, $contact_id, $owner_ref, $date, $cargo, $order_by, $status
    );

    if (employees_by_company_contact($company_id, $contact_id)) {

        users_add($contact_id, 'en_GB', $rol, $email, $password, $email, magia_uniqid(), 1);
    }




    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Add contact [$contact_id] like employee  in company [$company_id]";
    $doc_id = $contact_id;
    $crud = "update";
    $error = null;
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
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "users";
    $a = "create";
    $w = null;
    $description = "Add user [$email] ";
    $doc_id = $contact_id;
    $crud = "update";
    $error = null;
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
            header("Location: index.php?c=contacts&a=contacts&id=$company_id");
            break;

        default:

            header("Location: index.php?c=contacts");
            break;
    }
} else {

    include view("home", "pageError");
}

