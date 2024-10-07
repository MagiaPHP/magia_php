<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$ids = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$field = (isset($_REQUEST["field"]) && $_REQUEST["field"] != "") ? clean($_REQUEST["field"]) : false;
$new_data = (isset($_REQUEST["new_data"]) && $_REQUEST["new_data"] != "") ? clean($_REQUEST["new_data"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;
$error = array();

################################################################################
# REQUIRED
################################################################################

if (!$field) {
    array_push($error, 'Field is mandatory');
}
if (!$new_data) {
    array_push($error, 'New_data is mandatory');
}

foreach ($ids as $key => $id) {
    if (!$id) {
        array_push($error, 'Id is mandatory');
    }
    // formato
    // formato
    if (!banks_lines_is_id($id)) {
        array_push($error, 'Id format error');
    }
    // condicional
    // condicional
    if (banks_lines_field_id('status', $id) == 100) {
        array_push($error, 'Lines with that status cannot change the status here.');
    }
}
################################################################################

if (!$error) {

    // if delete 
    if ($new_data == 'delete') {
        foreach ($ids as $key => $id) {
            banks_lines_delete($id);
        }
    } else {

        foreach ($ids as $key => $id) {
            banks_lines_update_field(
                    $id, $field, $new_data
            );
        }
    }



    switch ($redi) {
        case 1:
            header("Location: index.php?c=banks_lines");
            break;

        default:
            header("Location: index.php?c=banks_lines&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
