<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

###############################################################################
# V e r i f i c a c i o n 

if (!$id) {
    array_push($error, "ID Don't send");
}

###############################################################################
# Variables obligatoias
###############################################################################
if (!credit_notes_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# Transformacion
#
###############################################################################
# error si: 
# el id no existe
if (!credit_notes_field_id("id", $id)) {
    array_push($error, 'Budget id does not exist in the database');
}
# 30 // aceptado por cliente 
if (credit_notes_field_id("status", $id) == 30) {
    array_push($error, 'The credit_note has already been accepted by the client');
}
# 40 // rechazado por cliente 
if (credit_notes_field_id("status", $id) == 40) {
    array_push($error, 'The credit_note has already been registered as rejected');
}
# -10 si ya esta anulado 
if (credit_notes_field_id("status", $id) == -10) {
    array_push($error, 'The credit_note has already been canceled');
}


######################################################################### 
################################################################################
if (!$error) {
    // cambio a anulado 
    credit_notes_change_status_to($id, -10);
    ############################################################################
    ############################################################################
    ############################################################################
    // $id = $lastInsertCreditNotes; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Credit note cancel";
    $doc_id = $id;
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
    ############################################################################ 

    header("Location: index.php?c=credit_notes&a=details&id=$id");
} else {
    include view("home", "pageError");
}    