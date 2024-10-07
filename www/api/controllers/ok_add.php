<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] !=""  && $_POST["contact_id"] !="null" ) ? clean($_POST["contact_id"]) :  null  ;
$api_key = (isset($_POST["api_key"]) && $_POST["api_key"] !=""  && $_POST["api_key"] !="null" ) ? clean($_POST["api_key"]) :  null  ;
$crud = (isset($_POST["crud"]) && $_POST["crud"] !=""  && $_POST["crud"] !="null" ) ? clean($_POST["crud"]) :  null  ;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] !=""  && $_POST["date_start"] !="null" ) ? clean($_POST["date_start"]) :  null  ;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] !=""  && $_POST["date_end"] !="null" ) ? clean($_POST["date_end"]) :  null  ;
$requests_limit = (isset($_POST["requests_limit"]) && $_POST["requests_limit"] !="" ) ? clean($_POST["requests_limit"]) : 100 ;
$limit_period = (isset($_POST["limit_period"]) && $_POST["limit_period"] !="" ) ? clean($_POST["limit_period"]) : 3600 ;
$requests_made = (isset($_POST["requests_made"]) && $_POST["requests_made"] !=""  && $_POST["requests_made"] !="null" ) ? clean($_POST["requests_made"]) :  null  ;
$last_request = (isset($_POST["last_request"]) && $_POST["last_request"] !="" ) ? clean($_POST["last_request"]) : current_timestamp() ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$contact_id) {
    array_push($error, 'Contact_id is mandatory');
}
if (!$api_key) {
    array_push($error, 'Api_key is mandatory');
}
if (!$date_start) {
    array_push($error, 'Date_start is mandatory');
}
if (!$date_end) {
    array_push($error, 'Date_end is mandatory');
}
if (!$requests_limit) {
    array_push($error, 'Requests_limit is mandatory');
}
if (!$limit_period) {
    array_push($error, 'Limit_period is mandatory');
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
if (! api_is_contact_id($contact_id) ) {
    array_push($error, 'Contact_id format error');
}
if (! api_is_api_key($api_key) ) {
    array_push($error, 'Api_key format error');
}
if (! api_is_date_start($date_start) ) {
    array_push($error, 'Date_start format error');
}
if (! api_is_date_end($date_end) ) {
    array_push($error, 'Date_end format error');
}
if (! api_is_requests_limit($requests_limit) ) {
    array_push($error, 'Requests_limit format error');
}
if (! api_is_limit_period($limit_period) ) {
    array_push($error, 'Limit_period format error');
}
if (! api_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! api_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( api_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = api_add(
        $contact_id ,  $api_key ,  $crud ,  $date_start ,  $date_end ,  $requests_limit ,  $limit_period ,  $requests_made ,  $last_request ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=api");
            break;
            
        case 2:
            header("Location: index.php?c=api&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=api&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=api&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=api&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


