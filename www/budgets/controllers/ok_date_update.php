<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// numero de presupuesto 
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$new_date = (isset($_REQUEST["date"])) ? clean($_REQUEST["date"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

###############################################################################
# V e r i f i c a c i o n 

if (!$id) {
    array_push($error, "ID Don't send");
}
if (!$new_date) {
    array_push($error, "ID Don't send");
}

###############################################################################
# Variables obligatoias
###############################################################################
if (!is_date($new_date)) {
    array_push($error, 'Date format error');
}
###############################################################################
# Transformacion
#
###############################################################################
# error si: 
# el id no existe
if (!budgets_field_id("id", $id)) {
    array_push($error, 'Budget id does not exist in the database');
}

//# 30 // aceptado por cliente 
//if (budgets_field_id("status", $id) == 30) {
//    //  array_push($error , 'The budget has already been accepted by the client') ;
//}
# 40 // rechazado por cliente 
if (budgets_field_id("status", $id) == 40) {
    array_push($error, 'The budget has already been registered as rejected');
}
# -10 si ya esta anulado 
if (budgets_field_id("status", $id) == -10) {
    array_push($error, 'The budget has already been canceled');
}
#
if (!budgets_can_be_edit($id)) {
    array_push($error, 'This budget can not be edit');
}
######################################################################### 
################################################################################
################################################################################

if (!$error) {

    // cambio a anulado 
    budgets_change_date($id, $new_date);

    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $invoice_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Change date : $id <br>New date: [$new_date]";
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


    switch ($redi) {
        case 1:
            header("Location: index.php?c=budgets&a=edit&id=$id");
            break;

        default:
            header("Location: index.php?c=budgets&a=details&id=$id");
            break;
    }
} else {
    include view("home", "pageError");
}    