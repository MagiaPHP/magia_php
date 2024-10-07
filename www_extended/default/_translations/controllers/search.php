<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$_translations = null;

$w = (isset($_GET["w"]) && $_GET['w'] != '') ? clean($_GET["w"]) : false;

$txt = (isset($_GET["txt"]) && $_GET['txt'] != '') ? clean($_GET["txt"]) : false;

$l = (isset($_GET["l"]) && $_GET['l'] != '') ? clean($_GET["l"]) : false;

$error = array();

if (!$error) {

    switch ($w) {
        case 'c':
            $_content = _content_search($txt);
            include view("_translations", "search_c");
            break;

        case 't':
            // busca la lista de palabras que coincidan y en el idioma dado
            $_translations = _translations_search_by_lang($txt, $u_language);
            // busca una sola palabra en el idioma dado
            // $_translations = _translations_search_by_content_language($content, $language);
            include view("_translations", "search_t");
            break;
        //----------------------------------------------------------------------
        case 'porcentajes':
            // palabras con porcentajes
            $_content = _translations_search_porcentajes_by_lang();
            // busca una sola palabra en el idioma dado
            //            $_translations = _translations_search_by_content_language($content, $language);
            include view("_translations", "search_c");
            break;
        //----------------------------------------------------------------------
        case 'start_with':
            // palabras con porcentajes
//            $l = (isset($_GET["l"]) && $_GET['l'] != '') ? clean($_GET["l"]) : false;
//            $_content = _translations_search_porcentajes_by_lang();
            $_content = _content_search_starts_with($l);
            // busca una sola palabra en el idioma dado
            //            $_translations = _translations_search_by_content_language($content, $language);
            include view("_translations", "search_c");
            break;
        //------------------------------------------------------------------------------
        default:
            $_content = _content_search_full($txt, $u_language);
//            echo __LINE__; 
            include view("_translations", "search_full");
            break;
    }
} else {

    include view("home", "pageError");
}


