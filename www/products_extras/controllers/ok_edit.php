<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$product_code = (isset($_REQUEST["product_code"]) && $_REQUEST["product_code"] !="") ? clean($_REQUEST["product_code"]) : false;
$extra_name = (isset($_REQUEST["extra_name"]) && $_REQUEST["extra_name"] !="") ? clean($_REQUEST["extra_name"]) : false;
$extra_value = (isset($_REQUEST["extra_value"]) && $_REQUEST["extra_value"] !="") ? clean($_REQUEST["extra_value"]) : false;
$price = (isset($_REQUEST["price"]) && $_REQUEST["price"] !="") ? clean($_REQUEST["price"]) : false;
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
if (!$extra_name) {
    array_push($error, 'Extra_name is mandatory');
}
if (!$extra_value) {
    array_push($error, 'Extra_value is mandatory');
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
if (! products_extras_is_product_code($product_code) ) {
    array_push($error, 'Product_code format error');
}
if (! products_extras_is_extra_name($extra_name) ) {
    array_push($error, 'Extra_name format error');
}
if (! products_extras_is_extra_value($extra_value) ) {
    array_push($error, 'Extra_value format error');
}
if (! products_extras_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! products_extras_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( products_extras_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    products_extras_edit(
        $id ,  $product_code ,  $extra_name ,  $extra_value ,  $price ,  $online ,  $order_by ,  $status    
        );
        
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products_extras");
            break;
            
        case 2:
            header("Location: index.php?c=products_extras&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products_extras&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products_extras&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=products_extras&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
