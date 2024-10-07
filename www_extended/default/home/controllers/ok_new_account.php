<?php

// esto es la creacion de la cuenta sin revisar el tva 
// para eviar q sepan cuantas cuentas hay 
//
$company_name = (isset($_POST['company_name'])) ? clean($_POST['company_name']) : 'Company name';
$tva = (isset($_POST['tva'])) ? clean($_POST['tva']) : false;
$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;
$language = (isset($_POST['language'])) ? clean($_POST['language']) : _options_option("config_system_lang_default");
$ic = (isset($_POST['ic'])) ? clean($_POST['ic']) : false; // invitacion code
//$user = strstr($email, '@', true);
$user = before('@', $email);

$code = magia_uniqid();

//$company_name =   strstr($email, '@');
//$company_name = after('@' , $email) ;
//$company_name = null;
$owner_id = _options_option("default_id_company");
$type = 1;
$title = null;
$name = null;
$lastname = null;
$birthdate = "1900-01-01";
$order_by = 1;
$status = 0; //
$tva_exist = false;

$error = array();

###############################################################################
## FORMAT de TVA
$tva = tva_formated($tva);

# Format email 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error, "Email format error");
}

###############################################################################

if (!$company_name) {
    array_push($error, "Company name is mandatory");
}

if (!$email) {
    array_push($error, "Email is mandatory");
}

if (!$tva) {
    array_push($error, "TVA is mandatory");
}

if (!$language) {
    array_push($error, 'Language is mandatory');
}

if (!$code) {
    array_push($error, 'Code is mandatory');
}
################################################################################
// Verifico si el codigo es correcto 
//if ($ic != _options_option('invitation_code')) {
//    array_push($error, 'Invitation code error');
//}
################################################################################
# Si la tva ya existe 
if (contacts_field_tva('id', $tva)) {
    array_push($error, 'Vat number already exists in our system');
}
# Si usa el tva de web, no lo dejamos 
//if ($tva == $config_company_tva) {
//    array_push($error, 'You are not allowed to use this tva number');
//}
// si email ya esta en el sistema (tabla users) error  
if (users_according_email($email)) {
    array_push($error, 'This email already exists in our system');
}
// si el tva existe, lo mandamos a q agregue la sucursal
//if (contacts_search_tva($tva)) {
//    header("Location: index.php?c=home&a=new_account_exist&tva=$tva&email=$email&language=$language");
//    // desea registrarse como oficina?
//    die();
//}
//
//vardump(contacts_search_tva($tva));
//
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
// Verifica si el email fue enviado
############################################################################
# Formato 
############################################################################
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
##------------------------------------------------------------------------------
##------------------------------------------------------------------------------
##------------------------------------------------------------------------------
##------------------------------------------------------------------------------
##------------------------------------------------------------------------------

if (!$error && AUTO_REGISTRE) {

    // 20 REGISTRAMOS LA EMPRESA 

    contacts_add(
            $owner_id, $type, null, $company_name, null, $birthdate, $tva, $code, 1, 0
    );

    // extraigo el codigo 
    $lastInsertIdCompany = contacts_field_code("id", $code);

    // Agrego la direccion
    addresses_add($lastInsertIdCompany, 'Billing', '', '', '', '', '', '', '', '', 'BE', magia_uniqid(), 1);

    // actualizo el idioma de la sede segun lo que el cliente coje    
    contacts_update_language($lastInsertIdCompany, $language);

    // agrego un email a la empresa
    $code = magia_uniqid();
    directory_add(
            $lastInsertIdCompany, null, 'Email', $email, $code, 1, 1
    );

    // 30 le asigno un nuevo propietario 
    contacts_edit_owner($lastInsertIdCompany, $lastInsertIdCompany);

    // 40 Creo el contacto 
    $code = magia_uniqid();
    contacts_add(
            //$owner_id ,         $type ,  $title ,  $name , $lastname ,  $birthdate ,   $tva, $code,  $order_by,  $status
            $lastInsertIdCompany, 0, null, $name, $lastname, "1900-01-01", null, $code, 1, 1
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

    // ponemos estatus 0 para que este en espera de aprobacion
    home_users_add(
            //$contact_id,        $language,  $rol                         $login,  $password, $email, $code, $status
            $lastInsertIdContact, $language, _options_option("default_rol"), $email, $password, $email, $code, 0
    );

    $lastInsertIduser = users_field_code('id', $code);

    // actualizo el idioma del usuario 
    users_update_language(
            $lastInsertIdContact, $language
    );

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


    header("Location: index.php?c=shop&a=0");
}




include view("home", "pageError");

