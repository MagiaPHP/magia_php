<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$comments = null;
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $comments = comments_search_by_id($txt);
        break;

    case "doc":
        $doc = (isset($_GET["doc"]) && $_GET["doc"] != "" ) ? clean($_GET["doc"]) : false;
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $comments = comments_search_by_doc($doc);
        break;

    case "doc_id":
        // index.php?c=comments&a=search&w=doc_id&doc=orders&doc_id=302860
        $doc = (isset($_GET["doc"]) && $_GET["doc"] != "" ) ? clean($_GET["doc"]) : false;
        $doc_id = (isset($_GET["doc_id"]) && $_GET["doc_id"] != "" ) ? clean($_GET["doc_id"]) : false;
        // $comments = comments_search_by_doc_doc_id($doc, $doc_id);

        vardump($doc);
        vardump($doc_id);

        $comments = comments_search_by_doc_doc_id($doc, $doc_id);
        break;

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $comments = comments_search($txt);
        break;
}


include view("comments", "index");
