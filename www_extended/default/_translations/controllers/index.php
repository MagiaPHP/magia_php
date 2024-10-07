<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";

$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$l = (isset($_GET["l"]) && $_GET["l"] != "") ? clean($_GET["l"]) : false;

$error = array();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pagination = new Pagination($page, _content_search_hasNotTranslation($u_language));

$pagination->setUrl('index.php?c=_translations');

$_translation = _content_search_hasNotTranslation($u_language, $pagination->getStart(), $pagination->getLimit());

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include view("_translations", "index");

