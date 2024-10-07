<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$my_title = (!empty($_POST['my_title'])) ? clean($_POST['my_title']) : false;
$my_name = (!empty($_POST['my_name'])) ? clean($_POST['my_name']) : 'Name';
$my_lastname = (!empty($_POST['my_lastname'])) ? clean($_POST['my_lastname']) : 'Lastname';
$day = (!empty($_POST['day'])) ? clean($_POST['day']) : 01;
$month = (!empty($_POST['month'])) ? clean($_POST['month']) : 01;
$year = (!empty($_POST['year'])) ? clean($_POST['year']) : 1900;
$my_birthdate = "$year-$month-$day";

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$u_owner_id) {
    array_push($error, '$u_owner_id is mandatory');
}
if (!$my_name) {
    array_push($error, "Write your name");
}
if (!$my_lastname) {
    array_push($error, 'Write your lastname');
}

################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($u_owner_id)) {
    array_push($error, "Format error in u_owner_id");
}

// si la empresa esta aprobada ya no se puede editar
//if( contacts_field_id('status', contacts_work_for($u_id)) !=0 ){
//    array_push($error , 'Company status error') ;
//}
################################################################################
################################################################################
################################################################################

if (!$error) {

    shop_contacts_update($u_id, $my_title, $my_name, $my_lastname, $my_birthdate);
    //
    header("Location: index.php?c=shop&a=2&sms=update");
} else {
    include view('home', 'pageError');
}



