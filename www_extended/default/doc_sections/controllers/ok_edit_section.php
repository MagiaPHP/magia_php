<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$section = (isset($_REQUEST["section"]) && $_REQUEST["section"] != "") ? clean($_REQUEST["section"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : 1;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
if (!$section) {
    array_push($error, 'Section is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!doc_sections_is_id($id)) {
    array_push($error, 'Id format error');
}
if (!doc_sections_is_section($section)) {
    array_push($error, 'Section format error');
}
###############################################################################
# CONDITIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    doc_sections_update_section($id, $section);

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
