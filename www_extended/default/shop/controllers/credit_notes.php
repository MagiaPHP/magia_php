<?php

if (!permissions_has_permission($u_rol, "shop_credit_notes", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$w = (!empty($_GET['w'])) ? clean($_GET['w']) : false;

$error = array();

if (!$error) {

    switch ($w) {

        case "byId": // se busca por id
            $id = (!empty($_GET['id'])) ? clean($_GET['id']) : false;
            $credit_notes = shop_credit_notes_search_by_id($id);
            break;

        case "byStatus": // se busca por status
            $status = (!empty($_GET['status'])) ? clean($_GET['status']) : false;
            $credit_notes = shop_credit_notes_search_by_status($status);
            break;

        default:
            $credit_notes = shop_credit_notes_list();
            break;
    }


    include view("shop", "credit_notes");
} else {

    include view("home", "pageError");
}
