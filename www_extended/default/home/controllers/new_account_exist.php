<?php

//if($_SESSION){
//    header("Location: index.php?c=home&a=wellcome"); 
//}

$email = (isset($_GET['email'])) ? clean($_GET['email']) : false;
$tva = (isset($_GET['tva'])) ? clean($_GET['tva']) : false;
$ic = (isset($_GET['ic'])) ? clean($_GET['ic']) : false;
$language = (isset($_GET['language'])) ? clean($_GET['language']) : false;

## FORMAT de TVA
$tva = tva_formated($tva);

// verifico que el numeor de tva pertenesca a una empresa 
$company = contacts_details(contacts_field_tva('id', $tva));

// direccion de facturacion de la emprea
$ba = (addresses_billing_by_contact_id($company['id'])) ? addresses_billing_by_contact_id($company['id']) : null;

$error = array();
################################################################################
if (!$tva) {
    array_push($error, 'Tva number?');
}
/////////////////////////////////////
if (!$email) {
    array_push($error, 'Email');
}

################################################################################
# Format email 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error, "Email format error");
}

// si email ya esta en el sistema (tabla users) error  
if (users_according_email($email)) {
    array_push($error, 'This email already exists in our system');
}


if (!$error) {
    include view("home", "new_account_exist");
} else {
    include view("home", "pageError");
}

