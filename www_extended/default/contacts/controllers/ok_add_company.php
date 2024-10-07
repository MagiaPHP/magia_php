<?php

echo __FILE__;
/*
if ( ! permissions_has_permission($u_rol , "contacts" , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

//$type = (isset($_POST['type'])) ? clean($_POST['type']) : false;
$title = ($_POST['title'] != '') ? clean($_POST['title']) : null;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false ;
$tva = (isset($_POST['tva'])) ? clean($_POST['tva']) : null ;
$owner_id = (isset($_POST['owner_id'])) ? clean($_POST['owner_id']) : _options_option("default_id_company") ;
//$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : false;
//$birthday = (isset($_POST['birthday'])) ? clean($_POST['birthday']) : false;
//$status = (isset($_POST['status'])) ? clean($_POST['status']) : false;
//echo var_dump($_REQUEST);

$error = array() ;

################################################################################


if ( ! $name ) {
    array_push($error , "Name not send") ;
}

if ( contacts_search_company_name($owner_id , $name) ) {
    array_push($error , "This contact already exists") ;
}

if ( ! $error ) {

    $last_insert = contacts_add(
            //$owner_id, $type, $title, $name, $lastname, $birthdate, $order_by, $status
            $owner_id , 1 , $title , $name , null , "1900-01-01" , 1 , 1
            ) ;

    header("Location: index.php?c=contacts&a=search&txt=$name") ;
    
} else {

    array_push($error , "Check your form") ;
}

include view("contacts" , "add") ;
 * 
 */