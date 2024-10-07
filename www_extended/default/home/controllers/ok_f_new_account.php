<?php

$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$company_name = (isset($_POST['company_name'])) ? clean($_POST['company_name']) : false;
$company_vat = (isset($_POST['company_vat'])) ? clean($_POST['company_vat']) : false;
$password = (isset($_POST['password'])) ? clean($_POST['password']) : false;
// invitacion code
//$ic = (isset($_POST['email'])) ? clean($_POST['ic']) : false ;
$language = (isset($_POST['language'])) ? clean($_POST['language']) : _options_option("config_system_lang_default");
//$user = strstr($email, '@', true);
$user = before('@', $email);

$owner_id = _options_option("default_id_company");
$type = 1;
$title = null;
$lastname = null;
$birthdate = "1900-01-01";
//$tva = null ;
$code = magia_uniqid();
$order_by = 1;
$status = 1;
$error = array();

################################################################################
################################################################################
################################################################################
# Format tva
$company_vat = tva_formated($company_vat);
################################################################################
################################################################################
################################################################################
#### Solo si tiene invitacion pasa #############################################
################################################################################
//if ( ! $ic || $ic != _options_option('invitation_code') ) {
if (2021 !== 2021) {
    array_push($error, 'Invitation code error');
} else {
################################################################################
################################################################################
# Verifica la TVA
    if (contacts_field_tva('id', $company_vat)) {
        array_push($error, "Tva already in Data base");
    }
#
#
#
################################################################################
################################################################################
// Verifica si el email fue enviado
    if (!$email) {
        array_push($error, "Email dont send");
    }

// Verifica si lo eviado es un email 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Email format error");
    }

// verifica si el email esta ya en el sistema, 
    if (users_according_email($email)) {
        array_push($error, "Email exist");
    }

// pone de clave el email 
//    $password = password_hash($email, PASSWORD_DEFAULT);
// si no hay error y si auto registro esta en true
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
##
##
##
##
##
##
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
    if (!$error && AUTO_REGISTRE) {

        // REGISTRAMOS LA EMPRESA 
        contacts_add(
                $owner_id, $type, $title, $company_name, $lastname, $birthdate, $company_vat, $code, $order_by, $status
        );

        $lastInsertIdCompany = contacts_field_code("id", $code);

        // le asigno un nuevo propietario 
        contacts_edit_owner($lastInsertIdCompany, $lastInsertIdCompany);

        if (MAGIA_DEBUG) {
            echo "<p>lastInsertIdCompany $lastInsertIdCompany <p>";
            echo __LINE__;
        }

        ## Creo el contacto 
        ## Creo el contacto 
        ## Creo el contacto 
        ## Creo el contacto 
        ## Creo el contacto 
        $code = magia_uniqid();
        contacts_add(
                //$owner_id ,         $type ,  $title ,  $name ,  $lastname ,  $birthdate ,   $tva,  $order_by,  $status
                $lastInsertIdCompany, 0, null, null, null, "1900-01-01", null, $code, null, 1
        );

        $lastInsertIdContact = contacts_field_code("id", $code);

        if (MAGIA_DEBUG) {
            echo "<p>lastInsertIdContact $lastInsertIdContact <p>";
            echo __LINE__;
        }


        ## agrego el email en el directorio segun contacto
        ## agrego el email en el directorio segun contacto
        ## agrego el email en el directorio segun contacto
        ## agrego el email en el directorio segun contacto
        ## agrego el email en el directorio segun contacto

        $code = magia_uniqid();
        directory_add(
                $lastInsertIdContact, null, 'Email', $email, $code, 1, 1
        );

        $directoryLastInsertId = directory_field_code('id', $code);

        if (MAGIA_DEBUG) {
            echo "<p>directoryLastInsertId $directoryLastInsertId <p>";
            echo __LINE__;
        }

        # agrego como empleado este contacto
        # agrego como empleado este contacto
        # agrego como empleado este contacto
        # agrego como empleado este contacto
        # agrego como empleado este contacto

        employees_add(
                //$company_id ,       $contact_id ,         $owner_ref ,  $date ,  $cargo ,                           $order_by ,  $status
                $lastInsertIdCompany, $lastInsertIdContact, 'ref', null, _options_option("default_cargo"), 1, 1
        );

        $lastInsertIdEmployees = employees_by_company_contact($lastInsertIdCompany, $lastInsertIdContact)[0]['id'];

        if (MAGIA_DEBUG) {
            echo "<p>lastInsertIdEmployees $lastInsertIdEmployees <p>";
            echo __LINE__;
        }

        ## creamos el login     
        ## creamos el login     
        ## creamos el login     
        ## creamos el login     
        ## creamos el login     
        ## creamos el login     

        $code = magia_uniqid();

        home_users_add(
                //$contact_id,        $rol,                           $login, $password, $email, $status
                $lastInsertIdContact, $language, _options_option("default_rol"), $email, $password, $email, $code, 0
        );

        $lastInsertIduser = users_field_code('id', $code);

//    // actualizo el idioma del usuario 
//    users_update_language(
//            $lastInsertIdContact, $language
//    ); 

        if (MAGIA_DEBUG) {
            echo "<p>lastInsertIduser $lastInsertIduser <p>";
            echo __LINE__;
        }

        // ingreso con los datos 
        //verifi_login_password($email, $password);
        // debo pasar el email y la clave sin modificar
        verifi_login_password($email, $email);

        if (MAGIA_DEBUG) {
            echo "<p>La \$_SESSION tiene los sigueintes valores</p>";
            echo __LINE__;
            echo vardump($_SESSION);
        }

        if (MAGIA_DEBUG) {
            echo __LINE__;
            //die();
        }
        //die(__FILE__) ;
        header("Location: index.php?c=home&a=f_new_account_tks");
    }
} // invitacion code error 

include view("home", "pageError");

