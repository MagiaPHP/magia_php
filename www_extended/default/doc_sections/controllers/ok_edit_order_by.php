<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : 1;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!doc_sections_is_id($id)) {
    array_push($error, '$section format error');
}
if (!doc_sections_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
###############################################################################
# CONDITIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    doc_sections_update_order_by($id, $order_by);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=doc_sections&a=details&id=$id");
            break;
        case 2:
            header("Location: index.php?c=doc_sections&a=edit&id=$id");
            break;

        default:
            header("Location: index.php?c=doc_sections&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
