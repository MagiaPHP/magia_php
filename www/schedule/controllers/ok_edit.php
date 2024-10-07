<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$contact_id = (isset($_REQUEST["contact_id"]) && $_REQUEST["contact_id"] !="") ? clean($_REQUEST["contact_id"]) : false;
$day = (isset($_REQUEST["day"]) && $_REQUEST["day"] !="") ? clean($_REQUEST["day"]) : false;
$am_start = (isset($_REQUEST["am_start"]) && $_REQUEST["am_start"] !="") ? clean($_REQUEST["am_start"]) : false;
$am_end = (isset($_REQUEST["am_end"]) && $_REQUEST["am_end"] !="") ? clean($_REQUEST["am_end"]) : false;
$pm_start = (isset($_REQUEST["pm_start"]) && $_REQUEST["pm_start"] !="") ? clean($_REQUEST["pm_start"]) : false;
$pm_end = (isset($_REQUEST["pm_end"]) && $_REQUEST["pm_end"] !="") ? clean($_REQUEST["pm_end"]) : false;
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
if (!$day) {
    array_push($error, 'Day is mandatory');
}
if (!$am_start) {
    array_push($error, 'Am_start is mandatory');
}
if (!$am_end) {
    array_push($error, 'Am_end is mandatory');
}
if (!$pm_start) {
    array_push($error, 'Pm_start is mandatory');
}
if (!$pm_end) {
    array_push($error, 'Pm_end is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (! schedule_is_contact_id($contact_id) ) {
    array_push($error, 'Contact_id format error');
}
if (! schedule_is_day($day) ) {
    array_push($error, 'Day format error');
}
if (! schedule_is_am_start($am_start) ) {
    array_push($error, 'Am_start format error');
}
if (! schedule_is_am_end($am_end) ) {
    array_push($error, 'Am_end format error');
}
if (! schedule_is_pm_start($pm_start) ) {
    array_push($error, 'Pm_start format error');
}
if (! schedule_is_pm_end($pm_end) ) {
    array_push($error, 'Pm_end format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( schedule_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    schedule_edit(
        $id ,  $contact_id ,  $day ,  $am_start ,  $am_end ,  $pm_start ,  $pm_end ,  $order_by ,  $status    
        );
        
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=schedule");
            break;
            
        case 2:
            header("Location: index.php?c=schedule&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=schedule&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=schedule&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=schedule&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
