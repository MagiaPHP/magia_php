<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$product_code = (isset($_REQUEST["product_code"]) && $_REQUEST["product_code"] !="") ? clean($_REQUEST["product_code"]) : false;
$picture_id = (isset($_REQUEST["picture_id"]) && $_REQUEST["picture_id"] !="") ? clean($_REQUEST["picture_id"]) : false;
$principal = (isset($_REQUEST["principal"]) && $_REQUEST["principal"] !="") ? clean($_REQUEST["principal"]) : false;
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
if (!$picture_id) {
    array_push($error, 'Picture_id is mandatory');
}
if (!$principal) {
    array_push($error, 'Principal is mandatory');
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
if (! products_pictures_is_product_code($product_code) ) {
    array_push($error, 'Product_code format error');
}
if (! products_pictures_is_picture_id($picture_id) ) {
    array_push($error, 'Picture_id format error');
}
if (! products_pictures_is_principal($principal) ) {
    array_push($error, 'Principal format error');
}
if (! products_pictures_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! products_pictures_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( products_pictures_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    products_pictures_edit(
        $id ,  $product_code ,  $picture_id ,  $principal ,  $order_by ,  $status    
        );
        
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products_pictures");
            break;
            
        case 2:
            header("Location: index.php?c=products_pictures&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products_pictures&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products_pictures&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=products_pictures&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
