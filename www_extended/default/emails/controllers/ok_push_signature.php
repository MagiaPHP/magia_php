<?php

//
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
//$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$signature = (isset($_REQUEST["signature"]) && $_REQUEST["signature"] != "") ? ($_REQUEST["signature"]) : '<br><br>Powered by www.factux.be';
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
//if (!$id) {
//    array_push($error, 'id is mandatory');
//}
if (!$signature) {
    array_push($error, 'Signature is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
//if (!emails_is_id($id)) {
//    array_push($error, 'id format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( emails_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {


    user_options_push_data($u_id, 'emails_signature', $signature);

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=emails&a=config_signature");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view("home", "pageError");
}
