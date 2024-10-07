<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
//$docu_id = (isset($_REQUEST["docu_id"]) && $_REQUEST["docu_id"] != "") ? clean($_REQUEST["docu_id"]) : false;
//$bloc = (isset($_REQUEST["bloc"]) && $_REQUEST["bloc"] != "") ? clean($_REQUEST["bloc"]) : false;
$title = (isset($_REQUEST["title"]) && $_REQUEST["title"] != "") ? clean($_REQUEST["title"]) : false;
// el post no lleva clean qya que sino se borra los codigos html
$post = (isset($_REQUEST["post"]) && $_REQUEST["post"] != "") ? ($_REQUEST["post"]) : false;
//$h = (isset($_REQUEST["h"]) && $_REQUEST["h"] != "") ? clean($_REQUEST["h"]) : false;
//$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
//$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
//if (!$order_by) {
//    array_push($error, '$order_by not send');
//}
//if (!$status) {
//    array_push($error, '$status not send');
//}
###############################################################################
# FORMAT
###############################################################################
if (!docu_blocs_is_docu_id($id)) {
    array_push($error, '$docu_id format error');
}
//if (!docu_blocs_is_order_by($order_by)) {
//    array_push($error, '$order_by format error');
//}
//if (!docu_blocs_is_status($status)) {
//    array_push($error, '$status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if (docu_blocs_search_by_unique("id", "bloc", $bloc)) {
//    array_push($error, 'bloc already exists in data base');
//}
//if( docu_blocs_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    docu_blocs_update(
            $id, $title, $post
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=docu_blocs");
            break;

        case 2:
            header("Location: index.php?c=docu_blocs&a=edit&id=$id");
            break;

        case 3: // regresa a donde estaba
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$redi[id]");
            break;

        default:
            header("Location: index.php?c=docu_blocs&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
