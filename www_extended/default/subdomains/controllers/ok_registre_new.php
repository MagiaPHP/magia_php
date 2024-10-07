<?php

die();

//if (!permissions_has_permission($u_rol, $c, "create")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}

/**
 * name: robinson 
 * lastname: coello
 * company: factux
 * tva: BE123456789
 * email: info@mail.com
 * 
 */
$name = (!empty($_POST["name"])) ? clean($_POST["name"]) : false;
$lastname = (!empty($_POST["lastname"])) ? clean($_POST["lastname"]) : false;
$company = (!empty($_POST["company"])) ? clean($_POST["company"]) : false;
$tva = (!empty($_POST["tva"])) ? clean($_POST["tva"]) : false;
$email = (!empty($_POST["email"])) ? clean($_POST["email"]) : false;
$password = (!empty($_POST["password"])) ? clean($_POST["password"]) : false;
$password2 = (!empty($_POST["password2"])) ? clean($_POST["password2"]) : false;

$tva = tva_formated($tva);

$prefix = 'factuxbe';
$subdomain = $tva;
$domain = "factux.be";

//
$code = magia_uniqid();
$date_registre = (!empty($_POST["date_registre"])) ? clean($_POST["date_registre"]) : date("d-m-Y");
$order_by = (!empty($_POST["order_by"])) ? clean($_POST["order_by"]) : 1;
$status = (!empty($_POST["status"])) ? clean($_POST["status"]) : 1;
$redi = (!empty($_POST["redi"])) ? clean($_POST["redi"]) : 1;

$error = array();

################################################################################
################################################################################
################################################################################
if (!$prefix) {
    array_push($error, '$prefix is mandatory');
}
if (!$subdomain) {
    array_push($error, '$subdomain is mandatory');
}
if (!$domain) {
    array_push($error, '$domain is mandatory');
}
#################################################################################
#################################################################################
#################################################################################
// Busco si la tva existe
// Si el email existe 
// si las claves no son iguales 
// 
if (contacts_field_tva('id', $tva)) {
    array_push($error, 'Vat number already in Factux');
}
if (users_according_email($email)) {
    array_push($error, 'Email already in our data base');
}
if ($password != $password2) {
    array_push($error, 'Password is not the same');
}
// Busca si uya existe el texto en la BD
if (subdomains_search_by_unique("id", "subdomain", $subdomain)) {
    array_push($error, 'Subdomain already exists in data base');
}
################################################################################
################################################################################
################################################################################
################################################################################
// codifico el password
//$password = password_hash($email, PASSWORD_DEFAULT);
$password = users_password_hash($password);
// 
// 
$code_company = "A" . magia_uniqid();
$code_contact = "B" . magia_uniqid();
$code_directory = "C" . magia_uniqid();
$code_domain = "D" . magia_uniqid();
$code_user = "U" . magia_uniqid();
// rol por defecto si no hay pongo el rol de mas bajo rango 
// rol por defecto para los que crean subdominios 
// deberia ser rol Factux, o sino coje el rol con menor rango 
// 
$rol_factux = (rols_is_rol(subdomains_rol_for_new_account())) ? subdomains_rol_for_new_account() : rols_by_rango_min();

// 
// 
################################################################################
if (!$error) {



    // crea la compania   
    contacts_add(1022, 1, null, $company, null, '1900-01-01', $tva, $code_company, 1, 1);

    // busco si se registro 
    $company_id = contacts_field_code('id', $code_company);

    // crea el contacto   
    contacts_add($company_id, 0, null, $name, $lastname, '1900-01-01', null, $code_contact, 1, 1);

    // busco el contacto 
    $contact_id = contacts_field_code('id', $code_contact);

    // si se registro hago esto 
    if ($contact_id && $company_id) {

        // actualizo el propietario de la companya
        contacts_update_owner_id($company_id, $company_id);

        // actualizo el propietario del contacto 
        contacts_update_owner_id($contact_id, $company_id);

        // registro su email 
        directory_add($contact_id, null, 'Email', $email, $code_directory, 1, 1);

        // registro como empleado de la empresa este nuevo contacto 
        employees_add($company_id, $contact_id, 'New user factux', date('Y-m-d'), 'Employee', 1, 1);

        // registro como usuario en espera de aprobacion 
        users_add($contact_id, 'en_GB', $rol_factux, $email, $password, $email, $code_user, 0); // 0 esperando ser aprobado
        //
        // creo el subdominio 
        subdomains_add(
                $company_id, $prefix, $subdomain, $domain, $code_domain, null, 1, 1
        );

        // busco el id del subdomain
        $subdomain_id = subdomains_field_code('id', $code_domain);

        // creo todo lo necesario en cpanel 
    } else { // sino 
        // por que no se pudo agregar el contacto, asi que prevenir por qe 
        // registrar que este contacto quiere el subdominio 
        // o redireccionar al detale del subdominio
        echo "<hr> contacto ya existe";
        die();
    }



    switch (intval($redi)) {
        case 1:
            header("Location: index.php?c=public_html&a=tks&code=$code_domain");
            break;

        default:
            header("Location: index.php?c=subdomains&a=details&id=$code_domain");
            break;
    }
} else {

    include view("home", "pageError");
}



