<?php

// Agrega archivo a gallery

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



//$owner_id = (!empty($_POST['owner_id'])) ? clean($_POST['owner_id']) : false;
$controller = (!empty($_POST['controller'])) ? clean($_POST['controller']) : false;
$doc_id = (!empty($_POST['doc_id'])) ? clean($_POST['doc_id']) : null;
//$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$title = (!empty($_POST['title'])) ? clean($_POST['title']) : '';
$description = (!empty($_POST['description'])) ? clean($_POST['description']) : '';
$alt = (!empty($_POST['alt'])) ? clean($_POST['alt']) : '';
$url = (!empty($_POST['url'])) ? clean($_POST['url']) : '';
$date_registre = date("Y-m-d");
//file
$file = (!empty($_FILES['file']) ) ? $_FILES['file'] : false;

$code = uniqid();
$order_by = (!empty($_POST['order_by'])) ? clean($_POST['order_by']) : 1;
$status = (!empty($_POST['status'])) ? clean($_POST['status']) : 1;
//
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : false;

$error = array();

// new name 
// companymane.ext 
################################################################################
################################################################################
// Esto envia el archivo al servidor, 
//$sendfile = new fileUpdate($file) ;

$sendfile = new Gallery($file);
// lista de archivos aceptados
$sendfile->_set_ext_acepted(array("image/jpeg", "image/jpg"));
// donde se debe enviar el archivo? 
// con el / al final 
//$sendfile->_set_path("www/gallery/img/_"._options_option('config_subdomain')."/");
$sendfile->_set_path(PATH_GALLERY_IMG_SUBDOMAIN);
//$sendfile->_set_path("www/gallery/img/");
// renombramos el archivo con el nombre de la emprea y un damdom 
//$newFileName = _options_option('config_subdomain') . magia_uniqid();
//
$sendfile->sendFile();
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


    gallery_add(
            $u_owner_id,
            $controller,
            $doc_id,
            $fileNameToDB, // $name
            $title,
            $description,
            $alt,
            $url,
            $date_registre,
            $code,
            $order_by,
            $status
    );

//    gallery_add(1022, $fileNameToDB, '$title', '$description', '$alt', '$url', null, magia_uniqid(), 1, 1);
    ############################################################################
    $data = json_encode(array(
        $u_owner_id,
        $controller,
        $doc_id,
        $fileNameToDB, // $name
        $title,
        $description,
        $alt,
        $url,
        $date_registre,
        $code,
        $order_by,
        $status
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
//    $doc_id = $u_id;
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



    switch ($redi) {
        case 1:
            header("Location: index.php?c=config&a=logo#f");
            break;

        case 2:
            header("Location: index.php?c=gallery");
            break;

        case 3:
            header("Location: index.php?c=doc_models&a=edit&id=$id");
            break;

        default:
            header("Location: index.php?c=config&a=logo#f");
            break;
    }
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


