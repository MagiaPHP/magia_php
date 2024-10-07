<?php

if (!permissions_has_permission($u_rol, 'shop', "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
//
$order_id = (!empty($_GET['order_id'])) ? clean($_GET['order_id']) : null;
$f = (!empty($_GET['f'])) ? clean($_GET['f']) : 'inbox';
$read_all = (!empty($_GET['read_all'])) ? clean($_GET['read_all']) : false;
//
$title = null;

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = (int) strip_tags($_GET['page']);
} else {
    $page = 1;
}

################################################################################
if (!orders_field_id('id', $order_id) && $order_id != '') {
    array_push($error, "I can't find that order");
}

if ($order_id) {

    if (users_can_see_others_offices($u_id)) {
        // puedo ver todas las oficinas 
        if (offices_headoffice_of_office(orders_field_id("company_id", $order_id)) !== offices_headoffice_of_office(contacts_work_at($u_id))) {
            array_push($error, "You cannot see orders that are not from your company");
        }
    } else {
        // solo la mia 

        if (orders_field_id("company_id", $id) != $u_owner_id) {
            array_push($error, "This order is not from your office");
        }
    }
}

// pagination('index.php?c=addresses' , $totalItems , $itemsByPage , $page)
//*****************************************
//*****************************************
$totalItems = count(comments_search_by_controller_doc_id('orders', $order_id));
//******************************************


$itemsByPage = (_options_option("system_items_limit")) ? _options_option("system_items_limit") : 5;

$limit = $itemsByPage;

switch ($page) {
    case 0:
        $start = 0;
        break;
    default:
        $start = ( $page - 1 ) * $itemsByPage;
        break;
}

// *****************************************
include controller("orders", "pagination");
// ****************************************

$comments = comments_search_by_doc('orders');

//$comments = comments_search_by_controller_doc_id('orders', $order_id);
// actualizo la fecha de lectura para este pedido
//comments_read_update_date_read($order_id, $u_id);
// usar el push
//vardump($comments);

if ($order_id) {
    comments_read_push($order_id, $u_id);
}
// registro todos los pedidos como mensajes leidos
//if ($read_all == 'yes') {
//    foreach (shop_comments_list_orders_by_company() as $key => $orders_puts_like_read) {
//        comments_read_push($orders_puts_like_read['doc_id'], $u_id);
//    }
//}






if (!$error) {

    include view("shop", 'page_comments_by_order');
} else {
    include view("home", 'pageError');
}



