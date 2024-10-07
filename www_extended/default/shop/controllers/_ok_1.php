<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$company_name = (!empty($_POST['company_name'])) ? clean($_POST['company_name']) : null;
$tva = (!empty($_POST['tva'])) ? clean($_POST['tva']) : null;
$email = (!empty($_POST['email'])) ? clean($_POST['email']) : null;

$error = array();

################################################################################
# Verificacion de varialbes obligatorias
# Empresa: 
#       Nombre
#       Tva
#       Email
if ($company_name == "" || $company_name == null) {
    array_push($error, "Company name is mandatory");
}
if ($tva == "" || $tva == null) {
    array_push($error, "Vat number is mandatory");
}
if ($email == "" || $email == null) {
    array_push($error, "Email is mandatory");
}
################################################################################
# Formato 
#       Nombre
#       Tva
#       Email
if (!contacts_is_name($company_name)) {
    array_push($error, "Company name format error");
}
if (!contacts_is_tva($tva)) {
    array_push($error, "Vat format error");
}
if (!directory_is_email($email)) {
    array_push($error, "Email format error");
}
#################################################################################
# Condicional
#       Tva existe en la DB?
#       Email existe en la DB?
if (contacts_field_tva('id', $tva)) {
    array_push($error, "Vat number already in data base");
}
// id de la company
if (directory_by_contact_name($u_owner_id, 'Email')) { // este mail ya existe
    array_push($error, "Email already in data base");
}
#################################################################################
################################################################################
if (!$error) {


    contacts_push_name($company_name);
    contacts_push_tva($tva);
    //
    //
    //
    // directory
    //__________________________________________________________________________
    //_ Registro logs V2 _______________________________________________________
    //__________________________________________________________________________
    $data = json_encode(array(
        null
    ));
    //
    logs_add(
            $level = 0, // 1 atention, 2 medio, 3 critico, 4 fatal 
            null, // date
            $u_id, $u_rol, $c, $a,
            isset($w) ?? null, // WHERE
            "Update logo [$data]", // $description, 
            isset($doc_id) ?? null, // $doc_id =  id de l documento
            'create', // Create, read update, delete
            ($error) ?? null, // si hay error
            ($_GET) ?? null, ($_POST) ?? null, ($_REQUEST) ?? null
    );
    //__________________________________________________________________________
    //__________________________________________________________________________
    //__________________________________________________________________________
    //
    //
    switch ($redi) {
        case 1:
            header("Location: index.php?c=shop&a=_2");
            break;

        default:
            header("Location: index.php?c=shop&a=_2");
            break;
    }
} else {
    //__________________________________________________________________________
    //_ Registro logs V2 _______________________________________________________
    //__________________________________________________________________________
    $data = json_encode(array(
        null
    ));
    //
    logs_add(
            $level = 0, // 1 atention, 2 medio, 3 critico, 4 fatal 
            null, // date
            $u_id, $u_rol, $c, $a,
            isset($w) ?? null, // WHERE
            "Update logo [$data]", // $description, 
            isset($doc_id) ?? null, // $doc_id =  id de l documento
            'create', // Create, read update, delete
            ($error) ?? null, // si hay error
            ($_GET) ?? null, ($_POST) ?? null, ($_REQUEST) ?? null
    );
    //__________________________________________________________________________
    //__________________________________________________________________________
    //__________________________________________________________________________
    // Registro de logs
    include view("home", "pageError");
}



