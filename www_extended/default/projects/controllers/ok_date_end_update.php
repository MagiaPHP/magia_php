<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"]) && $_POST["id"] != "" && $_POST["id"] != "null" ) ? clean($_POST["id"]) : null;
$new_data = (isset($_POST["new_data"]) && $_POST["new_data"] != "" && $_POST["new_data"] != "null" ) ? clean($_POST["new_data"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
if (!$new_data) {
    array_push($error, 'Date_start is mandatory');
}
###############################################################################
# FORMAT
###############################################################################
if (!projects_is_id($id)) {
    array_push($error, 'Date_end format error');
}
if (!projects_is_date_start($new_data)) {
    array_push($error, 'Date_end format error');
}
###############################################################################
# CONDITIONAL
if ($new_data < projects_field_id('date_start', $id)) {
    array_push($error, "The end date must be greater than or equal to the end date");
}
################################################################################
if (!$error) {

    projects_update_date_end($id, $new_data);

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=projects");
            break;

        case 2:
            header("Location: index.php?c=projects&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=projects&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=projects&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=projects&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


