<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
$code = (isset($_GET["code"])) ? clean($_GET["code"]) : null;
$category_code = (isset($_GET["category_code"])) ? clean($_GET["category_code"]) : null;
$quantity = (isset($_GET["quantity"])) ? clean($_GET["quantity"]) : null;
$description = (isset($_GET["description"])) ? clean($_GET["description"]) : null;
$price = (isset($_GET["price"])) ? clean($_GET["price"]) : null;
$discounts = (isset($_GET["discounts"])) ? clean($_GET["discounts"]) : 0;
$discounts_mode = (isset($_GET["discounts_mode"]) && $_GET["discounts_mode"] != "" ) ? clean($_GET["discounts_mode"]) : '%';
$tax = (isset($_GET["tax"])) ? clean($_GET["tax"]) : null;

$order_id = budget_lines_field_id("order_id", $id);
$budget_id = budget_lines_field_id("budget_id", $id);
$order_by = budget_lines_field_id('order_by', $id);
$status = budget_lines_field_id('status', $id);

// es un separator
$separator = (clean($_POST["separator"]) == 1 ) ? true : false;
$note = ( clean($_POST["note"]) == 1 ) ? true : false;
//
if ($separator) {
    $description = "---" . $description;
}

if ($note) {
    $description = "***" . $description;
}



$error = array();

if (!$id) {
    array_push($error, '$id is mandatory');
}
if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}


#************************************************************************
if (!budget_lines_is_id($id)) {
    array_push($error, "budget_id format error");
}

if ($discounts_mode != "%" && $discounts > ($price * $quantity)) {
    array_push($error, 'The discount cannot exceed the price');
}

if ($discounts_mode == "%" && $discounts > 100) {
    array_push($error, 'The discount cannot exceed 100%');
}

// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
if ($quantity) {
    $quantity = abs($quantity);
}
if ($price) {
    $price = abs($price);
}
if ($discounts) {
    $discounts = abs($discounts);
}
if ($tax) {
    $tax = abs($tax);
}

$description = substr($description, 0, 250);

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    budget_lines_edit(
            $id, $budget_id, $order_id, $category_code, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
    );

    // actualizo el total del presupuesto 
    budgets_update_total_tax($budget_id, budget_lines_totalHTVA($budget_id), budget_lines_totalTVA($budget_id));

    ############################################################################
    ############################################################################
    ############################################################################
    // $id = $budget_id ;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Edit line $id from budget ($budget_id) <br>New info[id; $id, budget_id: $budget_id, code: $code, category_code = $category_code, quantity: $quantity, description: $description, price: $price, discounts: $discounts, discounts_mode: $discounts_mode, $tax, 1, 1]";
    $doc_id = $budget_id;
    $crud = "edit";
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
    ############################################################################
    ############################################################################ 


    header("Location: index.php?c=budgets&a=edit&id=$budget_id");
} else {

    include view("home", "pageError");
}    