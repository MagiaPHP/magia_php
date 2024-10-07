<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] !=""  && $_POST["contact_id"] !="null" ) ? clean($_POST["contact_id"]) :  null  ;
$day = (isset($_POST["day"]) && $_POST["day"] !=""  && $_POST["day"] !="null" ) ? clean($_POST["day"]) :  null  ;
$am_start = (isset($_POST["am_start"]) && $_POST["am_start"] !=""  && $_POST["am_start"] !="null" ) ? clean($_POST["am_start"]) :  null  ;
$am_end = (isset($_POST["am_end"]) && $_POST["am_end"] !=""  && $_POST["am_end"] !="null" ) ? clean($_POST["am_end"]) :  null  ;
$pm_start = (isset($_POST["pm_start"]) && $_POST["pm_start"] !=""  && $_POST["pm_start"] !="null" ) ? clean($_POST["pm_start"]) :  null  ;
$pm_end = (isset($_POST["pm_end"]) && $_POST["pm_end"] !=""  && $_POST["pm_end"] !="null" ) ? clean($_POST["pm_end"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
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
################################################################################
if (!$error) {
    $lastInsertId = schedule_add(
        $contact_id ,  $day ,  $am_start ,  $am_end ,  $pm_start ,  $pm_end ,  $order_by ,  $status    
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
            // ejemplo index.php?c=schedule&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


