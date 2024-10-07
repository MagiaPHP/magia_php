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
# Fecha de creacion del documento: 2024-10-02 17:10:10 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] !=""  && $_POST["contact_id"] !="null" ) ? clean($_POST["contact_id"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$address = (isset($_POST["address"]) && $_POST["address"] !=""  && $_POST["address"] !="null" ) ? clean($_POST["address"]) :  null  ;
$number = (isset($_POST["number"]) && $_POST["number"] !=""  && $_POST["number"] !="null" ) ? clean($_POST["number"]) :  null  ;
$postcode = (isset($_POST["postcode"]) && $_POST["postcode"] !=""  && $_POST["postcode"] !="null" ) ? clean($_POST["postcode"]) :  null  ;
$barrio = (isset($_POST["barrio"]) && $_POST["barrio"] !=""  && $_POST["barrio"] !="null" ) ? clean($_POST["barrio"]) :  null  ;
$sector = (isset($_POST["sector"]) && $_POST["sector"] !=""  && $_POST["sector"] !="null" ) ? clean($_POST["sector"]) :  null  ;
$ref = (isset($_POST["ref"]) && $_POST["ref"] !=""  && $_POST["ref"] !="null" ) ? clean($_POST["ref"]) :  null  ;
$city = (isset($_POST["city"]) && $_POST["city"] !=""  && $_POST["city"] !="null" ) ? clean($_POST["city"]) :  null  ;
$province = (isset($_POST["province"]) && $_POST["province"] !=""  && $_POST["province"] !="null" ) ? clean($_POST["province"]) :  null  ;
$region = (isset($_POST["region"]) && $_POST["region"] !=""  && $_POST["region"] !="null" ) ? clean($_POST["region"]) :  null  ;
$country = (isset($_POST["country"]) && $_POST["country"] !=""  && $_POST["country"] !="null" ) ? clean($_POST["country"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$contact_id) {
    array_push($error, 'Contact id is mandatory');
}
if (!$name) {
    array_push($error, 'Name is mandatory');
}
if (!$address) {
    array_push($error, 'Address is mandatory');
}
if (!$number) {
    array_push($error, 'Number is mandatory');
}
if (!$postcode) {
    array_push($error, 'Postcode is mandatory');
}
if (!$barrio) {
    array_push($error, 'Barrio is mandatory');
}
if (!$city) {
    array_push($error, 'City is mandatory');
}
if (!$country) {
    array_push($error, 'Country is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! addresses_is_contact_id($contact_id) ) {
    array_push($error, 'Contact id format error');
}
if (! addresses_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! addresses_is_address($address) ) {
    array_push($error, 'Address format error');
}
if (! addresses_is_number($number) ) {
    array_push($error, 'Number format error');
}
if (! addresses_is_postcode($postcode) ) {
    array_push($error, 'Postcode format error');
}
if (! addresses_is_barrio($barrio) ) {
    array_push($error, 'Barrio format error');
}
if (! addresses_is_city($city) ) {
    array_push($error, 'City format error');
}
if (! addresses_is_country($country) ) {
    array_push($error, 'Country format error');
}
if (! addresses_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( addresses_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( addresses_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    addresses_edit(
        $id ,  $contact_id ,  $name ,  $address ,  $number ,  $postcode ,  $barrio ,  $sector ,  $ref ,  $city ,  $province ,  $region ,  $country ,  $code ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=addresses");
            break;
            
        case 2:
            header("Location: index.php?c=addresses&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=addresses&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=addresses&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=addresses&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
