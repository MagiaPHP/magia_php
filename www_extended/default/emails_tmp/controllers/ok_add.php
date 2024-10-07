<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" && $_POST["contact_id"] != "null" ) ? clean($_POST["contact_id"]) : false;
$controller = (isset($_POST["controller"]) && $_POST["controller"] != "" && $_POST["controller"] != "null" ) ? clean($_POST["controller"]) : false;
$tmp = (isset($_POST["tmp"]) && $_POST["tmp"] != "" && $_POST["tmp"] != "null" ) ? clean($_POST["tmp"]) : false;
$body = (isset($_POST["body"]) && $_POST["body"] != "" && $_POST["body"] != "null" ) ? clean($_POST["body"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!emails_tmp_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!emails_tmp_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( emails_tmp_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = emails_tmp_add(
            $contact_id, $controller, $tmp, $body, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=emails_tmp&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;
        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        case 5:
            header("Location: index.php?c=emails&a=config_tmp_emails");
            break;

        default:
            header("Location: index.php?c=emails_tmp");
            break;
    }
} else {

    include view("home", "pageError");
}


