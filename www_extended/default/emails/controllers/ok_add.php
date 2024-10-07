<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$father_id = (isset($_POST["father_id"]) && $_POST["father_id"] != "" && $_POST["father_id"] != "null" ) ? clean($_POST["father_id"]) : null;
$sender_id = (isset($_POST["sender_id"]) && $_POST["sender_id"] != "" && $_POST["sender_id"] != "null" ) ? clean($_POST["sender_id"]) : $u_id;
$reciver_id = (isset($_POST["reciver_id"]) && $_POST["reciver_id"] != "" && $_POST["reciver_id"] != "null" ) ? clean($_POST["reciver_id"]) : null;
$folder = (isset($_POST["folder"]) && $_POST["folder"] != "" && $_POST["folder"] != "null" ) ? clean($_POST["folder"]) : null;
$subjet = (isset($_POST["subjet"]) && $_POST["subjet"] != "" && $_POST["subjet"] != "null" ) ? clean($_POST["subjet"]) : null;
$message = (isset($_POST["message"]) && $_POST["message"] != "" && $_POST["message"] != "null" ) ? clean($_POST["message"]) : null;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : date("Y-m-d");
$date_read = (isset($_POST["date_read"]) && $_POST["date_read"] != "" && $_POST["date_read"] != "null" ) ? clean($_POST["date_read"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : 1;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$sender_id) {
    array_push($error, '$sender_id is mandatory');
}
if (!$reciver_id) {
    array_push($error, '$reciver_id is mandatory');
}
if (!$date_registre) {
    array_push($error, '$date_registre is mandatory');
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
if (!emails_is_sender_id($sender_id)) {
    array_push($error, '$sender_id format error');
}
if (!emails_is_reciver_id($reciver_id)) {
    array_push($error, '$reciver_id format error');
}
if (!emails_is_date_registre($date_registre)) {
    array_push($error, '$date_registre format error');
}
if (!emails_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!emails_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( emails_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {
    $lastInsertId = emails_add(
            $father_id, $sender_id, $reciver_id, $folder, $subjet, $message, $date_registre, $date_read, $order_by, $status
    );

    if ($lastInsertId) {
        emails_send_email($lastInsertId);
    }




    switch ($redi) {
        case 1:
            header("Location: index.php#1");
            break;

        case 2:
            header("Location: index.php?c=emails&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=emails");
            break;
    }
} else {

    include view("home", "pageError");
}


