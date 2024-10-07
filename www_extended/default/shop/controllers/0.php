<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;

$error = array();

$company = new Company();
$company->setCompany($u_owner_id);

include view("shop", "0");

// 0 resumen  
// 
// 1 Nombre de la empresa y tva
// 11 Tipo de empresa 
// 12 direccion de la empresa 
// 123 direccion de entrega // si esta activa
// 13 directory de la empresa 
// 14 Banco de la empresa
// 
// 2 Datos personales (nombres y apellidos)
// 21 directory personal
// 22 Registrar una clave 
// 3 Deseas dar acceso a otra persona para que te ayude en tu gestion?
// 31 acceso a secretarya
// 32 acceso al contador 
// 
// 4 logo
// 41 Condiciones de uso
// 42 modelo de pdf
// 
// 6 membresia (coje uno )
// 7 previsualizar
// 8 pago  
// 
// en que empresa trabaja
//$office_id_work_for = contacts_work_for($u_id);
//// en que oficna trabaja
//$office_id_work_at = contacts_work_at($u_id);
//// direccion de facturacion de la emprea
//$ba = (addresses_billing_by_contact_id($office_id_work_for)) ? addresses_billing_by_contact_id($office_id_work_for) : null;
//
//// direccio de entrega de la oficina en la que trabaja
//$da = (addresses_delivery_by_contact_id($office_id_work_at)) ? addresses_delivery_by_contact_id($office_id_work_at) : null;
//// Codigo de transporte de la direccion de entrega
//$transport_code = (isset($da['id'])) ? addresses_transport_search_by_addresses_id($da['id']) : false;
//
//$directory = directory_list_by_contact_id($u_id);
//
//if ($office_id_work_for == $office_id_work_at) {
//    include view("shop", "0");
//} else {
//    header("Location: index.php?c=shop&a=");
//}
