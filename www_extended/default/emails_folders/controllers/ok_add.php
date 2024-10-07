<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" && $_POST["contact_id"] != "null" ) ? clean($_POST["contact_id"]) : $u_id;
$folder = (isset($_POST["folder"]) && $_POST["folder"] != "" && $_POST["folder"] != "null" ) ? clean($_POST["folder"]) : null;
$icon = (isset($_POST["icon"]) && $_POST["icon"] != "" && $_POST["icon"] != "null" ) ? clean($_POST["icon"]) : '<span class="glyphicon glyphicon-folder-close"></span>';
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();

################################################################################
# REQUIRED
################################################################################
if (!$folder) {
    array_push($error, '$folder is mandatory');
}
if (!$icon) {
    array_push($error, '$icon is mandatory');
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
if (!emails_folders_is_folder($folder)) {
    array_push($error, '$folder format error');
}
if (!emails_folders_is_icon($icon)) {
    array_push($error, '$icon format error');
}
if (!emails_folders_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!emails_folders_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//
//if (emails_folders_search_by_unique("id", "folder", $folder)) {
//    array_push($error, 'folder already exists in data base');
//}

if (emails_folders_search_by_contact_id_folder_name($contact_id, $folder)) {
    array_push($error, 'Folder already exists in data base');
}


//if( emails_folders_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = emails_folders_add(
            $contact_id, $folder, $icon, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=emails_folders&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        case 4:
            header("Location: index.php?c=emails");
            break;

        case 5:
            header("Location: index.php?c=emails&a=config_folders");
            break;

        default:
            header("Location: index.php?c=emails_folders");
            break;
    }
} else {

    include view("home", "pageError");
}


