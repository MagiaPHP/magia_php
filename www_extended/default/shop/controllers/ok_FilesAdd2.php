<?php

/*
if ( ! permissions_has_permission($u_rol , 'shop' , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$order_id = (! empty($_POST['order_id'])) ? clean($_POST['order_id']) : false ;
$image = ( ! empty($_FILES['file']) ) ? $_FILES['file'] : false ;
$side = (! empty($_REQUEST['side'])) ? clean($_REQUEST['side']) : false ;
//$description = "$u_owner_id-$side-$order_id";
$notes = (! empty($_POST['notes'])) ? clean($_POST['notes']) : null ;

$type = orders_field_id('via' , $order_id) ;
$uniqueId = orders_files_uniqid() ;

vardump($_REQUEST) ;
vardump($_POST) ;
vardump($image) ;
vardump($_FILES) ;
vardump($_FILES['file']) ;

die() ;

$error = array() ;
################################################################################
if ( ! $image ) {
    array_push($error , "Image dont send") ;
}
if ( ! $order_id ) {
    array_push($error , "order_id Don't send") ;
}
if ( ! $u_owner_id ) {
    array_push($error , "owner_id Don't send") ;
}

// verificar si existe el path

if ( ! file_exists(PATH_SCAN_FILES) ) {
    array_push($error , "PATH_SCAN_FILES Don't exist") ;
}

// Si esta carpeta tine los permisos
if ( substr(sprintf('%o' , fileperms(PATH_SCAN_FILES)) , -4) !== "0777" ) {
    array_push($error , "PATH_SCAN_FILES dont have good permision") ;
}
$vars = array() ;

array_push($vars , array( '$order_id' , $order_id )) ;
array_push($vars , array( '$image' , $image )) ;
array_push($vars , array( '$side' , $side )) ;
array_push($vars , array( '$notes' , $notes )) ;
array_push($vars , array( '$side' , $side )) ;
array_push($vars , array( '$type' , $type )) ;
array_push($vars , array( '$uniqueId' , $uniqueId )) ;


###############################################################################
## renombro la imagen 
################################################################################
################################################################################
################################################################################
################################################################################
if ( ! $error ) {
    $formated_name = orders_files_formated_name($order_id , $side , $uniqueId) ;
    // subo la imagen 
    $updateImage = new updateImage($image) ;

    echo $updateImage->send($formated_name) ;

    die() ;




    if ( $error ) {
        array_push($error , "Check you file extention please") ;

        view("home" , "pageError") ;
    }


    if ( ! $error ) {
        $newFileName = $updateImage->__get('_name') ;

        // verifico si el archivo existe para registrar en la base de datos 

        if ( file_exists("www/gallery/img/scan/$newFileName") ) {

            ///$date_registre ,  $order_id ,  $owner_id ,  $side ,  $description ,  $notes ,  $file ,  $type ,  $code ,  $status 

            orders_files_add(null , intval($order_id) , intval($u_owner_id) , $side , "" , $notes , $newFileName , $type , $uniqueId , null) ;
        } else {
            array_push($mensajes , "There was an error trying to upload the file to the server, please contact the administrator") ;

            // header("Location: index.php?c=home&a=pageError");
        }

        //header("Location: index.php?c=shop&a=orderDetails&id=$order_id&e=a");
    }
}


include view("home" , "pageError") ;
 * 
 */
