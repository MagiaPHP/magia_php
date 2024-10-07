<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "") ? clean($_POST["doc_id"]) : false;
$folder = (isset($_POST["folder"]) && $_POST["folder"] != "") ? clean($_POST["folder"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$doc_id) {
    array_push($error, '$doc_id is mandatory');
}
if (!$folder) {
    array_push($error, '$folder is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
################################################################################
//
###############################################################################
# CONDICIONAL
################################################################################

if (comment_folder_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = comment_folder_add(
            $doc_id, $folder, $order_by, $status
    );

    header("Location: index.php?c=comment_folder&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


