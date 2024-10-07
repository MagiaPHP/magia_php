<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$section_code = (isset($_REQUEST["section_code"]) && $_REQUEST["section_code"] != "") ? clean($_REQUEST["section_code"]) : false;
$category_father = (isset($_REQUEST["category_father"]) && $_REQUEST["category_father"] != "") ? clean($_REQUEST["category_father"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$category = (isset($_REQUEST["category"]) && $_REQUEST["category"] != "") ? clean($_REQUEST["category"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$category) {
    array_push($error, 'Category is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!services_categories_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!services_categories_is_category($category)) {
    array_push($error, 'Category format error');
}
if (!services_categories_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!services_categories_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (services_categories_search_by_unique("id", "code", $code)) {
    array_push($error, 'Code already exists in data base');
}


//if( services_categories_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    services_categories_edit(
            $id, $section_code, $category_father, $code, $category, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=services_categories");
            break;

        case 2:
            header("Location: index.php?c=services_categories&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=services_categories&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=services_categories&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=services_categories&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
