<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$comment_id = (isset($_POST["comment_id"]) && $_POST["comment_id"] != "") ? clean($_POST["comment_id"]) : false;
$file = (isset($_POST["file"]) && $_POST["file"] != "") ? clean($_POST["file"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$comment_id) {
    array_push($error, '$comment_id is mandatory');
}
if (!$file) {
    array_push($error, '$file is mandatory');
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

if (comments_files_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = comments_files_add(
            $comment_id, $file, $order_by, $status
    );

    header("Location: index.php?c=comments_files&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


