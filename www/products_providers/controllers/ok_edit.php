<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$product_code = (isset($_REQUEST["product_code"]) && $_REQUEST["product_code"] !="") ? clean($_REQUEST["product_code"]) : false;
$provider_id = (isset($_REQUEST["provider_id"]) && $_REQUEST["provider_id"] !="") ? clean($_REQUEST["provider_id"]) : false;
$provider_code = (isset($_REQUEST["provider_code"]) && $_REQUEST["provider_code"] !="") ? clean($_REQUEST["provider_code"]) : false;
$url = (isset($_REQUEST["url"]) && $_REQUEST["url"] !="") ? clean($_REQUEST["url"]) : false;
$price = (isset($_REQUEST["price"]) && $_REQUEST["price"] !="") ? clean($_REQUEST["price"]) : false;
$notes = (isset($_REQUEST["notes"]) && $_REQUEST["notes"] !="") ? clean($_REQUEST["notes"]) : false;
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
if (! $error ) {
    
    products_providers_edit(
        $id ,  $product_code ,  $provider_id ,  $provider_code ,  $url ,  $price ,  $notes ,  $order_by ,  $status    
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
            // ejemplo index.php?c=products_providers&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
