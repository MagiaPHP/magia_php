<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
//$blog_id = (isset($_REQUEST["blog_id"]) && $_REQUEST["blog_id"] != "") ? clean($_REQUEST["blog_id"]) : false;
$title = (isset($_REQUEST["title"]) && $_REQUEST["title"] != "") ? clean($_REQUEST["title"]) : false;
$comment = (isset($_REQUEST["comment"]) && $_REQUEST["comment"] != "") ? clean($_REQUEST["comment"]) : false;
//$author_id = (isset($_REQUEST["author_id"]) && $_REQUEST["author_id"] !="") ? clean($_REQUEST["author_id"]) : false;
//$date = (isset($_REQUEST["date"]) && $_REQUEST["date"] !="") ? clean($_REQUEST["date"]) : false;
//$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
//$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
if (!$title) {
    array_push($error, 'Title is mandatory');
}
if (!$comment) {
    array_push($error, 'Comment is mandatory');
}
//if (!$author_id) {
//    array_push($error, 'Author_id is mandatory');
//}
//if (!$date) {
//    array_push($error, 'Date is mandatory');
//}
//if (!$order_by) {
//    array_push($error, 'Order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, 'Status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!blog_comments_is_id($id)) {
    array_push($error, 'Id format error');
}
if (!blog_comments_is_title($title)) {
    array_push($error, 'Title format error');
}
if (!blog_comments_is_comment($comment)) {
    array_push($error, 'Comment format error');
}
//if (! blog_comments_is_author_id($author_id) ) {
//    array_push($error, 'Author_id format error');
//}
//if (! blog_comments_is_date($date) ) {
//    array_push($error, 'Date format error');
//}
//if (! blog_comments_is_order_by($order_by) ) {
//    array_push($error, 'Order_by format error');
//}
//if (! blog_comments_is_status($status) ) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( blog_comments_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    blog_comments_edit_short(
            $id, $title, $comment
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=blog_comments");
            break;

        case 2:
            header("Location: index.php?c=blog_comments&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=blog_comments&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=blog_comments&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=blog_comments&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
