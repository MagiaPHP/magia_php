<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$product_code = (isset($_POST["product_code"]) && $_POST["product_code"] !=""  && $_POST["product_code"] !="null" ) ? clean($_POST["product_code"]) :  null  ;
$country = (isset($_POST["country"]) && $_POST["country"] !=""  && $_POST["country"] !="null" ) ? clean($_POST["country"]) :  null  ;
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
if (!$country) {
    array_push($error, 'Country is mandatory');
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
if (! products_origin_is_product_code($product_code) ) {
    array_push($error, 'Product_code format error');
}
if (! products_origin_is_country($country) ) {
    array_push($error, 'Country format error');
}
if (! products_origin_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! products_origin_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( products_origin_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = products_origin_add(
        $product_code ,  $country ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products_origin");
            break;
            
        case 2:
            header("Location: index.php?c=products_origin&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products_origin&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products_origin&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=products_origin&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


