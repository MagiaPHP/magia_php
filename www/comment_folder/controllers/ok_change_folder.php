<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
//$id = (isset($_GET["id"]) && $_GET["id"] !="" ) ? clean($_GET["id"]) : false;
$order_id = (isset($_GET["order_id"]) && $_GET["order_id"] != "" ) ? clean($_GET["order_id"]) : false;
$folder = (isset($_GET["folder"]) && $_GET["folder"] != "" ) ? clean($_GET["folder"]) : false;
//$order_by = (isset($_GET["order_by"]) && $_GET["order_by"] !="" ) ? clean($_GET["order_by"]) : false;
//$status = (isset($_GET["status"]) && $_GET["status"] !="" ) ? clean($_GET["status"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$order_id) {
    array_push($error, "ID Don't send");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    comment_folder_push_folder($order_id, $folder);

    header("Location: index.php?c=orders&a=comments_by_order&order_id=$order_id");

    //
    //
    //
} else {

    include view("home", "pageError");
}
