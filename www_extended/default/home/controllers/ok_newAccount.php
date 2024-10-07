<?php

// esto es la creacion de la cuenta sin revisar el tva 
$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$tva = (isset($_POST['tva'])) ? clean($_POST['tva']) : false;
$ic = (isset($_POST['ic'])) ? clean($_POST['ic']) : false;
$language = (isset($_POST['language'])) ? clean($_POST['language']) : _options_option("config_system_lang_default");

//vardump($email); die(); 
//$user = strstr($email, '@', true);
$user = before('@', $email);

//$company_name =   strstr($email, '@');
//$company_name = after('@' , $email) ;
$company_name = null;
$owner_id = _options_option("default_id_company");
$type = 1;
$title = null;
$name = $company_name;
$lastname = null;
$birthdate = "1900-01-01";
$tva = null;
$code = magia_uniqid();
$order_by = 1;
$status = 1;
$code = magia_uniqid();
$tva_exist = false;

$error = array();

################################################################################
#### Solo si tiene invitacion pasa #############################################
################################################################################
if (!$ic || $ic != _options_option('invitation_code')) {
    array_push($error, 'Invitation code error');
} else {
################################################################################
    ################################################################################
    ################################################################################
    ################################################################################
// Verifica si el email fue enviado
    if (!$email) {
        array_push($error, "Email dont send");
    }

// Verifica si la tva fue enviado
    if (!$tva) {
        array_push($error, "TVA dont send");
    }


// Verifica si lo eviado es un email 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Email format error");
    }

// verifica si es un numero de tva 
    // Verifica si el numero de tva existe en la base de datos 
    if (contacts_search_tva($tva)) {
        $tva_exist = true;
    }

    // si la tva existe
    // sugerimos crear una sucursal 
    // sino creamos la sede
    if ($tva_exist) {
        header("Location index.php?c=home&a=add_sucursal");
    }



    // si no existe la tva, se sigue normalmente 
    // si no existe la tva, se sigue normalmente 
    // si no existe la tva, se sigue normalmente 
    // si no existe la tva, se sigue normalmente 
    // si no existe la tva, se sigue normalmente 
    // si no existe la tva, se sigue normalmente 
    // si no existe la tva, se sigue normalmente 
    // 10 * pone de clave el email 
    // 20 Registramos la empresa
    // 30 Asigno un propietario a la empresa creada
    // 40 Creo un contacto con los dartos enviado / que pertenece a la emprea creada
    // 50 recojo el id del contacto creado
    // 60 agrego en el directorio el email del contacto creado
    // 70 Agrego en la tabla empleados el empleado creado /  con la empresa creada
    // 80 creamos el login     
    $password = password_hash($email, PASSWORD_DEFAULT);

// si no hay error y si auto registro esta en true
##
##
    if (!$error && AUTO_REGISTRE) {

        // 20 REGISTRAMOS LA EMPRESA 
        contacts_add(
                $owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $code, $order_by, $status
        );

        // extraigo el codigo 
        $lastInsertIdCompany = contacts_field_code("id", $code);

        // 30 le asigno un nuevo propietario 
        contacts_edit_owner($lastInsertIdCompany, $lastInsertIdCompany);

        // 40 Creo el contacto 
        $code = magia_uniqid();
        contacts_add(
                //$owner_id ,         $type ,  $title ,  $name ,  $lastname ,  $birthdate ,   $tva,  $order_by,  $status
                $lastInsertIdCompany, 0, null, null, null, "1900-01-01", null, $code, null, 1
        );

        // 50 recojo el id del contacto creado
        $lastInsertIdContact = contacts_field_code("id", $code);

        if (MAGIA_DEBUG) {
            echo "<p>lastInsertIdContact $lastInsertIdContact <p>";
            echo __LINE__;
        }


        // 60 agrego en el directorio el email del contacto creado

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
        // 70 Agrego en la tabla empleados el empleado creado /  con la empresa creada

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
        // 80 creamos el login     
        // 80 creamos el login     
        // 80 creamos el login     
        // 80 creamos el login     
        // 80 creamos el login     

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
//    


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

        header("Location: index.php?c=shop&a=myInfo");
    }
} // invitacion code error 



include view("home", "pageError");

