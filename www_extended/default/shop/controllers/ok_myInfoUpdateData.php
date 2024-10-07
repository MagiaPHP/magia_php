<?php

/*
if ( ! permissions_has_permission($u_rol , 'shop_myinfo' , "update") ) {
    header("Location: index.php?c=home&c=no_access") ;
    die("Error has permission ") ;
}
die(); 

//$company_name = (! empty($_POST['company_name'])) ? clean($_POST['company_name']) : false;

$error = array() ;

################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if ( ! $u_owner_id ) {
    array_push($error , "id not send") ;
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if ( ! is_id($u_owner_id) ) {
    array_push($error , "Error in price") ;
}

################################################################################
# proceso
################################################################################
if ( ! $error ) {

    foreach ( $_POST["directory"] as $key => $value ) {
        if ( $value ) {
            directory_add($u_id , null , clean($key) , clean($value) , 1 , 1) ;
        }
    }


    header("Location: index.php?c=shop&a=myInfo") ;
} else {
    
    include view("home" , "pageError") ;
}



*/
