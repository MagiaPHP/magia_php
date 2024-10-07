<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$product_code = (isset($_POST["product_code"]) && $_POST["product_code"] !=""  && $_POST["product_code"] !="null" ) ? clean($_POST["product_code"]) :  null  ;
$provider_id = (isset($_POST["provider_id"]) && $_POST["provider_id"] !=""  && $_POST["provider_id"] !="null" ) ? clean($_POST["provider_id"]) :  null  ;
$provider_code = (isset($_POST["provider_code"]) && $_POST["provider_code"] !=""  && $_POST["provider_code"] !="null" ) ? clean($_POST["provider_code"]) :  null  ;
$url = (isset($_POST["url"]) && $_POST["url"] !=""  && $_POST["url"] !="null" ) ? clean($_POST["url"]) :  null  ;
$price = (isset($_POST["price"]) && $_POST["price"] !=""  && $_POST["price"] !="null" ) ? clean($_POST["price"]) :  null  ;
$notes = (isset($_POST["notes"]) && $_POST["notes"] !=""  && $_POST["notes"] !="null" ) ? clean($_POST["notes"]) :  null  ;
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
if (!$provider_id) {
    array_push($error, 'Provider_id is mandatory');
}
if (!$provider_code) {
    array_push($error, 'Provider_code is mandatory');
}
if (!$url) {
    array_push($error, 'Url is mandatory');
}
if (!$price) {
    array_push($error, 'Price is mandatory');
}
if (!$notes) {
    array_push($error, 'Notes is mandatory');
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
if (! products_providers_is_product_code($product_code) ) {
    array_push($error, 'Product_code format error');
}
if (! products_providers_is_provider_id($provider_id) ) {
    array_push($error, 'Provider_id format error');
}
if (! products_providers_is_provider_code($provider_code) ) {
    array_push($error, 'Provider_code format error');
}
if (! products_providers_is_url($url) ) {
    array_push($error, 'Url format error');
}
if (! products_providers_is_price($price) ) {
    array_push($error, 'Price format error');
}
if (! products_providers_is_notes($notes) ) {
    array_push($error, 'Notes format error');
}
if (! products_providers_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! products_providers_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( products_providers_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = products_providers_add(
        $product_code ,  $provider_id ,  $provider_code ,  $url ,  $price ,  $notes ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products_providers");
            break;
            
        case 2:
            header("Location: index.php?c=products_providers&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products_providers&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products_providers&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=products_providers&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


