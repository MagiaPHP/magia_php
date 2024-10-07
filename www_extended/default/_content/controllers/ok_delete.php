<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$frase = (isset($_REQUEST["frase"])) ? clean($_REQUEST["frase"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;
$language = (isset($_REQUEST["language"])) ? clean($_REQUEST["language"]) : false;

$error = array();
################################################################################

if (!$frase) {
    array_push($error, "Frase is mandatory");
}
################################################################################

if (!_content_search_by_frase_contexto($frase)) {
    array_push($error, 'Frase is not in data base');
}
################################################################################

if (!$error) {

    _content_delete_by_frase(
            $frase
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=_translations");
            break;

        default:
            header("Location: index.php?c=_content");
            break;
    }
} else {
    include view("home", "pageError");
}


