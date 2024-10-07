<?php

if (!permissions_has_permission($u_rol, 'shop', "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$order_id = (!empty($_GET['order_id'])) ? clean($_GET['order_id']) : null;
$f = (!empty($_GET['f'])) ? clean($_GET['f']) : 'inbox';
$read_all = (!empty($_GET['read_all'])) ? clean($_GET['read_all']) : false;
$title = null;
$error = array();
################################################################################
// busca el pedido
if (!orders_field_id('id', $order_id) && $order_id != '') {
    array_push($error, "I can't find that order");
}


// puedo ver los pedidos de otras oficinas?
if ($order_id) {
    // si puedo 
    if (users_can_see_others_offices($u_id)) {
        // puedo ver todas las oficinas 
        if (offices_headoffice_of_office(orders_field_id("company_id", $order_id)) !== offices_headoffice_of_office(contacts_work_at($u_id))) {
            array_push($error, "You cannot see orders that are not from your company");
        }
    } else {
        // solo mi oficina  

        if (orders_field_id("company_id", $order_id) != $u_owner_id) {
            array_push($error, "This order is not from your office");
        }
    }
}


$comments = comments_search_by_doc('orders');

if ($order_id) {
    comments_read_push($order_id, $u_id);
}
################################################################################
if (!$error) {

    include view("shop", 'page_comments_by_order');
} else {
    include view("home", 'pageError');
}



