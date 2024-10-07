<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
$client_ref = (!empty($_POST['client_ref'])) ? clean($_POST['client_ref']) : false;
$order_id = (!empty($_POST['order_id'])) ? clean($_POST['order_id']) : false;

$error = array();

#************************************************************************
if (!$order_id) {
    array_push($error, "Order id is mandatory");
}

if (!$client_ref) {
    array_push($error, "Client_ref is mandatory");
}

if (orders_client_ref_exist($u_owner_id, $client_ref)) {
    array_push($error, "This reference already exists");
}
################################################################################
################################################################################
################################################################################
if (!$error) {


    shop_orders_update_client_ref($order_id, $client_ref);

    ############################################################################
    $data = json_encode(array(
        $order_id, $client_ref
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "orders";
    //$a = "Add file" ;
    $w = null;
    // $txt
    $description = "User update client ref [ $client_ref ] at order [ $order_id ]";
    $doc_id = $order_id;
    $crud = "create";
    //$error = null ;
    $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
    $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
    $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################ 




    header("Location: index.php?c=shop&a=orderDetails&id=$order_id");
} else {


    include view("home", "pageError");
}