<?php

if (!permissions_has_permission($u_rol, "orders", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$office_id = (isset($_REQUEST['office_id'])) ? clean($_REQUEST['office_id']) : false;
$address_id = (isset($_REQUEST['address_id'])) ? clean($_REQUEST['address_id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
$status = (isset($_REQUEST['status'])) ? clean($_REQUEST['status']) : 'all';

$error = array();

if (!($id)) {
    array_push($error, 'id dont send');
}
//-----------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, 'id format incorrect');
}

if ($e) {
    array_push($error, "$e");
}


//vardump($office_id);
//vardump($address_id);
//vardump($status);
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
if (!$error) {

    if ($address_id == 'all') {
        if ($status == 'all') {
            $orders = orders_list_by_company_id($id);
        } else {
            $orders = orders_list_by_company_id_status($id, $status);
        }
    } else {
        if ($status == "all") {
//            $orders = orders_list_by_company_id_status($id, $status);
            $orders = orders_list_by_address_id($address_id);
        } else {
            $orders = (orders_list_by_company_id_status_address_delivery_id($id, $status, $address_id));
        }
    }







// Todas las oficinas
//    if ($address_id == "all") {
//
//        if ($status == 'all') {
//            // debo poner por companya y direcccion 
//            $orders = orders_list_by_company_id($id);
//        } else {
//
//            if ($address_id == 'all') {
//                // empresa, status, direccion
//                $orders = (orders_list_by_company_id_status_address_delivery_id($id, $status, $address_id));
//            } else {
//                // sin direccion 
//                $orders = orders_list_by_company_id_status($id, $status);
//            }
//        }
//    } else {
//
//        // segun oficinas
//        if ($status == "all") {
//
//            vardump($office_id);
//            $orders = orders_list_by_office_id($office_id);
//            
//        } else {
//            $orders = orders_list_by_office_id_status($office_id, $status);
//        }
//    }


    include view("contacts", "page_orders_by_company");
} else {
    include view("home", "pageError");
}