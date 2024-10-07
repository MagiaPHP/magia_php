<?php

if (!permissions_has_permission($u_rol, 'shop_users', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$contact_id = (!empty($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
//$contact_id = $u_id; 
//$ap = (! empty($_REQUEST['ap'])) ? clean($_REQUEST['ap']) : false;
$np = (!empty($_REQUEST['np'])) ? clean($_REQUEST['np']) : false;
$rp = (!empty($_REQUEST['rp'])) ? clean($_REQUEST['rp']) : false;

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$contact_id) {
    array_push($error, 'contact_id dont send');
}

// este contacto pertenece a la empresa donde yo trabajo?
if (contacts_work_for($contact_id) != contacts_work_for($u_id)) {
    array_push($error, "This contact dont work in your company");
}

if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $contact_id))) {
    array_push($error, "You cannot change the password of a user with higher rank");
}

if (!$np) {
    array_push($error, "New Password dont send");
}
if (!$rp) {
    array_push($error, "Repete Password dont send");
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
# proceso
################################################################################

if (!$error) {

    shop_users_password_update($contact_id, $np);

    //header("Location: index.php?c=home&a=logout");
    header("Location: index.php?c=shop&a=contacts_system&id=$contact_id&sms=1");
} else {

    include view("home", 'pageError');
}






############################################################################
$data = json_encode(array(
    "contact" => $contact_id
        ));
$error = json_encode($error);

$level = 2; // 1 atention, 2 medio, 3 critico, 4 fatal
$date = null;
//$u_id
//$u_rol , 
//$c = "orders" ;
//$a = "Change order status" ;
$w = null;
// $txt
$description = "Change password: $contact_id, data: $data";
$doc_id = $contact_id;
$crud = "update";
//$error = null ;
$val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
$val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
$val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
$ip4 = get_user_ip();
$ip6 = get_user_ip6();
$broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

logs_add(
        $level, $date, $u_id, $u_rol, $c, $a, $w,
        $description, $doc_id, $crud, $error,
        $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
);

############################################################################ 