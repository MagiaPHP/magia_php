<?php

die();

/**
if ( ! permissions_has_permission($u_rol , $c , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}
 * 
 * if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");    
    die("Error has permission ");
}
 * 
 * 

//vardump($_POST); 
//die(); 
// http://localhost/audio6/index.php?c=shop&a=orderNewOK&contact_id=1085&via=Poste&client_ref=&side%5Bl%5D=true&left%5Bconstitution%5D=1&left%5Bconstitution%5D=1&left%5Bconstitution%5D=null&left%5Blength%5D=null&left%5Bhearing_lost%5D=null&left%5Bevent%5D=null&left%5Bevent%5D=&left%5Bextras%5D=null&side%5Br%5D=true&left%5Bconstitution%5D=0&rigth%5Bconstitution%5D=null&rigth%5Blength%5D=null&rigth%5Bhearing_lost%5D=null&rigth%5Bevent%5D=null&left%5Bevent%5D=&rigth%5Bextras%5D=null&comments=&address_delivery=1
//$address_billing    = (! empty($_POST['address_billing']))    ? clean($_POST['address_billing']) : false;
##########################################################################################################
# Reception de variables
##########################################################################################################
//$via = (! empty($_POST['via'])) ? clean($_POST['via']) : "Poste"; // [post, scan, ooscan]




$via = "Poste" ;
$client_ref = (! empty($_POST['client_ref'])) ? clean($_POST['client_ref']) : null ;
$discount = (! empty($_POST['discount']) && $_POST['discount'] != "" ) ? clean($_POST['discount']) : 0 ;
$express = (! empty($_POST['express'])) ? clean($_POST['express']) : null ;
$address_delivery = (! empty($_POST['address_delivery'])) ? clean($_POST['address_delivery']) : null ;
$contact_id = (! empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false ;
// de este fecha depende si es expres o no 
$date_delivery = (! empty($_POST['date_delivery'])) ? clean($_POST['date_delivery']) : false ;
//
$remake = (! empty($_POST['remake'])) ? clean($_POST['remake']) : null ;
$hearring_loss = (! empty($_POST['hearring_loss'])) ? clean($_POST['hearring_loss']) : null ;
$ear = (! empty($_POST['ear'])) ? clean($_POST['ear']) : NULL ;
$comments = (! empty($_POST['comments'])) ? clean($_POST['comments']) : null ;
$code = magia_uniqid() ;
            
$error = array() ;

//echo vardump($_POST['comments']); die(); 
##########################################################################################################
# Verificacion de variables obligadas
# -----------------------------------
if ( ! $u_rol ) {
    array_push($error , '$u_rol not send') ;
}
if ( ! $via ) {
    array_push($error , '$via not send') ;
}

if ( ! $contact_id ) {
    array_push($error , '$contact_id not send') ;
}
if ( ! $date_delivery ) {
    array_push($error , 'date_delivery not send') ;
}
#
##########################################################################################################
# Verificacion FORMATO de variables
# ---------------------------------
if ( ! orders_is_via($via) ) {
    array_push($error , '$via format is not correct') ;
}
if ( ! orders_is_client_ref($client_ref) ) {
    array_push($error , '$client_ref format is not correct') ;
}
if ( ! orders_is_express($express) ) {
    //array_push($error, '$express format is not correct');
}
if ( ! addresses_is_address($address_delivery) ) {
    // array_push($error, '$address_delivery format is not correct');
}
if ( ! contacts_is_id($contact_id) ) {
    array_push($error , '$contact_id is not send') ;
}
if ( ! orders_is_date_delivery($date_delivery) ) {
    array_push($error , '$date_delivery format error') ;
}
if ( ! orders_is_id($remake) ) {
    //array_push($error, '$remake id format is not correct');
}
if ( ! orders_is_comments($comments) ) {
    array_push($error , '$comments format is not correct') ;
}
#
##########################################################################################################
# Proceso: 
# 1 $client_ref       Ya existe o no?
# 1.1 si contacto no esta en lista de pacientes onerlo 
# 2 $express          //
# 3 $address_delivery Pertenece al usuario?
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
// 4
if ( contacts_field_id("owner_id" , $contact_id) != $u_owner_id ) {
    array_push($error , 'This patient is not yours') ;
}

$ab = shop_addresses_billing() ;
$address_billing = $ab[0][0] ;

################################################################################
################################################################################
if ( ! $error ) {


    // si no esta en la tabla de pacientes, lo pongo
    if ( ! patients_according_company_contact($u_owner_id , $contact_id) ) {
        patients_add($u_owner_id , '' , $contact_id , null , null , null) ;
    }





    shop_orders_add(
            $via , $express , $date_delivery , $client_ref , $address_billing , null , 
            $contact_id , '' , null , null , null , '' , null , null , null , null , $code, 10 , null , null , null
    );
    

    
    $last_order = orders_field_code('id', $code); 

    //die(); 
    // header("Location: index.php?c=shop&a=orderEdit&id=$last_order");
} else {





     
    include view("home" , "pageError") ;
}
 * 
 */