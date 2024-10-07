<?php

// Para tener acceso a cargar archivos en las ordenes
// orders_files 
// 
if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$order_id = (!empty($_POST['order_id'])) ? clean($_POST['order_id']) : false;
$side = (!empty($_REQUEST['side'])) ? clean($_REQUEST['side']) : false;
$notes = (!empty($_POST['notes'])) ? clean($_POST['notes']) : "";
$file = (!empty($_FILES['file']) ) ? $_FILES['file'] : false;
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : false;

$description = "";

$status = 1;

$type = orders_field_id('via', $order_id);
//$type = 'Scan'; // solo existen tres tipos, 

$bac = orders_field_id('bac', $order_id);

$uniqueId = orders_files_uniqid();

//Con una funcion renombramos el archivo 
$newFileName = orders_files_rename($order_id, $bac, $side);

$error = array();

################################################################################
// Verificacion de diferentes informaciones
// 1 Verificar si la orde l pertenete 
// 2 el tipo de archivo esta entre los tipos de archivos permitidos 
// 3 el peso del archivo esta permitido 
// 4 viene con error?
# 1 Verifiar si el id de la orden pertenece a quien la solicita
if (orders_field_id("company_id", $order_id) != $u_owner_id) {
    array_push($error, "This order is not yours");
}

if (!$u_id) {
    array_push($error, '$u_id error');
}

if (!$order_id) {
    array_push($error, '$newFileName error');
}

if (!$side) {
    array_push($error, '$side error');
}

if (!$type) {
    array_push($error, '$type error');
}

if (!$bac) {
    array_push($error, '$bac error');
}

if (!$bac) {
    array_push($error, '$uniqueId error');
}


################################################################################
// Esto envia el archivo al servidor,
$sendfile = new fileUpdate($file);

$res = $sendfile->sendFile($newFileName);

$fileNameToDB = $sendfile->get_formatedName();

// recoje los errores al enviar el archovo al servidor 

if ($sendfile->get_Error()) {
    foreach ($sendfile->get_Error() as $key => $value) {
        array_push($error, $value);
    }
}

// Si no hay el archivo en el servidor
if (!$sendfile->checkDownloadCorrectly()) {
    array_push($error, "There was an error sending the file to the server, please send it by email");
}

################################################################################
################################################################################
################################################################################
if (!$error) {

//    orders_files_add(
//            $date_registre, $order_id, $u_owner_id, $side, $description, $notes, $fileNameToDB, $type, $uniqueId, $status
//            ); 
//            vardump(array(
//                $date_registre, $order_id, $u_owner_id, $side, $description, $notes, $fileNameToDB, $type, $uniqueId, $status
//            )); 
//    
//            die(); 
    // registro en la base de datos la imagen 
    orders_files_add(
            //$date_registre ,  $order_id ,         $owner_id,            $side ,  $description, $notes, $file ,       $type, $code,     $status   
            null, intval($order_id), intval($u_owner_id), $side, $description, $notes, $fileNameToDB, $type, $uniqueId, $status
    );

// La orden esta ready to scan, pero al enviar un archivo, 
// pasa a ready to modeling 
//    if ( intval(orders_field_id("status" , $order_id)) < 30 ) {
    //  orders_change_status($order_id , 30) ; // pasa a ready to modeling 
//    }
    ############################################################################
    $data = json_encode(array(
        null, ($order_id), intval($u_owner_id), $side, $description, $notes, $fileNameToDB, $type, $uniqueId, $status
    ));

    // nombre original del archivo
    $original_file = json_encode(
            $_FILES
    );

    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "orders";
    //$a = "Add file" ;
    $w = null;
    // $txt
    $description = "User add file, order $order_id - SIDE [ $side ] <br> data: [$data] <br> original file: $original_file";

    $doc_id = $order_id;
    $crud = "create";
    //$error = null ;
    $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
    $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
    $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################     
    # 





    header("Location: index.php?c=shop&a=orderDetails&id=$order_id&e=a");
} else {

    include view("home", "pageError");

    ############################################################################
    # DEbe ir al final qye que sino la vaiable $error se redefine###############
    ############################################################################
    $data = json_encode(array(
        null, ($order_id), intval($u_owner_id), $side, $description, $notes, $fileNameToDB, $type, $uniqueId, $status
    ));

    // nombre original del archivo
    $original_file = json_encode(
            $_FILES
    );

    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt // ok_FilesAdd
    $description = "Error: User add file in order $order_id <br> data: [$data] <br> original file: $original_file";
    $doc_id = $order_id;
    $crud = "create";
    //$error = null ;
    $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
    $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
    $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################ 
}  