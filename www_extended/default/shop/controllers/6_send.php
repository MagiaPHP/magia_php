<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;

$company = new Company();
$company->setCompany($u_owner_id);

// si la empresa esta aprobada ya no se puede editar
// y se le redirecciona al inicio
//if( contacts_field_id('status', contacts_work_for($u_id)) !=0 ){
//    header("Location: index.php?c=shop");
//    die(); 
//}
## --------------------------------------------------------------------
## --------------------------------------------------------------------
## --------------------------------------------------------------------
// Si El email es correcto del usuar
if (users_field_contact_id('email', $u_id)) {
    $email_Subject = "$config_company_name Thank you for your registration";
    $reciver_email = users_field_contact_id('email', $u_id);
    $reciver_name = contacts_field_id('name', $u_id);
    $reciver_lastname = contacts_field_id('lastname', $u_id);
    $email_Body = "$reciver_name,
Your registration is awaiting approval,
$config_company_name";
    $email_AltBody = "$reciver_name, Your registration is awaiting approval, $config_company_name";
    ;
    // sino mandamos al root
    // sino mandamos al root
    // sino mandamos al root
    // sino mandamos al root
    // sino mandamos al root
    // sino mandamos al root
} else {
    $email_Subject = "$config_company_name Thank you for your registration ERROR";
    $reciver_email = $config_company_email_secure;
    $reciver_name = "Robin";
    $reciver_lastname = "C.";
    $email_Body = "$reciver_name,
Your registration is awaiting approval,
$config_company_name";

    $email_AltBody = "ERROR !! $reciver_name, Your registration is awaiting approval, $config_company_name";
}
//$email_Subject      = "$config_company_name Thank you for your registration" ;
//        $reciver_email      = ()? users_field_contact_id('email', $u_id) : $config_company_email_secure ; 
//        $reciver_name       = "Robi";
//        $reciver_lastname   = "C."; 
//        $email_Body         = "Nuevo pedido registrado" ;
//        $email_AltBody      = '$email_AltBody' ;
##----------------------------------------------------------------------        
//include controller("emails", "send_email_file") ;
include controller("emails", "send_email");
##----------------------------------------------------------------------




include view("shop", "6");
