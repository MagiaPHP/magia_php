<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

################################################################################
################################################################################

$order_data = order_by_get_order_data($u_id, 'credit_notes');

$pagination = new Pagination($page, credit_notes_list(0, 9999, $order_data['col_name'], $order_data['order_way']));
// puede hacer falta
//$pagination->setUrl($url);
$credit_notes = credit_notes_list($pagination->getStart(), $pagination->getLimit(), $order_data['col_name'], $order_data['order_way']);
################################################################################


if (!$error) {
    include view("credit_notes", 'index');
} else {
    include view("home", "pageError");
}


