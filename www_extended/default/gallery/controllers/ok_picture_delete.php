<?php

/**
 * delte picture
 */
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (!empty($_GET['id'])) ? clean($_GET['id']) : false;

$redi = (!empty($_GET['redi'])) ? clean($_GET['redi']) : false;

$error = array();

################################################################################
// busco el el path de la foto 
// borro la foto 
// si no existe mas borro de la db 
// redireciono 
################################################################################
$pic = gallery_details($id);
$pic_path = PATH_GALLERY_IMG_SUBDOMAIN . $pic["name"];
// si existe la borro 
if (file_exists($pic_path)) {
    unlink($pic_path);
}
// verifico si existe
if (file_exists($pic_path)) {
    array_push($error, "Could not delete photo");
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    gallery_delete($id);

    ############################################################################
    $data = json_encode(array(
        $id
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
    $description = "Update pic [$data]";
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
            header("Location: index.php?c=gallery");
            break;

        case 2:
            header("Location: index.php?c=contacts&a=details&id=$contact_id");
            break;

        case 3:
            header("Location: index.php?c=docu&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=gallery");
            break;

        default:
            header("Location: index.php?c=gallery");
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


