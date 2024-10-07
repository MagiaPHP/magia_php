<?php

if (!permissions_has_permission($u_rol, "contacts", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Si ya tiene un subdominio, ya no se puede editar el tva del cliente 
// 
//if ($u_rol != 'root') {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}
//
///**
// * Solo el root puede editar el tva
// */

$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$tva = (($_POST['tva']) != "") ? clean($_POST['tva']) : false;
$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : false;
$error = array();

################################################################################
if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}

if (!$tva) {
    array_push($error, "tva is mandatory");
}
/////////////////////////////////////////////////////////////////////////////////

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format error send');
}
################################################################################
// formateamos la tva
$tva = tva_formated($tva);

###############################################################################
## condicioales
// busca haber si hay una tva como esa

if (contacts_field_tva('id', $tva)) {
    array_push($error, 'Tva already exists');
}

#################################################################################

if (!$error) {

    contacts_update_tva(
            $contact_id, $tva
    );

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
    $description = "Update tva for company $contact_id new tva: [$tva] ";
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


