<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$date = (isset($_POST["date"]) && $_POST["date"] !="" ) ? clean($_POST["date"]) : current_timestamp() ;
$subdomain = (isset($_POST["subdomain"]) && $_POST["subdomain"] !=""  && $_POST["subdomain"] !="null" ) ? clean($_POST["subdomain"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$date) {
    array_push($error, 'Date is mandatory');
}
if (!$subdomain) {
    array_push($error, 'Subdomain is mandatory');
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
if (! backups_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! backups_is_subdomain($subdomain) ) {
    array_push($error, 'Subdomain format error');
}
if (! backups_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! backups_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( backups_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = backups_add(
        $date ,  $subdomain ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=backups");
            break;
            
        case 2:
            header("Location: index.php?c=backups&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=backups&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=backups&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=backups&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


