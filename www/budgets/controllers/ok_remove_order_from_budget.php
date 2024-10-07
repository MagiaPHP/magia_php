<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$order_id = ( isset($_POST['order_id']) && $_POST['order_id'] !== "") ? clean($_POST['order_id']) : false;
$budget_id = ( isset($_POST['budget_id']) && $_POST['budget_id'] !== "") ? clean($_POST['budget_id']) : false;

$error = array();
################################################################################
if (!$order_id) {
    array_push($error, '$order_id Don t send');
}
if (!$budget_id) {
    array_push($error, 'budget_id Don t send');
}

################################################################################
if (!is_id($order_id)) {
    array_push($error, '$order_id format error');
}
if (!is_id($budget_id)) {
    array_push($error, '$budget_id format error');
}
if ($order_address_delivery_id != $budget_address_delivery_id) {
    array_push($error, 'Order and budget must have the same delivery address');
}
// si este presupuesto ya tiene factura, no se puede borrar 
// los pedidos de este presupuesto 
//
if (budgets_invoices_search_invoice_by_budget_id($budget_id)) {
    array_push($error, 'This budget already has an invoice, you cannot delete items from it');
}

################################################################################
################################################################################
if (!$error) {

    // retiro de la tabla orders_budgets
    orders_budgets_remove($order_id, $budget_id);
    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "budgets";
    //$a = "";
    $w = null;
    //
    $description = "Remove order [$order_id] from budget [$budget_id]";
    $doc_id = $budget_id;
    $crud = "update";
    // $error = null;
    //
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
    ############################################################################ 
    ############################################################################ 
    // Borro los items de la orden que estan en el budget
    budget_lines_remove_lines_by_order_id($order_id, $budget_id);

    //cambio status de order    
    orders_change_status($order_id, 70); // Ready to send
    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "orders";
    $a = "change_status";
    $w = null;
    //
    $description = "Change status order [$order_id] beacause remove from budget [$budget_id]";
    $doc_id = $order_id;
    $crud = "update";
    // $error = null;
    //
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
    ############################################################################ 
    ############################################################################ 
    // actualizo los totales     
    budgets_update_total_tax($budget_id, budget_lines_totalHTVA($budget_id), budget_lines_totalTVA($budget_id));

    header("Location: index.php?c=budgets&a=details&id=$budget_id");
} else {

    include view("home", "pageError");
}


