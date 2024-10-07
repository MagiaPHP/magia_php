<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

$where = (isset($_GET['w'])) ? clean($_GET['w']) : false;

$error = array();
$description = array();

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
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
            //    $orders = shop_labo_orders_search_by_ref($search);
            break;

        default:
            $search = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;

            $orders = ( users_can_see_others_offices($u_id)) ? shop_orders_search_by_company($search) : shop_orders_search_by_office($txt);
            break;
    }


    include view("shop", "orders");

############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = $where;
    // $txt
    $description = "Search order: $txt";
    $doc_id = null;
    $crud = "read";
    $error = null;
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
} else {

    include view("home", "pageError");
}

