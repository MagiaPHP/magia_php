<?php

if (!permissions_has_permission($u_rol, 'shop_offices', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$title = (!empty($_POST['title']) && $_POST['title'] != '') ? clean($_POST['title']) : null;
$officeName = (!empty($_POST['officeName'])) ? clean($_POST['officeName']) : false;
$lastname = (!empty($_POST['lastname'])) ? clean($_POST['lastname']) : null;
$nationalNumber = (!empty($_POST['nationalNumber'])) ? clean($_POST['nationalNumber']) : null;
$year = (!empty($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (!empty($_POST['month'])) ? clean($_POST['month']) : 1;
$day = (!empty($_POST['day'])) ? clean($_POST['day']) : 1;
$birthdate = "$year-$month-$day";

$owner_id = contacts_work_for($u_id);

## 
$type = 1;
$status = 1;
$order_by = 0;
$error = array();
//------------------------------------------------------------------------------
// Direccion
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false; // 

$address = (!empty($_POST['address'])) ? clean($_POST['address']) : false;
$number = (!empty($_POST['number'])) ? clean($_POST['number']) : false;
$postcode = (!empty($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$barrio = (!empty($_POST['barrio'])) ? clean($_POST['barrio']) : false;
$ref = (!empty($_POST['ref'])) ? clean($_POST['ref']) : '';
$city = (!empty($_POST['city'])) ? clean($_POST['city']) : false;
$province = (!empty($_POST['province'])) ? clean($_POST['province']) : '';
$region = (!empty($_POST['region'])) ? clean($_POST['region']) : false;
$country = (!empty($_POST['country'])) ? clean($_POST['country']) : false;
$status = (!empty($_POST['status'])) ? clean($_POST['status']) : false;

$tel_name = (!empty($_POST['tel_name'])) ? clean($_POST['tel_name']) : false;
$tel_data = (!empty($_POST['tel_data'])) ? clean($_POST['tel_data']) : false;

$code = magia_uniqid();

$status = 1;
$order_by = 0;

#************************************************************************
// Data
$dataName = (!empty($_POST['dataName'])) ? clean($_POST['dataName']) : false;
$data = (!empty($_POST['data'])) ? clean($_POST['data']) : false;

//vardump($_POST) ;

$transport_code = (!empty($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;

if (!$owner_id) {
    array_push($error, "owner_id is mandatory");
}
if (!$officeName) {
    array_push($error, "Office name dont send");
}
#************************************************************************
// verifico si el id del paciente pertenece al usuario logueado 
// Verifico si el paciente existe ya en la base de datos 
###############################################################################
# Verificaciones extras
# 1) verifico si el usuario esta presente el el sistema
################################################################################
if (shop_contacts_search_name_lastname_birthdate($owner_id, $officeName, $lastname, $birthdate)) {
    array_push($error, 'Office name already exists');
}


if (!users_can_create_others_offices($u_id)) {
    array_push($error, "You can not create others offices");
}

################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    // Agrego la oficina
    shop_contacts_add(
            $owner_id, $type, $title, $officeName, $lastname, $birthdate, $code, $order_by, $status
    );

    $contactslastInsertId = contacts_field_code("id", $code);

    // agrego la direccion 
    if ($contactslastInsertId) {
        addresses_add(
                $contactslastInsertId, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code, $status
        );

        $addresessLastInsertId = addresses_field_code('id', $code);

        // agreto el transporte a la direccion

        addresses_transport_add($addresessLastInsertId, $transport_code, null);
    }

    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Add contact: $officeName $lastname ($contactslastInsertId)  ";
    $doc_id = $contactslastInsertId;
    $crud = "create";
    $error = null;
    $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
    $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
    $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = "1.2.3";
    $ip6 = "ip6";
    $broswer = "navegador";

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
//    ##----------------------------------------------------------------------
//    $email_Subject = "Shop: office new" ;
//    $reciver_email = "root@web.com"; 
//    $reciver_name ="Robin"; 
//    $reciver_lastname ="C."; 
//    $email_Body = "New office: $officeName $lastname ($contactslastInsertId) " ;
//    $email_AltBody = '$email_AltBody' ;
//##----------------------------------------------------------------------
//
//    include controller("emails" , "send_email") ;


    header("Location: index.php?c=shop&a=offices");
} else {


    include view("home", "pageError");
}
