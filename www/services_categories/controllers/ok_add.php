<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$section_code = (isset($_POST["section_code"]) && $_POST["section_code"] != "" && $_POST["section_code"] != "null" ) ? clean($_POST["section_code"]) : null;
$category_father = (isset($_POST["category_father"]) && $_POST["category_father"] != "" && $_POST["category_father"] != "null" ) ? clean($_POST["category_father"]) : null;
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : null;
$category = (isset($_POST["category"]) && $_POST["category"] != "" && $_POST["category"] != "null" ) ? clean($_POST["category"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = services_categories_add(
            $section_code, $category_father, $code, $category, $order_by, $status
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
            // ejemplo index.php?c=services_categories&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


