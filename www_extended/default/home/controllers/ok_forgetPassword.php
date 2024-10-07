<?php

/**
 * Registra el pedido de cambio de clave
 * envia un email con el codigo
 * 
 * 
 */
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);

$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;

/**
 * Verifica si es un email 
 * Verifica si es un email en la ase de datos 
 * 
 */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error, "Email format error");
}

// si no hay error, ejecutamos


if (users_according_email($email)) {
    // obtengo el contact_id desde el email de los usuarios
    $reciver_email = $email;
    $contact_id = users_contact_id_according_email($email);
    //
    $reciver_name = contacts_field_id('name', $contact_id);
    $reciver_lastname = contacts_field_id('lastname', $contact_id);
    $reciver = "$reciver_name $reciver_lastname";
    $code = magia_uniqid();

    if (!$reciver_email) {
        array_push($error, '$reciver_email no enviado');
    }

    if (!$contact_id) {
        array_push($error, '$contact_id no enviado');
    }

    // Esto registra en la base de dtos el pedido de cambio de clave
    users_ask_pass_add(
            //$contact_id , $code ,  $date ,  $status   
            $contact_id, $code, null, 0
    );

    //include "www_extended/default/emails/templates/defecto/lostPassword.php"; 
    // sistema para enviar emails
    // sistema para enviar emails
    // sistema para enviar emails
    // sistema para enviar emails
    // sistema para enviar emails
    // sistema para enviar emails
    ## --------------------------------------------------------------------
    ## --------------------------------------------------------------------
    ## --------------------------------------------------------------------
    $email_Subject = "$config_company_name Lost password";
    //$reciver_email = "roencosa@gmail.com"; 
    //$reciver_name ="Robi";
    //$reciver_lastname == "C."; 
    $email_Body = " Hi $reciver_name,</ br>

We’ve received a request to reset your password.</ br>

If you didn’t make the request, just ignore this message. Otherwise, you can reset your password.</ br>

Code: $code
    
<a href=\"$config_company_url/index.php?c=home&a=updatePassword&code=$code&email=$reciver_email\">Reset your password</a> </ br>

Thanks,</ br>
The $config_company_name team </ br>";

    $email_AltBody = '$email_AltBody';

    ##----------------------------------------------------------------------                
    include controller("emails", "send_email");
    ##----------------------------------------------------------------------
    //include view("emails" , "tmp_lostPassword") ;
    // _t("Check your email") ;
    //echo "<p>go to <a href=\"index.php?c=home&a=updatePassword&code=$code&email=$email\">go</a></p>" ;
}
// Exista o no en la base de datos, presentamos el mensaje del revisar el correo 
// Exista o no en la base de datos, presentamos el mensaje del revisar el correo 
// Exista o no en la base de datos, presentamos el mensaje del revisar el correo 
// Exista o no en la base de datos, presentamos el mensaje del revisar el correo 

message("info", "Check your email");

include view("home", "forgetPassword");

//header("Location index.php?c=home&a=forgetPassword"); 