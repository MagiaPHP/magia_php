<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$group_code = (isset($_REQUEST["group_code"]) && $_REQUEST["group_code"] !="") ? clean($_REQUEST["group_code"]) : false;
$father_code = (isset($_REQUEST["father_code"]) && $_REQUEST["father_code"] !="") ? clean($_REQUEST["father_code"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] !="") ? clean($_REQUEST["code"]) : false;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] !="") ? clean($_REQUEST["name"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
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
if (! $error ) {
    
    products_categories_edit(
        $id ,  $group_code ,  $father_code ,  $code ,  $name ,  $order_by ,  $status    
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
            // ejemplo index.php?c=products_categories&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
