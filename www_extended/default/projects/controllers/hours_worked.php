<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

$month = (isset($_REQUEST['month'])) ? clean($_REQUEST['month']) : date('m');
$year = (isset($_REQUEST['year'])) ? clean($_REQUEST['year']) : date('Y');

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
}
if (!$month) {
    array_push($error, "Month is mandatory");
}
if (!$month) {
    array_push($error, "Year is mandatory");
}

###############################################################################
# FORMAT
################################################################################
if (!projects_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!projects_field_id("id", $id)) {
    array_push($error, "Id is mandatory");
}

//$year = magia_dates_get_year_from_date($date_start);
//$month = magia_dates_get_month_from_date($date_start);
################################################################################
################################################################################
################################################################################
if (!$error) {
    
    $projects = new Projects();
    
    $projects->setProjects($id);

    include view("projects", "hours_worked");
    
} else {
    include view("home", "pageError");
}    

