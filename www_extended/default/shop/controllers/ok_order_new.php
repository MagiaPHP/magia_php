<?php

/*

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$via = "Poste";
$client_ref         = ( ! empty($_POST['client_ref'])) ? clean($_POST['client_ref']) : ""; // si mandamos null hay error 
$discount           = ( ! empty($_POST['discount']) && $_POST['discount'] != "" ) ? clean($_POST['discount']) : 0;
$express            = null;
$address_delivery_id = (! empty($_POST['address_delivery'])) ? clean($_POST['address_delivery']) : null;
// Este es el paciente
$contact_id         = ( ! empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
// de este fecha depende si es expres o no 
$date_delivery      = ( ! empty($_POST['date_delivery'])) ? clean($_POST['date_delivery']) : null;
$remake             = ( ! empty($_POST['remake'])) ? clean($_POST['remake']) : null;
$hearring_loss      = ( ! empty($_POST['hearring_loss'])) ? clean($_POST['hearring_loss']) : null;
$ear                = ( ! empty($_POST['ear'])) ? clean($_POST['ear']) : NULL;
$comments           = ( ! empty($_POST['comments'])) ? clean($_POST['comments']) : null;
//$code             = ( ! empty($_POST['code'])) ? clean($_POST['code']) : null ;
$code = magia_uniqid();

$error = array();

##########################################################################################################
# Verificacion de variables obligadas
# -----------------------------------
if (!$via) {
    array_push($error, '$via is mandatory');
}

if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}

if (!$code) {
    array_push($error, '$code is mandatory');
}
##########################################################################################################
# Verificacion FORMATO de variables
# ---------------------------------
if (!orders_is_via($via)) {
    array_push($error, '$via format is not correct');
}
if (!contacts_is_id($contact_id)) {
    array_push($error, '$contact_id is is mandatory');
}
#
##########################################################################################################
# Proceso: 
# 1 $client_ref       Ya existe o no?
# 1.1 si contacto no esta en lista de pacientes onerlo 
# 2 $express          //
# 3 $address_delivery_id Pertenece al usuario?
# 4 $contact_id       Pertenece al usuario?
# 5 $remake           Viene de una orden que pertenece al paciente?
# 6 $hearring_loss    //
# 7 $ear              //
# 8 $comments         //
# 9 Asignacion de Bacs
# 10 company_id es del usuario?
# 11 Si el cliente no esta desactivo
# 12 control de fechas 
#   date_delivery debe ser superior a fechad e registro 
#   
# 
// 1 
// en la sede no se puede hacer ordenes
if (offices_is_headoffice(contacts_work_at($u_id))) {
    // array_push($error , "The headoffice can not make order") ;
}
// 2 
// 3
// 4 si el contacto no le pertenece
if (contacts_field_id("owner_id", $contact_id) != $u_owner_id) {
    array_push($error, 'This patient is not yours');
}

if (orders_field_code('id', $code)) {
    array_push($error, 'Please only one order with this code');
    array_push($error, 'It usually happens when you press the send button several times');
}


// 5
//if(orders_field_id("contact_id", $remake) != $contact_id ){
//  array_push($error, 'This order does not belong to the patient');
//}
// 6
// 7
// 8
// 9
// 10
// 11
# 
#
#
###########################################################################################################
# Preparacion o transformacion de variables para ingreso a la base de datos 
#
###########################################################################################################
#  
// lista de los bacs libres
$bacs = bacs_free_list();
// cojo el primero, si hay lo pongo sino paso el master
$bac_free = ( $bacs != null) ? $bacs[0]['name'] : _options_option("MasterBac");


if (!$bac_free) {
    array_push($error, 'There is not bac free, please contact the administrator');
}
//Si hay un bac libre lo mando a ready to scan directamente 
// sino lo pongo como registrado 
//$status = ($bac_free != NULL ) ? 20 : 10 ;
$status = 0; // BORRADOR
//
//
//
//$ab = shop_addresses_billing();
$ab = addresses_billing_by_contact_id(contacts_work_for($u_id));
$address_billing_id = $ab[0];
$address_billing_json = json_encode($ab);






$discount = intval($discount);
$description_json = json_encode($_POST);
//$price = products_search_full(0) ;
$price = 0;
$ce = null;
$remake = null;
$hearing_loss = null;
$ear = null;
################################################################################
//
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    // registro la order
    shop_orders_add_short($address_billing_json, $contact_id, $bac_free, $code, $status); 
    

    // averiguo cual fue la orden agregada con ese codigo
    $last_order_id = orders_field_code("id", $code);



    if ($last_order_id) {

        // si no esta en la tabla de pacientes, lo pongo
        if (!patients_according_company_contact($u_owner_id, $contact_id)) {
            patients_add($u_owner_id, '', $contact_id, null, null, null);
        }


        // el master bac nunca llega numero de identificdor
        if ($bac_free != "MASTER BAC") {
            // asigno el numero de orden al bac 
            bacs_add_order($last_order_id, $bac_free);
        }






        ## --------------------------------------------------------------------
        ## --------------------------------------------------------------------
        ## --------------------------------------------------------------------
        $email_Subject = "$config_company_name New order";
        $reciver_email = "roencosa@gmail.com";
        $reciver_name = "Robi";
        $reciver_lastname == "C.";
        $email_Body = "Nuevo pedido registrado";
        $email_AltBody = '$email_AltBody';
        ##----------------------------------------------------------------------        
        //include controller("emails", "send_email_file") ;
        include controller("emails", "send_email");
        ##----------------------------------------------------------------------



        header("Location: index.php?c=shop&a=order_choose_date&order_id=$last_order_id");

        
    } else {
        
        array_push($error, 'Your order could not be registered, send it by email please');
        ///FATAL ERROR///FATAL ERROR///FATAL ERROR///FATAL ERROR///FATAL ERROR

        include view("home", "pageError");
    }
} else {


    include view("home", "pageError");
}

die(); 
header("Location: index.php?c=shop&a=order_new_10&order_id=$last_order_id");
*/