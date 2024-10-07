<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$category_code = (isset($_POST["category_code"]) && $_POST["category_code"] !=""  && $_POST["category_code"] !="null" ) ? clean($_POST["category_code"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$price = (isset($_POST["price"]) && $_POST["price"] !=""  && $_POST["price"] !="null" ) ? clean($_POST["price"]) :  null  ;
$tax = (isset($_POST["tax"]) && $_POST["tax"] !=""  && $_POST["tax"] !="null" ) ? clean($_POST["tax"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
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
################################################################################
if (!$error) {
    $lastInsertId = products_add(
        $category_code ,  $code ,  $name ,  $description ,  $price ,  $tax ,  $order_by ,  $status    
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
            // ejemplo index.php?c=products&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


