<?php

/*
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id       = (isset($_POST['order_id']))   ? clean($_POST['order_id'])     : false;
$image          = (!empty($_FILES['image']) )   ? $_FILES['image']              : false;
$side           = (isset($_REQUEST['side']))    ? clean($_REQUEST['side'])      : false;
//$description = "$u_owner_id-$side-$id";
$notes          = (isset($_REQUEST['notes']))   ? clean($_REQUEST['notes'])     : null;
$type           = orders_field_id('via', $id);
$uniqueId       = orders_files_uniqid();

$mensajes = array();
################################################################################
if (!$image) {
    array_push($mensajes, "Image dont send");
}
if (!$id) {
    array_push($mensajes, "order_id Don't send");
}
if (!$u_owner_id) {
    array_push($mensajes, "owner_id Don't send");
}



###############################################################################
## renombro la imagen 
################################################################################
if (!$mensajes) {

    // subo la imagen 
    $subir = new update_File_Class();    
    $formated_name = orders_files_formated_name($id, $side, $uniqueId);   
    $subir->init($image, $formated_name);        
    
/// si hay error al subir la imagen     
    if($subir->get_Error()){
        array_push($mensajes, $subir->get_Error());
    }
    
    

    

   
    if( ! $mensajes){
        $newFileName = $subir->__get('_name');
        
        // verifico si el archivo existe para registrar en la base de datos 
        
        if(file_exists("www/gallery/img/scan/$newFileName")){
            $lastInsertId = orders_files_add(intval($id), intval($u_owner_id), $side, "", $notes, $newFileName, $type, $uniqueId); 
            
            if($lastInsertId){
                array_push($mensajes, "File send");
            }
            
            
        }else {
            array_push($mensajes, "There was an error trying to upload the file to the server, please contact the administrator");
            
           // header("Location: index.php?c=home&a=pageError");
            
        }
        
        
        
             
        
       // header("Location: index.php?c=shop&a=orderDetails&id=$id&e=a");
    
    }
}

//include "www/home/views/errorPage.php"; 