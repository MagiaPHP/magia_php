<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$product_code = (isset($_REQUEST["product_code"]) && $_REQUEST["product_code"] !="") ? clean($_REQUEST["product_code"]) : false;
$price = (isset($_REQUEST["price"]) && $_REQUEST["price"] !="") ? clean($_REQUEST["price"]) : false;
$date_from = (isset($_REQUEST["date_from"]) && $_REQUEST["date_from"] !="") ? clean($_REQUEST["date_from"]) : false;
$date_to = (isset($_REQUEST["date_to"]) && $_REQUEST["date_to"] !="") ? clean($_REQUEST["date_to"]) : false;
$online = (isset($_REQUEST["online"]) && $_REQUEST["online"] !="") ? clean($_REQUEST["online"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$product_code) {
    array_push($error, 'Product_code is mandatory');
}
if (!$price) {
    array_push($error, 'Price is mandatory');
}
if (!$date_from) {
    array_push($error, 'Date_from is mandatory');
}
if (!$date_to) {
    array_push($error, 'Date_to is mandatory');
}
if (!$online) {
    array_push($error, 'Online is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (! products_price_is_product_code($product_code) ) {
    array_push($error, 'Product_code format error');
}
if (! products_price_is_price($price) ) {
    array_push($error, 'Price format error');
}
if (! products_price_is_date_from($date_from) ) {
    array_push($error, 'Date_from format error');
}
if (! products_price_is_date_to($date_to) ) {
    array_push($error, 'Date_to format error');
}
if (! products_price_is_online($online) ) {
    array_push($error, 'Online format error');
}
if (! products_price_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! products_price_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( products_price_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    products_price_edit(
        $id ,  $product_code ,  $price ,  $date_from ,  $date_to ,  $online ,  $order_by ,  $status    
        );
        
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products_price");
            break;
            
        case 2:
            header("Location: index.php?c=products_price&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products_price&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products_price&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=products_price&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
