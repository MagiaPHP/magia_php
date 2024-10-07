<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$year = (isset($_REQUEST['year'])) ? clean($_REQUEST['year']) : date('Y');
$month = (isset($_REQUEST['month'])) ? clean($_REQUEST['month']) : date('m');

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
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
if (!modules_field_module('status', 'tasks')) {
    array_push($error, "Module is inactive");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    
    $projects = new Projects();
    
    $projects->setProjects($id);

    
    //vardump($projects); 
    
    include view("projects", "tasks");
    
    
} else {
    include view("home", "pageError");
}    

