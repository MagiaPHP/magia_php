<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$section = (isset($_POST["section"]) && $_POST["section"] != "" && $_POST["section"] != "null" ) ? clean($_POST["section"]) : null;
$open = (isset($_POST["open"]) && $_POST["open"] != "" && $_POST["open"] != "null" ) ? clean($_POST["open"]) : null;
$items = (isset($_POST["open"]) && $_POST["items"] != "" && $_POST["open"] != "items" ) ? clean($_POST["items"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : null;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$section) {
    array_push($error, '$section is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!doc_sections_is_section($section)) {
    array_push($error, '$section format error');
}
if (!doc_sections_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!doc_sections_is_status($status)) {
    array_push($error, '$status format error');
}

////////////////////////////////////////////////////////////////////////////////
$section = ucfirst(strtolower($section));
$section = str_replace(' ', '_', $section);

###############################################################################
# CONDITIONAL
################################################################################

if (doc_sections_search_by_unique("id", "section", $section)) {
    array_push($error, 'section already exists in data base');
}


//if( doc_sections_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = doc_sections_add(
            $section, $open, $items, $order_by, $status
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=doc_sections&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=doc_sections&a=edit&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=doc_sections");
            break;
    }
} else {

    include view("home", "pageError");
}


