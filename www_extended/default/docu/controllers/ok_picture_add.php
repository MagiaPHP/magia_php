<?php

/**
 * Agrega una foto 
 * 
 */
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (!empty($_POST['id'])) ? clean($_POST['id']) : false;
$controller = (!empty($_POST['controller'])) ? clean($_POST['controller']) : null;
//$doc_id = (!empty($_POST['doc_id'])) ? clean($_POST['doc_id']) : null;
//$dir = (!empty($_POST['dir'])) ? clean($_POST['dir']) : null;
$date_registre = date("Y-m-d");
$file = (!empty($_FILES['file']) ) ? $_FILES['file'] : false;
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : false;

$error = array();
#################################################################################
$sendfile = new Gallery($file);
//
$sendfile->_set_ext_acepted(array(
    "image/jpeg",
    "image/jpg",
));
// folder
$sendfile->_set_path(PATH_GALLERY_IMG_SUBDOMAIN . "docu/");
// renombramos
// 
//
$sendfile->sendFile();
//
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

    // Actualizo en la base de datos 
//    user_options_push_data($contact_id, 'contacts_picture', $fileNameToDB);
//  gallery_add($owner_id, $controller, $doc_id, $name, $title, $description, $alt, $url, $date_registre, $code, $order_by, $status); 

    $code = uniqid();

    gallery_add(
            $u_id,
            $controller,
            null,
            $sendfile->get_formatedName(),
            '', // title
            '', // description
            '', // alt
            '', // url
            $date_registre,
            $code,
            1,
            1
    );

    ############################################################################
    $data = json_encode(array(
        $u_id,
        $controller,
        null,
        $sendfile->get_formatedName(),
        '', // title
        '', // description
        '', // alt
        '', // url
        $date_registre,
        $code,
        1,
        1
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
    $description = "Add pic [$data]";
    $doc_id = $id;
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
            header("Location: index.php?c=docu");
            break;

        case 2:
            header("Location: index.php?c=docu&a=edit&id=$id");
            break;

        case 3:
            header("Location: index.php?c=docu_blocs&a=edit&id=$id");
            break;

        default:
            header("Location: index.php?c=my_info");
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
    $description = "Error: Add logo [$data]";
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
