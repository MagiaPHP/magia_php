<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$product_code = (isset($_POST["product_code"]) && $_POST["product_code"] !=""  && $_POST["product_code"] !="null" ) ? clean($_POST["product_code"]) :  null  ;
$extra_name = (isset($_POST["extra_name"]) && $_POST["extra_name"] !=""  && $_POST["extra_name"] !="null" ) ? clean($_POST["extra_name"]) :  null  ;
$extra_value = (isset($_POST["extra_value"]) && $_POST["extra_value"] !=""  && $_POST["extra_value"] !="null" ) ? clean($_POST["extra_value"]) :  null  ;
$price = (isset($_POST["price"]) && $_POST["price"] !=""  && $_POST["price"] !="null" ) ? clean($_POST["price"]) :  null  ;
$online = (isset($_POST["online"]) && $_POST["online"] !=""  && $_POST["online"] !="null" ) ? clean($_POST["online"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
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
################################################################################
if (!$error) {
    $lastInsertId = products_extras_add(
        $product_code ,  $extra_name ,  $extra_value ,  $price ,  $online ,  $order_by ,  $status    
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
            // ejemplo index.php?c=products_extras&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


