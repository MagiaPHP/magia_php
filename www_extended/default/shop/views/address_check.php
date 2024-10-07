<?php

// no tiene direccion de facturacion
//if( contacts_field_id("name", $u_id) == "name" || contacts_field_id("lastname", $u_id) == "lastname" ){
//   header("Location: index.php?c=shop&a=4"); 
//}

$login = users_field_contact_id("login", $u_id);
$passwordh = users_field_contact_id("password", $u_id);

// si la clave es el email 
if (password_verify($login, $passwordh)) {
    header("Location: index.php?c=shop&a=5");
}


// no tiene direccion de facturacion
if (!shop_addresses_delivery()) {
    header("Location: index.php?c=shop&a=3");
}


if (!shop_addresses_billing() && offices_is_headoffice($u_owner_id)) {
    header("Location: index.php?c=shop&a=2");
}


// si la empresa se llama 
if (shop_check_company_name() && offices_is_headoffice($u_owner_id)) {
    header("Location: index.php?c=shop&a=1&name");
}


if (!contacts_field_id("tva", $u_owner_id) && offices_is_headoffice($u_owner_id)) {
    header("Location: index.php?c=shop&a=1&tva");
}   
