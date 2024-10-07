<?php

if (!permissions_has_permission($u_rol, "shop_comments", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (!empty($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$redi = (!empty($_REQUEST['redi'])) ? clean($_REQUEST['redi']) : false;

$date = null;
$sender_id = $u_id;
$doc = "orders";
$doc_id = $id;
$comment = (!empty($_REQUEST['comment'])) ? clean($_REQUEST['comment']) : false;
$order_by = 0;
$status = 1;

$error = array();
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}

################################################################################
if (!is_id($id)) {
    array_push($error, "Id format error");
}


//# Verifiar si el id de la order de la orden pertenece a quien la solicita
//if (orders_field_id("company_id", $id) != $u_owner_id) {
//    array_push($error, "This order is not yours");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {
    // si no hay error, publicamos el comentario
    comments_add(
            //$date , $sender_id , $doc , $doc_id , $comment , $order_by , $status
            $date, $sender_id, $doc, $doc_id, $comment, $order_by, $status
    );

    ############################################################################
    ############################################################################
    ##### COMMENTS #######################################################################
    ############################################################################
    $id = $doc_id;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    $c = 'orders';
    //$a = "";
    $w = null;
    $description = "Add comments doc: orders, id= $doc_id, comments: [$comment]";
    $doc_id = $doc_id;
    $crud = "create";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request,
            get_user_ip(), get_user_ip6(), json_encode(get_user_browser())
    );
    ############################################################################
    ############################################################################
    ############################################################################ 
    ############################################################################


    switch ($redi) {
        case 1:
            header("Location: index.php?c=shop&a=orderDetails&id=$id#comments");
            break;

        case 2:
            header("Location: index.php?c=shop&a=comments_by_order&order_id=$doc_id#comments");
            break;

        default:
            header("Location: index.php?c=shop&a=orderDetails&id=$id#comments");
            break;
    }
} else {
    include view("home", "pageError");
}

