<?php

#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:55 
#################################################################################
# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");

    # y matamos el proceso 
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" && $_POST["contact_id"] != "null" ) ? clean($_POST["contact_id"]) : null;
$country = (isset($_POST["country"]) && $_POST["country"] != "" && $_POST["country"] != "null" ) ? clean($_POST["country"]) : null;
$license = (isset($_POST["license"]) && $_POST["license"] != "" && $_POST["license"] != "null" ) ? clean($_POST["license"]) : null;
$type = (isset($_POST["type"]) && $_POST["type"] != "" && $_POST["type"] != "null" ) ? clean($_POST["type"]) : null;
$number = (isset($_POST["number"]) && $_POST["number"] != "" && $_POST["number"] != "null" ) ? clean($_POST["number"]) : null;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] != "" && $_POST["date_start"] != "null" ) ? clean($_POST["date_start"]) : null;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] != "" && $_POST["date_end"] != "null" ) ? clean($_POST["date_end"]) : null;
$expired = (isset($_POST["expired"]) && $_POST["expired"] != "" && $_POST["expired"] != "null" ) ? clean($_POST["expired"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
#################################################################################
# REQUIRED
#################################################################################

if (!$contact_id) {
    array_push($error, 'Contact id is mandatory');
}
if (!$country) {
    array_push($error, 'Country is mandatory');
}
if (!$license) {
    array_push($error, 'License is mandatory');
}
if (!$type) {
    array_push($error, 'Type is mandatory');
}
if (!$number) {
    array_push($error, 'Number is mandatory');
}
if (!$date_start) {
    array_push($error, 'Date start is mandatory');
}
if (!$date_end) {
    array_push($error, 'Date end is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

#################################################################################
# FORMAT
#################################################################################

if (!veh_drivers_is_contact_id($contact_id)) {
    array_push($error, 'Contact id format error');
}
if (!veh_drivers_is_country($country)) {
    array_push($error, 'Country format error');
}
if (!veh_drivers_is_license($license)) {
    array_push($error, 'License format error');
}
if (!veh_drivers_is_type($type)) {
    array_push($error, 'Type format error');
}
if (!veh_drivers_is_number($number)) {
    array_push($error, 'Number format error');
}
if (!veh_drivers_is_date_start($date_start)) {
    array_push($error, 'Date start format error');
}
if (!veh_drivers_is_date_end($date_end)) {
    array_push($error, 'Date end format error');
}
if (!veh_drivers_is_order_by($order_by)) {
    array_push($error, 'Order by format error');
}
if (!veh_drivers_is_status($status)) {
    array_push($error, 'Status format error');
}

#################################################################################
# CONDITIONAL
#################################################################################
# --> por que agrego en www_extended?
# --> Borro estas tres lineas 
//if( veh_drivers_search_by_unique("id","type", $type)){
//    array_push($error, 'Type already exists in data base');
//}
// Agrego estas otras 
// si existe ese numero y pais debe dar error 
if (veh_drivers_search_by_country_number($country, $number)) {
    array_push($error, "This driver's license number is registered with this country.");
}


# --> 
# --> 
# --> 
//if( veh_drivers_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
#################################################################################
#################################################################################
#################################################################################
#################################################################################

if (!$error) {
    $lastInsertId = veh_drivers_add(
            $contact_id, $country, $license, $type, $number, $date_start, $date_end, $expired, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_drivers");
            break;

        case 2:
            header("Location: index.php?c=veh_drivers&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=veh_drivers&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=veh_drivers&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=veh_drivers&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


