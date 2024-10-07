<?php

if (!permissions_has_permission($u_rol, 'offices', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//vardump($_REQUEST);
//die();

$officeName = (!empty($_POST['officeName'])) ? clean($_POST['officeName']) : false;
$owner_id = (!empty($_POST['owner_id'])) ? clean($_POST['owner_id']) : false;
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : false;

## 
$type = 1;
$status = 1;
$order_by = 1;

$error = array();
//------------------------------------------------------------------------------
// Direccion
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : 'Delivery'; // Billing o delivery
$address = (!empty($_POST['address'])) ? clean($_POST['address']) : false;
$number = (!empty($_POST['number'])) ? clean($_POST['number']) : false;
$postcode = (!empty($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$barrio = (!empty($_POST['barrio'])) ? clean($_POST['barrio']) : false;
$sector = (!empty($_POST['sector'])) ? clean($_POST['sector']) : '';
$ref = (!empty($_POST['ref'])) ? clean($_POST['ref']) : '';
$city = (!empty($_POST['city'])) ? clean($_POST['city']) : false;
$province = (!empty($_POST['province'])) ? clean($_POST['province']) : '';
$region = (!empty($_POST['region'])) ? clean($_POST['region']) : false;
$country = (!empty($_POST['country'])) ? clean($_POST['country']) : false;
$status = (!empty($_POST['status'])) ? clean($_POST['status']) : false;

$directory = (!empty($_POST['directory'])) ? clean($_POST['directory']) : false;

$code = magia_uniqid();
$code_a = magia_uniqid();

$status = 1;
$order_by = 0;
#************************************************************************

$transport_code = (!empty($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;

if (!$owner_id) {
    array_push($error, "owner id is mandatory");
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


if (contacts_offices_search($owner_id, $officeName)) {
    array_push($error, 'Office name already exists');
}

################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    contacts_offices_add($officeName, $owner_id, $code);

    // busco le ultima oficina agregada
    $contactslastInsertId = contacts_field_code("id", $code);

    // agrego la direccion 
    if ($contactslastInsertId) {

        addresses_add(
                $contactslastInsertId, $name, $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, $code, $status
        );

        $addresessLastInsertId = addresses_field_code('id', $code_a);

        $validDirectoryNames = array_column(directory_names_list(), 'name');
        
        foreach ($directory as $key => $value) {
            if (in_array($value['name'], $validDirectoryNames)) {
                directory_add($contactslastInsertId, null, $value['name'], $value['data'], magia_uniqid(), 1, 1);
            }
        }
    }

    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "offices";
    $a = "create";
    $w = null;
    $description = "Add office: $officeName ($contactslastInsertId)  ";
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

    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=offices&id=$owner_id");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
    //
    //
    //
    //
    //
    //
} else {


    include view("home", "pageError");
}
