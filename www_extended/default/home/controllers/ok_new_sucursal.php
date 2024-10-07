<?php

// Agrega una sucursal a una empresa existente (tva)

$tva = (isset($_POST['tva'])) ? clean($_POST['tva']) : false;
$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$language = (isset($_POST['language'])) ? clean($_POST['language']) : _options_option("config_system_lang_default");

//$user = strstr($email, '@', true);
$user = before('@', $email);

$code = magia_uniqid();

//$company_name =   strstr($email, '@');
//$company_name = after('@' , $email) ;
$company_name = null;
$owner_id = _options_option("default_id_company");
$default_cargo = (_options_option("default_cargo")) ? _options_option("default_cargo") : "default_cargo";
//$default_rol = (_options_option("default_rol"))? _options_option("default_rol") : null; 
$default_rol = "HeadOffice";
$type = 1;
$title = null;
$name = null;
$lastname = null;
$birthdate = "1900-01-01";
//$tva = null ;

$order_by = 1;
$status = 0; //

$error = array();

###############################################################################
## FORMAT de TVA 
$tva = tva_formated($tva);

# Format email 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error, "Email format error");
}

###############################################################################


if (!$email) {
    array_push($error, "Email dont send");
}

if (!$tva) {
    array_push($error, "TVA dont send");
}
if (!$language) {
    array_push($error, 'Language dont send');
}
if (!$code) {
    array_push($error, 'Code dont send');
}
################################################################################
################################################################################
# Si usa el tva de web, no lo dejamos 
if ($tva == $config_company_tva) {
    array_push($error, 'You are not allowed to use this tva number');
}
// si email ya esta en el sistema (tabla users) error  
if (users_according_email($email)) {
    array_push($error, 'This email already exists in our system');
}

// si la tva enviada no existe, damos error
if (!contacts_search_tva($tva)) {
    array_push($error, 'This TVA not exists in our system');
}

// saco la sede segun la tva 
$headOffice_id = contacts_field_tva('owner_id', $tva);

// si da error, no se pudo sacar la sede
if (!$headOffice_id) {
    array_push($error, 'Get $headOffice_id error');
}


############################################################################
#
#
# 10 sacamos la sede 
# 20 registramos la oficina 
# 30 creamos el contacto
# 40 agregamos este contacto a esta oficina como empleado
# 50 agrego al directorio el email del contacto 
# 60 
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


    // 10
    // 20 Registramos la sede con dueño la headoffice
//    contacts_add(
//            $owner_id, $type, null, $company_name, null, $birthdate, $tva, $code, $order_by, $status
//    );
    // Registramos la sucursal
    contacts_add($headOffice_id, 1, null, null, null, $birthdate, null, $code, $order_by, 0);

    // extraigo el codigo 
    $lastInsertIdSucursal = contacts_field_code("id", $code);

    if (MAGIA_DEBUG) {
        echo "<p>$lastInsertIdSucursal $lastInsertIdSucursal <p>";
        echo "<p>Line: " . __LINE__ . "</p>";
    }



    // 40 Creo el contacto 
    $code_contact = magia_uniqid();
    contacts_add(
            //$owner_id ,         $type ,  $title ,  $name ,  $lastname ,  $birthdate ,   $tva,  $order_by,  $status
            $lastInsertIdSucursal, 0, null, null, null, "1900-01-01", null, $code_contact, null, 1
    );

    // 50 recojo el id del contacto creado
    $lastInsertIdContact = contacts_field_code("id", $code_contact);

    if (MAGIA_DEBUG) {
        echo "<p>lastInsertIdContact $lastInsertIdContact <p>";
        echo "<p>Line: " . __LINE__ . "</p>";
    }


    // 60 agrego en el directorio el email del contacto creado

    $code = magia_uniqid();
    directory_add(
            $lastInsertIdContact, null, 'Email', $email, $code, 1, 1
    );

    $directoryLastInsertId = directory_field_code('id', $code);

    if (MAGIA_DEBUG) {
        echo "<p>directoryLastInsertId $directoryLastInsertId <p>";
        echo "<p>Line: " . __LINE__ . "</p>";
    }

    # agrego como empleado este contacto
    # agrego como empleado este contacto
    # agrego como empleado este contacto
    # agrego como empleado este contacto
    # agrego como empleado este contacto
    // 70 Agrego en la tabla empleados el empleado creado /  con la empresa creada

    employees_add(
            //$company_id ,       $contact_id ,         $owner_ref ,  $date ,  $cargo ,   $order_by ,  $status
            $lastInsertIdSucursal, $lastInsertIdContact, 'ref', null, $default_cargo, 1, 1
    );

    $lastInsertIdEmployees = employees_by_company_contact($lastInsertIdSucursal, $lastInsertIdContact)[0]['id'];

    if (MAGIA_DEBUG) {
        echo "<p>lastInsertIdEmployees $lastInsertIdEmployees <p>";
        echo "<p>Line: " . __LINE__ . "</p>";
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
            //$contact_id,        $rol,                    $login, $password, $email, $status
            $lastInsertIdContact, $language, $default_rol, $email, $password, $email, $code, 0
    );

    $lastInsertIduser = users_field_code('id', $code);

// actualizo el idioma del usuario 
    users_update_language(
            $lastInsertIdContact, $language
    );

    if (MAGIA_DEBUG) {
        echo "<p>lastInsertIduser $lastInsertIduser <p>";
        echo "<p>Line: " . __LINE__ . "</p>";
    }

    // ingreso con los datos 
    //verifi_login_password($email, $password);
    // debo pasar el email y la clave sin modificar    
    verifi_login_password($email, $email);

    if (MAGIA_DEBUG) {
        echo "<p>La \$_SESSION tiene los sigueintes valores</p>";
        echo "<p>Line: " . __LINE__ . "</p>";
        echo vardump($_SESSION);
    }

    if (MAGIA_DEBUG) {
        echo "<p>Line: " . __LINE__ . "</p>";
        //die();
    }

    //die(__FILE__) ;

    if (!MAGIA_DEBUG) {
        header("Location: index.php?c=shop&a=1");
        echo "<p>Line: " . __LINE__ . "</p>";
    }
}




include view("home", "pageError");

