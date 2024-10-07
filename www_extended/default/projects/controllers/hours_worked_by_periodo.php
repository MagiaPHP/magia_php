<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

$date_start = (isset($_REQUEST["date_start"]) && $_REQUEST["date_start"] != "" ) ? clean($_REQUEST["date_start"]) : date('Y-m-d');
$date_end = (isset($_REQUEST["date_end"]) && $_REQUEST["date_end"] != "" ) ? clean($_REQUEST["date_end"]) : date('Y-m-d');

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
}
if (!$date_start) {
    array_push($error, "Date start is mandatory");
}
if (!$date_end) {
    array_push($error, "Date end is mandatory");
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

$year = magia_dates_get_year_from_date($date_start);
$month = magia_dates_get_month_from_date($date_start);
################################################################################
################################################################################
################################################################################
if (!$error) {
    $projects = new Projects();
    $projects->setProjects($id);

    //include view("projects", "hours_worked_by_period");
    include view("projects", "hours_worked");
} else {
    include view("home", "pageError");
}    

