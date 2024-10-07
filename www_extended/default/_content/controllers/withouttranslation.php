<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$txt = (isset($_GET["txt"]) && ($_GET["txt"]) != "") ? clean($_GET["txt"]) : false;

################################################################################
//// $page = (isset($_GET["page"]) && ($_GET["page"]) != "") ? clean($_GET["page"]) : 1;
//$pagination = new Pagination($page, _content_list_full());
//// puede hacer falta
////$pagination->setUrl($url);
//$_content = _content_list_full($pagination->getStart(), $pagination->getLimit());
################################################################################

$pagination = new Pagination($page, _content_search_hasNotTranslation($u_language));
$pagination->setUrl('index.php?c=_content');
$_content = _content_search_hasNotTranslation($u_language, $pagination->getStart(), $pagination->getLimit());

if (!$error) {
    include view("_content", "withouttranslation");
} else {
    include view("home", "pageError");
}
