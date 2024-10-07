<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

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
if (!$new_data && $new_data !== 'null') {
    array_push($error, 'New data is mandatory');
}
//
$i = 1;
foreach ($ids as $key => $id) {
    if (!$id) {
        array_push($error, 'Id is mandatory');
        echo $i++;
    }
    // formato    
    if (!banks_lines_check_is_id($id)) {
        array_push($error, 'Id format error');
    }
}
################################################################################

if (!$error) {

    // if delete 
    if ($new_data == 'delete') {
        foreach ($ids as $key => $id) {
            banks_lines_check_delete($id);
        }
    } else {

        foreach ($ids as $key => $id) {

            if ($new_data == 'null') {
                $new_data = null;
            }

            banks_lines_check_update_field(
                    $id, $field, $new_data
            );
        }
    }

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=banks_lines_check");
            break;

        case 2:
            header("Location: index.php?c=banks_lines_check&account_number=$redi[account_number]&#2");
            break;

        default:
            header("Location: index.php?c=banks_lines_check&account_number=$redi[account_number]&#default");
            break;
    }
} else {

    include view("home", "pageError");
}
