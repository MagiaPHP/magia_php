<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
//$contact_id = (! empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false ;
//$ap = (! empty($_POST['ap'])) ? clean($_POST['ap']) : false;
$np = (!empty($_POST['np'])) ? ($_POST['np']) : false;
$rp = (!empty($_POST['rp'])) ? ($_POST['rp']) : false;

$error = array();

if (!$np) {
    array_push($error, "New Password dont send");
}
if (!$rp) {
    array_push($error, "Repete Password dont send");
}

if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $u_id))) {
    array_push($error, "You cannot change the password of a user with a higher rank");
}

if ($np != $rp) {
    array_push($error, "Password not the same");
}


$isError = passwordIsGood($np);

if ($isError) {
    foreach ($isError as $key => $value) {
        array_push($error, $value);
    }
}


################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
$password = password_hash($np, PASSWORD_DEFAULT);

################################################################################
################################################################################
#
// si la empresa esta aprobada ya no se puede editar
//if( contacts_field_id('status', contacts_work_for($u_id)) !=0 ){
//    array_push($error , 'Company status error') ;
//}
################################################################################
//vardump($password);
//vardump(password_hash('info@pirata.com123A', PASSWORD_DEFAULT));
//$pa = '$2y$10$ykubHCwXoICrdu0pPWuX2eM/IqtLtopeDVbDA/wrJDOqqXZ0ORiL6';
//
//// info@pirata.com123A
////'$2y$10$0mm3L6SpiD8Wm1U1BOfSGeRAVcTNbGVWQRI4GejyUsCzEtuk3OBgK'
//// $2y$10$UMSIUgAU0eIzwSC0aTBet.83Anbo/G3Dti.0jg9zF8GdX9muTHHOe
//// $2y$10$EgzuRjvRaZG/QOs0M4m0uOhgEXvh6Z87qGHuD.LgRCoHncZKHI0hK
//
//
//if (password_verify($np, $pa)) {
//    echo 'Password is valid!';
//} else {
//    echo 'Invalid password.';
//}
//
//
//die();

if (!$error) {

    contacts_password_update($u_id, $password);

    // se bloquea el ususario
    //users_block_by_contact_id($u_id) ;

    users_update_status($u_id, 2);

    // destruyo la session 
    // session_destroy() ;
    // redireciono a pagina de aprobacion 
    header("Location: index.php?c=shop&a=22&sms=update");
} else {

    include view("home", "pageError");
}
