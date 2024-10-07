<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
//$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] !="") ? clean($_REQUEST["code"]) : false;
//$father_code = (isset($_REQUEST["father_code"]) && $_REQUEST["father_code"] !="") ? clean($_REQUEST["father_code"]) : false;
$category = (isset($_REQUEST["category"]) && $_REQUEST["category"] != "") ? clean($_REQUEST["category"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
//$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
//$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Category id is mandatory');
}
if (!$category) {
    array_push($error, 'Category is mandatory');
}
//if (!$status) {
//    array_push($error, 'Status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!expenses_categories_is_id($id)) {
    array_push($error, 'Category id format error');
}

//if (!expenses_categories_is_status($status)) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if (expenses_categories_search_by_unique("id", "code", $code)) {
//    array_push($error, 'Code already exists in data base');
//}
//if( expenses_categories_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    expenses_categories_edit_shot(
            $id, $category, $description
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=expenses_categories");
            break;

        case 2:
            header("Location: index.php?c=expenses_categories&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=expenses_categories&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=expenses_categories&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=expenses_categories&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        case 6:
            header("Location: index.php?c=expenses_categories&id=$id");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
