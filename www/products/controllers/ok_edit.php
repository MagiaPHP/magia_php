<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$category_code = (isset($_REQUEST["category_code"]) && $_REQUEST["category_code"] !="") ? clean($_REQUEST["category_code"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] !="") ? clean($_REQUEST["code"]) : false;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] !="") ? clean($_REQUEST["name"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] !="") ? clean($_REQUEST["description"]) : false;
$price = (isset($_REQUEST["price"]) && $_REQUEST["price"] !="") ? clean($_REQUEST["price"]) : false;
$tax = (isset($_REQUEST["tax"]) && $_REQUEST["tax"] !="") ? clean($_REQUEST["tax"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$category_code) {
    array_push($error, 'Category_code is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (! products_is_category_code($category_code) ) {
    array_push($error, 'Category_code format error');
}
if (! products_is_code($code) ) {
    array_push($error, 'Code format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if( products_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( products_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    products_edit(
        $id ,  $category_code ,  $code ,  $name ,  $description ,  $price ,  $tax ,  $order_by ,  $status    
        );
        
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products");
            break;
            
        case 2:
            header("Location: index.php?c=products&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=products&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
