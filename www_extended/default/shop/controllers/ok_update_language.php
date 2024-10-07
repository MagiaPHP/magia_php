<?php

if (!permissions_has_permission($u_rol, 'shop', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$language = (!empty($_REQUEST["language"]) ) ? clean($_REQUEST["language"]) : false;
$redi = (!empty($_REQUEST["redi"]) ) ? clean($_REQUEST["redi"]) : false;

$error = array();

if (!$language) {
    array_push($error, '$language is mandatory');
}

if (!$error) {

    users_update_language($u_id, $language);

    switch ($redi) {
        case 2:
            header("Location: index.php?c=shop&a=1");
            break;

        default:
            header("Location: index.php?c=shop&a=changeLanguage");
            break;
    }
    //
    //
} else {

    include view("home", "pageError");
}
