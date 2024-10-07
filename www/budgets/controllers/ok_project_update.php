<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$project_id = (isset($_POST["project_id"])) ? clean($_POST["project_id"]) : false;

$error = array();

################################################################################
# requerias
if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
if (!$project_id) {
    array_push($error, '$project_id is mandatory');
}
################################################################################
# Formato
if (!budgets_is_id($budget_id)) {
    array_push($error, '$budget_id format error');
}
if (!projects_is_id($project_id)) {
    array_push($error, '$project_id format error');
}
################################################################################
# Condiciones
// si el proyecto existe 
if (!projects_field_id('id', $project_id)) {
    array_push($error, 'Project not exist');
}
// si el proyecto esta abierto 
//if (projects_field_id('status', $project_id) != 1) { // debe estar abierto 
//    array_push($error, 'The project has been open');
//}
// si le budget existe
if (!budgets_field_id('id', $budget_id)) {
    array_push($error, 'Invoices not exist..');
}
// si la factura no esta en otro proyecto 
if (projects_inout_search_by('budget_id', $budget_id)) {
    array_push($error, 'Budget already in the project');
}

################################################################################
################################################################################

if (!$error) {


    $value = ( budgets_field_id('total', $budget_id) + budgets_field_id('tax', $budget_id));

    projects_inout_add($project_id, $budget_id, null, null, $value, 1, 1);

    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $budget_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Budgets [ $budget_id ] insert to project [ $project_id ] ";
    $doc_id = $budget_id;
    $crud = "update";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
    ############################################################################
    ############################################################################      


    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=budgets&a=details&id=$budget_id#1");
            break;

        case 2:
            header("Location: index.php?c=budgets&a=edit&id=$budget_id#2");
            break;

        case 3:
            header("Location: index.php?c=budgets&a=details&id=$budget_id#3");
            break;

        default:
            header("Location: index.php?c=budgets&a=details&id=$budget_id#default");
            break;
    }
} else {

    include view("home", "pageError");
}
