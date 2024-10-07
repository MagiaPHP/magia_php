<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();

$pagination = new Pagination($page, _translations_search_full_by_lang($u_language));

$pagination->setUrl('index.php?c=_content');

$_translation = _translations_search_full_by_lang($u_language, $pagination->getStart(), $pagination->getLimit());

include view("_translations", "update");

