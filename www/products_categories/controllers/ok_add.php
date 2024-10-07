<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$group_code = (isset($_POST["group_code"]) && $_POST["group_code"] !=""  && $_POST["group_code"] !="null" ) ? clean($_POST["group_code"]) :  null  ;
$father_code = (isset($_POST["father_code"]) && $_POST["father_code"] !=""  && $_POST["father_code"] !="null" ) ? clean($_POST["father_code"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$name) {
    array_push($error, 'Name is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (! products_categories_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! products_categories_is_name($name) ) {
    array_push($error, 'Name format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if( products_categories_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( products_categories_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = products_categories_add(
        $group_code ,  $father_code ,  $code ,  $name ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products_categories");
            break;
            
        case 2:
            header("Location: index.php?c=products_categories&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products_categories&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products_categories&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=products_categories&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


