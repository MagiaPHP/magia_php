<?php

if (!permissions_has_permission($u_rol, "shop_invoices", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$w = (!empty($_GET['w'])) ? clean($_GET['w']) : false;

$error = array();

if (!$error) {

    switch ($w) {

        case "byId": // se busca por id
            $id = (!empty($_GET['id'])) ? clean($_GET['id']) : false;
            $invoices = shop_invoices_search_by_id($id);
            break;

        case "byStatus": // se busca por status
            $status = (!empty($_GET['status'])) ? clean($_GET['status']) : false;
            $invoices = shop_invoices_search_by_status($status);
            break;

        default:
            $invoices = shop_invoices_list();
            break;
    }




    include view("shop", "invoices");
} else {

    include view("home", "pageError");
}
