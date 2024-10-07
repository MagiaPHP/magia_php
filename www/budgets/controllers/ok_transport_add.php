<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$transport_code = (isset($_POST["transport_code"])) ? clean($_POST["transport_code"]) : null;
$quantity = (($_POST["quantity"]) != "") ? clean($_POST["quantity"]) : 1;
$description = (($_POST["description"]) != "") ? clean($_POST["description"]) : 'Transport';
// es un separator
$separator = ( isset($_POST["separator"]) && clean($_POST["separator"]) != '') ? true : false;
if ($separator) {
    $description = "---" . $description;
}
$price = (($_POST["price"]) != '') ? clean($_POST["price"]) : transport_field_code('price', $transport_code);
$discounts = (($_POST["discounts"]) != "" ) ? clean($_POST["discounts"]) : 0;
$discounts_mode = (($_POST["discounts_mode"]) != "" ) ? clean($_POST["discounts_mode"]) : '%';
//
$tax = (isset($_POST["tax"]) ) ? clean($_POST["tax"]) : transport_field_code('tax', $transport_code);
;

//$order_by = (isset($_POST["order_by"]) ) ? clean($_POST["order_by"]) : budget_lines_next_order_by($budget_id);
$order_by = budget_lines_next_order_by($budget_id) ?? 1;

$status = (isset($_POST["status"]) ) ? clean($_POST["status"]) : 1;

$redi = (isset($_POST["redi"]) ) ? clean($_POST["redi"]) : null;

$error = array();

if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
if (!$quantity) {
    array_push($error, '$quantity- is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
//if (!$price) {
//    //array_push($error, '$price is mandatory');
//}
//if (!$discounts) {
//    // array_push($error, '$discounts is mandatory');
//}
//if (!$tax) {
//    //array_push($error, '$tax is mandatory');
//}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
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
if ($discounts_mode != "%" && $discounts > ($price * $quantity)) {
    array_push($error, 'The discount cannot exceed the price');
}

if ($discounts_mode == "%" && $discounts > 100) {
    array_push($error, 'The discount cannot exceed 100%');
}

#************************************************************************
#************************************************************************
# PROCESO
# si hay descuento, el descuento mode hay 
//$discounts_mode = ( $discounts > 0)? $discounts_mode : null;  
#************************************************************************
// Busca si uya existe el texto en la BD
//if (budget_lines_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
//
//vardump(
//        array($budget_id, $transport_code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
//        )
//);
//die();


if (!$error) {

    budget_lines_add(
            $budget_id, null, $category_code, $transport_code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
    );

    // actualizo el total del presupuesto 
    budgets_update_total_tax(
            $budget_id,
            budget_lines_totalHTVA($budget_id),
            budget_lines_totalTVA($budget_id)
    );

    ############################################################################
    ############################################################################
    ############################################################################
    $id = $budget_id;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Add item line to budget: $id <br>Line: [Code: $transport_code, Quantity: $quantity, Description: $description, Price: $price, Discounts: $discounts, Discounts_mode: $discounts_mode]";
    $doc_id = $id;
    $crud = "create";
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








    switch ($redi) {
        case 1:
            header("Location: index.php?c=budgets&a=edit&id=$budget_id#items_add");
            break;

        case 5:
            header("Location: index.php?c=budgets&a=details&id=$budget_id#5");
            break;

        default:
            header("Location: index.php?c=budgets&a=edit&id=$budget_id");
            break;
    }
} else {
    include view("home", "pageError");
}    