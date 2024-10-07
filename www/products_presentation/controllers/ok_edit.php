<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$product_code = (isset($_REQUEST["product_code"]) && $_REQUEST["product_code"] !="") ? clean($_REQUEST["product_code"]) : false;
$presentation_code = (isset($_REQUEST["presentation_code"]) && $_REQUEST["presentation_code"] !="") ? clean($_REQUEST["presentation_code"]) : false;
$contains_total = (isset($_REQUEST["contains_total"]) && $_REQUEST["contains_total"] !="") ? clean($_REQUEST["contains_total"]) : false;
$contains_code = (isset($_REQUEST["contains_code"]) && $_REQUEST["contains_code"] !="") ? clean($_REQUEST["contains_code"]) : false;
$height = (isset($_REQUEST["height"]) && $_REQUEST["height"] !="") ? clean($_REQUEST["height"]) : false;
$width = (isset($_REQUEST["width"]) && $_REQUEST["width"] !="") ? clean($_REQUEST["width"]) : false;
$depth = (isset($_REQUEST["depth"]) && $_REQUEST["depth"] !="") ? clean($_REQUEST["depth"]) : false;
$weight = (isset($_REQUEST["weight"]) && $_REQUEST["weight"] !="") ? clean($_REQUEST["weight"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] !="") ? clean($_REQUEST["code"]) : false;
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
if (!$presentation_code) {
    array_push($error, 'Presentation_code is mandatory');
}
if (!$contains_total) {
    array_push($error, 'Contains_total is mandatory');
}
if (!$contains_code) {
    array_push($error, 'Contains_code is mandatory');
}
if (!$height) {
    array_push($error, 'Height is mandatory');
}
if (!$width) {
    array_push($error, 'Width is mandatory');
}
if (!$depth) {
    array_push($error, 'Depth is mandatory');
}
if (!$weight) {
    array_push($error, 'Weight is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
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
if (! products_presentation_is_product_code($product_code) ) {
    array_push($error, 'Product_code format error');
}
if (! products_presentation_is_presentation_code($presentation_code) ) {
    array_push($error, 'Presentation_code format error');
}
if (! products_presentation_is_contains_total($contains_total) ) {
    array_push($error, 'Contains_total format error');
}
if (! products_presentation_is_contains_code($contains_code) ) {
    array_push($error, 'Contains_code format error');
}
if (! products_presentation_is_height($height) ) {
    array_push($error, 'Height format error');
}
if (! products_presentation_is_width($width) ) {
    array_push($error, 'Width format error');
}
if (! products_presentation_is_depth($depth) ) {
    array_push($error, 'Depth format error');
}
if (! products_presentation_is_weight($weight) ) {
    array_push($error, 'Weight format error');
}
if (! products_presentation_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! products_presentation_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! products_presentation_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( products_presentation_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    products_presentation_edit(
        $id ,  $product_code ,  $presentation_code ,  $contains_total ,  $contains_code ,  $height ,  $width ,  $depth ,  $weight ,  $code ,  $order_by ,  $status    
        );
        
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products_presentation");
            break;
            
        case 2:
            header("Location: index.php?c=products_presentation&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products_presentation&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products_presentation&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=products_presentation&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
