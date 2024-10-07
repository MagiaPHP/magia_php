<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$ap = (!empty($_REQUEST['ap'])) ? clean($_REQUEST['ap']) : false;
$np = (!empty($_REQUEST['np'])) ? clean($_REQUEST['np']) : false;
$rp = (!empty($_REQUEST['rp'])) ? clean($_REQUEST['rp']) : false;

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$ap) {
    array_push($error, "Password dont send");
}
if (!$np) {
    array_push($error, "New Password dont send");
}
if (!$rp) {
    array_push($error, "Repete Password dont send");
}

if (!password_verify($ap, users_password())) {
    array_push($error, "Actual Password incorrect");
}

if ($np != $rp) {
    array_push($error, "Password not the same");
}

if ($rp == users_field_contact_id("email", $u_id)) {
    array_push($error, 'It is not a good idea to have the email as a password, use another please');
}

################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
$np = password_hash($np, PASSWORD_DEFAULT);

################################################################################
################################################################################
################################################################################
if (!$error) {

    shop_password_update($np);

    header("Location: index.php?c=home&a=logout&sms=ok");
} else {

    include view("home", 'pageError');
}





