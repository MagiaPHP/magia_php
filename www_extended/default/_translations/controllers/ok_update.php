<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$content = (isset($_POST["content"])) ? clean($_POST["content"]) : false;
$language = (isset($_POST["language"])) ? clean($_POST["language"]) : false;
$translation = (isset($_POST["translation"])) ? clean($_POST["translation"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();
//
################################################################################

if (!$id) {
    array_push($error, "Id is mandatory");
}
if (!$translation) {
    array_push($error, "Translation is mandatory");
}
################################################################################
if (!_translations_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    _translations_update($content, $language, $translation);

    ############################################################################
    ############################################################################
    ############################################################################
    $level = 1;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    //$w = null ;
    $description = "Update _translations: new data[id: $id, translation = $translation]";
    $doc_id = $id;
    $crud = "update";
    $error = null;
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
    ############################################################################
    ############################################################################


    switch ($redi) {
        case 1:
            header("Location: index.php?c=_translations#1");
            break;

        case 2: // UPDATE
            header("Location: index.php?c=_translations&a=search&w=all&txt=$content");
            break;

        case 3: // UPDATE
            header("Location: index.php?c=_content#3");
            break;

        default:
            header("Location: index.php#default");
            break;
    }
} else {

    include view("home", "pageError");
}

