<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$product_code = (isset($_POST["product_code"]) && $_POST["product_code"] !=""  && $_POST["product_code"] !="null" ) ? clean($_POST["product_code"]) :  null  ;
$presentation_code = (isset($_POST["presentation_code"]) && $_POST["presentation_code"] !=""  && $_POST["presentation_code"] !="null" ) ? clean($_POST["presentation_code"]) :  null  ;
$contains_total = (isset($_POST["contains_total"]) && $_POST["contains_total"] !=""  && $_POST["contains_total"] !="null" ) ? clean($_POST["contains_total"]) :  null  ;
$contains_code = (isset($_POST["contains_code"]) && $_POST["contains_code"] !=""  && $_POST["contains_code"] !="null" ) ? clean($_POST["contains_code"]) :  null  ;
$height = (isset($_POST["height"]) && $_POST["height"] !=""  && $_POST["height"] !="null" ) ? clean($_POST["height"]) :  null  ;
$width = (isset($_POST["width"]) && $_POST["width"] !=""  && $_POST["width"] !="null" ) ? clean($_POST["width"]) :  null  ;
$depth = (isset($_POST["depth"]) && $_POST["depth"] !=""  && $_POST["depth"] !="null" ) ? clean($_POST["depth"]) :  null  ;
$weight = (isset($_POST["weight"]) && $_POST["weight"] !=""  && $_POST["weight"] !="null" ) ? clean($_POST["weight"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
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
################################################################################
if (!$error) {
    $lastInsertId = products_presentation_add(
        $product_code ,  $presentation_code ,  $contains_total ,  $contains_code ,  $height ,  $width ,  $depth ,  $weight ,  $code ,  $order_by ,  $status    
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
            // ejemplo index.php?c=products_presentation&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


