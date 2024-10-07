<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : magia_uniqid();
$title = (isset($_POST["title"]) && $_POST["title"] != "" && $_POST["title"] != "null" ) ? clean($_POST["title"]) : null;
$content = (isset($_POST["content"]) && $_POST["content"] != "" && $_POST["content"] != "null" ) ? clean($_POST["content"]) : null;
$version = (isset($_POST["version"]) && $_POST["version"] != "" && $_POST["version"] != "null" ) ? clean($_POST["version"]) : null;
$date_creation = (isset($_POST["date_creation"]) && $_POST["date_creation"] != "" ) ? clean($_POST["date_creation"]) : date('Y-m-d');
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$title) {
    array_push($error, 'Title is mandatory');
}
if (!$content) {
    array_push($error, 'Content is mandatory');
}
if (!$version) {
    array_push($error, 'Version is mandatory');
}
if (!$date_creation) {
    array_push($error, 'Date_creation is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!hr_documents_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!hr_documents_is_title($title)) {
    array_push($error, 'Title format error');
}
if (!hr_documents_is_content($content)) {
    array_push($error, 'Content format error');
}
if (!hr_documents_is_version($version)) {
    array_push($error, 'Version format error');
}
if (!hr_documents_is_date_creation($date_creation)) {
    array_push($error, 'Date_creation format error');
}
if (!hr_documents_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!hr_documents_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (hr_documents_search_by_unique("id", "code", $code)) {
    array_push($error, 'Code already exists in data base');
}


//if( hr_documents_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = hr_documents_add(
            $code, $title, $content, $version, $date_creation, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_documents");
            break;

        case 2:
            header("Location: index.php?c=hr_documents&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_documents&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_documents&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_documents&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


