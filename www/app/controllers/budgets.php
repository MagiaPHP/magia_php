<?php

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$code = (isset($_REQUEST["code"])) ? clean($_REQUEST["code"]) : false;
$l = (isset($_REQUEST["l"])) ? clean($_REQUEST["l"]) : false;

$error = array();

################################################################################
if (!modules_field_module('status', 'app')) {
    array_push($error, 'Module app is inactived');
}
//
if (!_options_option("config_budgets_accept_via_web")) {
    array_push($error, "Budgets accept via la web is inactived");
}
#################################################################################
# Requeridas
if (!$id) {
    array_push($error, "ID is mandatory");
}
if (!$code) {
    array_push($error, "Code is mandatory");
}

#################################################################################
# Formato
// si no existe
if (!budgets_field_id('id', $id)) {
    array_push($error, "Document number error");
}
// si el codigo no le pertenece
if ($code != budgets_field_id('code', $id)) {
    array_push($error, "Document code error");
}
#################################################################################
// lista de status permitidos en json
$app_budgets_status_allowed_json = _options_option('config_app_budgets_status_to_show');
// lista en array
$app_budgets_status_allowed_array = ($app_budgets_status_allowed_json) ? json_decode($app_budgets_status_allowed_json, true) : "";

// si no esta en la lista de status permitidos, > error 
if (isset($app_budgets_status_allowed_array) && !in_array(budgets_field_id('status', $id), $app_budgets_status_allowed_array)) {
    array_push($error, "The budget is not ready yet");
}

################################################################################
if (!$error) {

    $budgets = budgets_details_by_id_and_code($id, $code);

    $budget = new Budgets();
    
    $budget->setBudgets($id);

    include view("app", "budgets");
} else {


    include view("home", "pageError");
}

