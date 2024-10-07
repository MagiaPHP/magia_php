<?php

// Crea un folder, 
// agrega el folder al email 
// regresa al email

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$folder = (isset($_REQUEST["folder"]) && $_REQUEST["folder"] != "") ? clean($_REQUEST["folder"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################

if (!$id) {
    array_push($error, 'id is mandatory');
}
if (!$folder) {
    array_push($error, 'folder is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!emails_is_id($id)) {
    array_push($error, 'id format error');
}
if (!emails_is_folder($folder)) {
    array_push($error, 'folder format error');
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
if (!$error) {

    // agrego el folder 
    emails_folders_add($u_id, $folder, '<span class="glyphicon glyphicon-folder-close"></span>', 1, 1);

    // agrefo el folder al email 
    emails_update_folder(
            $id, $folder
    );

    // Regreso al email 

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=emails&a=index&id=$id");
            break;

        default:
            header("Location: index.php?c=emails&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
