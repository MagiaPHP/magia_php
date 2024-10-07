<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

$search = null;
$where = (isset($_GET['w'])) ? clean($_GET['w']) : false;
$description = array();
$error = array();

/**
 * Se desactiva todo
 * Si se quiere activar se debe hacer como la busqueda por defecto 
 */
if (!$error) {
    switch ($where) {
        case "by_id":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_id($search);
            break;

        case "by_ref":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_ref($search);
            break;

        case "by_registre_date":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_registre_date($search);
            break;

        case "by_name":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_ref($search);
            break;

        case "by_lastname":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_ref($search);
            break;

        case "by_remake":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_remake($search);
            break;

        case "by_bac":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_bac($search);
            break;

        case "by_delivery_date":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_ref($search);
            break;

        case "by_discount":
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_ref($search);
            break;

        case "by_status":
            $status = (isset($_GET['status'])) ? clean($_GET['status']) : false;
            ################################################################################
            $pagination = new Pagination($page,
                    ( users_can_see_others_offices($u_id)) ?
                    shop_orders_search_by_company_status($status) :
                    shop_orders_search_by_office_status($status)
            );
            // puede hacer falta
            $pagination->setUrl("index.php?c=shop&a=orders_search&w=by_status&status=" . $status);
            $orders = ( users_can_see_others_offices($u_id)) ?
                    shop_orders_search_by_company_status($status, $pagination->getStart(), $pagination->getLimit()) :
                    shop_orders_search_by_office_status($status, $pagination->getStart(), $pagination->getLimit())
            ;
//            $orders = shop_orders_list_by_office($u_owner_id, $pagination->getStart(), $pagination->getLimit());            
            ################################################################################
            break;

        default:
            $search = ( ($_GET['txt']) != "" ) ? clean($_GET['txt']) : false;
            ################################################################################
            $pagination = new Pagination($page,
                    ( users_can_see_others_offices($u_id)) ?
                    shop_orders_search_by_company($search) :
                    shop_orders_search_by_office($search)
            );
            // puede hacer falta
            $pagination->setUrl("index.php?c=shop&a=orders_search&txt=" . $search);
            $orders = (
                    users_can_see_others_offices($u_id)) ?
                    shop_orders_search_by_company($search, $pagination->getStart(), $pagination->getLimit()) :
                    shop_orders_search_by_office($search, $pagination->getStart(), $pagination->getLimit())
            ;
//            $orders = shop_orders_list_by_office($u_owner_id, $pagination->getStart(), $pagination->getLimit());            
            ################################################################################
//            $orders = ( users_can_see_others_offices($u_id)) ?
//                    shop_orders_search_by_company($search) :
//                    shop_orders_search_by_office($search)
//            ;


            break;
    }


    include view("shop", "orders");

############################################################################
    ############################################################################
    ############################################################################
    $level = null; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , 
    //$a , 
    $w = $where;
    $description = "Orders search: $search ";
    $doc_id = null;
    $crud = "read";
    $error = ($error) ? json_encode($error) : null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
    ############################################################################
    ############################################################################
} else {

    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}

