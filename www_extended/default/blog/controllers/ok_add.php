<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$controller = (isset($_POST["controller"]) && $_POST["controller"] != "" && $_POST["controller"] != "null" ) ? clean($_POST["controller"]) : null;
$title = (isset($_POST["title"]) && $_POST["title"] != "" && $_POST["title"] != "null" ) ? clean($_POST["title"]) : false;
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? ($_POST["description"]) : false;
//$author_id = (isset($_POST["author_id"]) && $_POST["author_id"] !=""  && $_POST["author_id"] !="null" ) ? clean($_POST["author_id"]) :  false ;
//$date = (isset($_POST["date"]) && $_POST["date"] !="" ) ? clean($_POST["date"]) : current_timestamp();
//$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1;
//$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1;
$author_id = $u_id;
$date = date('Y-m-d H:m:s');
$order_by = 1;
$status = 0;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$controller) {
    array_push($error, 'Controller is mandatory');
}
if (!$title) {
    array_push($error, 'Title is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
}
if (!$author_id) {
    array_push($error, 'Author_id is mandatory');
}
if (!$date) {
    array_push($error, 'Date is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
//if (!$status) {
//    array_push($error, 'Status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!blog_is_title($title)) {
    array_push($error, 'Title format error');
}
if (!blog_is_description($description)) {
    array_push($error, 'Description format error');
}
if (!blog_is_author_id($author_id)) {
    array_push($error, 'Author_id format error');
}
if (!blog_is_date($date)) {
    array_push($error, 'Date format error');
}
if (!blog_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
//if (!blog_is_status($status)) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( blog_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = blog_add(
            $controller, $title, $description, $author_id, $date, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=blog");
            break;

        case 2:
            header("Location: index.php?c=blog&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=blog&a=edit&id=$lastInsertId");
            break;

        case 4:
            header("Location: index.php?c=blog&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=blog&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


