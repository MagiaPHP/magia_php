<?php

if (!permissions_has_permission($u_rol, "contacts", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$contact_id = (($_REQUEST['contact_id']) != "") ? clean($_REQUEST['contact_id']) : false;
$billing_method = (($_REQUEST['billing_method']) != "") ? clean($_REQUEST['billing_method']) : false;

$redi = (($_REQUEST['redi']) != "") ? clean($_REQUEST['redi']) : false;

$error = array();

################################################################################
if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}

if (!$billing_method) {
    array_push($error, "tva is mandatory");
}
/////////////////////////////////////////////////////////////////////////////////

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format error send');
}
################################################################################
// formateamos la billing_method
$billing_method = strtoupper($billing_method);

###############################################################################
## Condicionales
// busca haber si hay una tva como esa

if (!in_array($billing_method, array('M', 'I'))) {
    array_push($error, 'billing_method has to be M or I');
}

#################################################################################

if (!$error) {

    // ALTER TABLE `contacts` ADD `billing_method` ENUM('M','I') NULL DEFAULT NULL AFTER `tva`; 
    // ALTER TABLE `contacts` ADD `billing_method` ENUM('M','I') NULL DEFAULT NULL AFTER `tva`;

    contacts_push_billing_method($contact_id, $billing_method);

    ############################################################################
    $data = json_encode(array(
        $contact_id, $tva
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order tva" ;
    $w = null;
    // $txt
    $description = "Update billing_method for company $contact_id new [$billing_method] ";
    $doc_id = $contact_id;
    $crud = "update";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
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

        case 2:
            header("Location: index.php?c=invoices&a=create_monhtly");
            break;

        default:
            header("Location: index.php?c=contacts&a=details&id=$contact_id");
            break;
    }
} else {

    include view("home", "pageError");
}


