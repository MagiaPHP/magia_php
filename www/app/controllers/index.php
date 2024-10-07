<?php

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$code = (isset($_REQUEST["code"])) ? clean($_REQUEST["code"]) : false;
$doc = (isset($_REQUEST["doc"])) ? clean($_REQUEST["doc"]) : false;

$error = array();

$selected_b = ($doc == 'b') ? " selected " : "";
$selected_i = ($doc == 'i') ? " selected " : "";

################################################################################
# Requerias
################################################################################
# Formato
################################################################################
# Condiciones
//if (!_options_option("config_budgets_accept_via_web")) {
//    array_push($error, "Budgets accept via la web is inactived");
//}
if (!modules_field_module('status', 'app')) {
    array_push($error, "App module is inactived");
}
################################################################################
# 
################################################################################
if (!$error) {

    $my_company = new Company();
    $my_company->setCompany(1022);

    include view("app", "index");
} else {


    include view("home", "pageError");
}


