<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$presentation = (isset($_POST["presentation"]) && $_POST["presentation"] !=""  && $_POST["presentation"] !="null" ) ? clean($_POST["presentation"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$presentation) {
    array_push($error, 'Presentation is mandatory');
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
if (! products_presentation_names_is_presentation($presentation) ) {
    array_push($error, 'Presentation format error');
}
if (! products_presentation_names_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! products_presentation_names_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( products_presentation_names_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = products_presentation_names_add(
        $presentation ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=products_presentation_names");
            break;
            
        case 2:
            header("Location: index.php?c=products_presentation_names&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=products_presentation_names&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=products_presentation_names&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=products_presentation_names&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


