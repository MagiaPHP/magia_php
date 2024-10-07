<?php

// Para tener acceso a cargar archivos en las ordenes
// orders_files 

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$title = (!empty($_POST['title'])) ? clean($_POST['title']) : false;
$description = (!empty($_POST['description'])) ? clean($_POST['description']) : false;
$alt = (!empty($_POST['alt'])) ? clean($_POST['alt']) : false;
$url = (!empty($_POST['url'])) ? clean($_POST['url']) : false;

$file = (!empty($_FILES['file']) ) ? $_FILES['file'] : false;

$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : false;

$status = 1;

$error = array();

// new name 
// companymane.ext 
################################################################################
################################################################################
// Esto envia el archivo al servidor, 
//$sendfile = new fileUpdate($file) ;

$sendfile = new Gallery($file);
// lista de archivos aceptados
$sendfile->_set_ext_acepted(array(
    "image/jpeg",
    "image/jpg",
//    "image/webp",
//    "image/png"
));
// donde se debe enviar el archivo? 
// con el / al final 
// define('PATH_GALLERY', "www/gallery/img/_" . _options_option('config_subdomain') . "/");
//$sendfile->_set_path("www/gallery/img/_" . $config_db . "/");
//$sendfile->_set_path(PATH_GALLERY);
//$sendfile->_set_path(PATH_GALLERY_IMG_SUBDOMAIN . "$dir/");
$sendfile->_set_path(PATH_GALLERY_IMG_SUBDOMAIN);
//
//
$sendfile->sendFile();

//
// registramos esto en la base de datos 
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


    _options_update('config_company_logo', $fileNameToDB);

    gallery_add(
            1022, null, null, $fileNameToDB, '$title', '$description', '$alt', '$url', null, magia_uniqid(), 1, 1
    );

//    
//    
//    
############################################################################
    $data = json_encode(array(
        1022, null, null, $fileNameToDB, '$title', '$description', '$alt', '$url', null, magia_uniqid(), 1, 1
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Update logo [$data]";
    $doc_id = $u_id;
    $crud = "update";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################     


    header("Location: index.php?c=config&a=logo#f");
} else {

    include view("home", "pageError");

    ############################################################################
    # DEbe ir al final qye que sino la vaiable $error se redefine###############
    ############################################################################
    $data = json_encode(
            $_POST
    );
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Error: Update logo [$data]";
    $doc_id = $u_id;
    $crud = "update";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
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


