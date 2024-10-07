<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$contact_id = (isset($_REQUEST["contact_id"]) && $_REQUEST["contact_id"] !="") ? clean($_REQUEST["contact_id"]) : false;
$api_key = (isset($_REQUEST["api_key"]) && $_REQUEST["api_key"] !="") ? clean($_REQUEST["api_key"]) : false;
$crud = (isset($_REQUEST["crud"]) && $_REQUEST["crud"] !="") ? clean($_REQUEST["crud"]) : false;
$date_start = (isset($_REQUEST["date_start"]) && $_REQUEST["date_start"] !="") ? clean($_REQUEST["date_start"]) : false;
$date_end = (isset($_REQUEST["date_end"]) && $_REQUEST["date_end"] !="") ? clean($_REQUEST["date_end"]) : false;
$requests_limit = (isset($_REQUEST["requests_limit"]) && $_REQUEST["requests_limit"] !="") ? clean($_REQUEST["requests_limit"]) : false;
$limit_period = (isset($_REQUEST["limit_period"]) && $_REQUEST["limit_period"] !="") ? clean($_REQUEST["limit_period"]) : false;
$requests_made = (isset($_REQUEST["requests_made"]) && $_REQUEST["requests_made"] !="") ? clean($_REQUEST["requests_made"]) : false;
$last_request = (isset($_REQUEST["last_request"]) && $_REQUEST["last_request"] !="") ? clean($_REQUEST["last_request"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
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
if (! $error ) {
    
    api_edit(
        $id ,  $contact_id ,  $api_key ,  $crud ,  $date_start ,  $date_end ,  $requests_limit ,  $limit_period ,  $requests_made ,  $last_request ,  $order_by ,  $status    
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
            // ejemplo index.php?c=api&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
