<?php

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$code = (isset($_REQUEST["code"])) ? clean($_REQUEST["code"]) : false;
$l = (isset($_REQUEST["l"])) ? clean($_REQUEST["l"]) : false;

$error = array();

if (!modules_field_module('status', 'app')) {
    array_push($error, 'Module app is inactived');
}
// debe ser en estatus correcto 
// 
#################################################################################
# Requeridas
if (!$id) {
    array_push($error, "ID Don't send");
}
if (!$code) {
    array_push($error, "Code don't send");
}
if (!$a) {
    array_push($error, '$a dont sent');
}
#################################################################################
# Formato
if (!is_id($id)) {
    array_push($error, "ID format error");
}
// si no existe
if (!budgets_field_id('id', $id)) {
    array_push($error, "Document number error");
}
// si el codigo no le pertenece
if ($code != budgets_field_id('code', $id)) {
    array_push($error, "Document code error");
}

if (!_options_option("config_budgets_accept_via_web")) {
    array_push($error, "Budgets accept via la web is inactived");
}

// existe el budget
if (!budgets_details_by_id_and_code($id, $code)) {
    array_push($error, "Budget number o code error");
}
////////////////////////////////////////////////////////////////////////////////
#################################################################################
#################################################################################
// pasamos el $id a $budget_id para eviar que se pueda ver los estatus del presupuesto solo con el id

$budget_id = budgets_details_by_id_and_code($id, $code)['id'];

// si el formato no corresponde
//---------------------------------------------------------
if (intval(budgets_field_id('status', $budget_id)) == 10) {
    array_push($error, "The budget is not ready yet");
}
//---------------------------------------------------------
if (intval(budgets_field_id('status', $budget_id)) == 20) {
    //  array_push($error, "20"); // Solo este estatus puede ser visible por APP
}
//---------------------------------------------------------
if (intval(budgets_field_id('status', $budget_id)) == 30) {
    array_push($error, "Budgets already accepted by customer");
}
//---------------------------------------------------------
if (intval(budgets_field_id('status', $budget_id)) == 40) {
    array_push($error, "Budgets already rejected by customer");
}
//---------------------------------------------------------
if (intval(budgets_field_id('status', $budget_id)) == 50) {
    array_push($error, "Budgets cancel");
}
//---------------------------------------------------------
if (intval(budgets_field_id('status', $budget_id)) == 35) {
    array_push($error, "Budget already accepted");
}
//---------------------------------------------------------
################################################################################

if (!$error) {

    $budget = budgets_details($id);

    $addresses_billing = json_decode($budget['addresses_billing'], true);
    $addresses_delivery = json_decode($budget['addresses_delivery'], true);

    include view("budgets", "export_pdf");
} else {

    include view("home", "pageError");
}
