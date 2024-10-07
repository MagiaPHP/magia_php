<?php

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$code = (isset($_REQUEST["code"])) ? clean($_REQUEST["code"]) : false;
$client_number = (isset($_REQUEST["cn"])) ? clean($_REQUEST["cn"]) : false;

$error = array();

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
#################################################################################
# Formato
if (!is_id($id)) {
    array_push($error, "ID format error");
}
#################################################################################
# 
# 
# 
# 
#################################################################################
# Condiciones
# 
// modulo activo
// config_budgets_accept_via_web
if (!_options_option("config_budgets_accept_via_web")) {
    array_push($error, "Budgets accept via la web is inactived");
}

// existe el budget
if (!budgets_details_by_id_and_code($id, $code)) {
    array_push($error, "Budget number o code error");
}
// pasamos el $id a $budget_id para eviar que se pueda ver los estatus del presupuesto solo con el id
$budget_id = budgets_details_by_id_and_code($id, $code)['id'];
//
if (intval(budgets_field_id('status', $budget_id)) != 20) {
    array_push($error, "Budgets error status"); // Solo este estatus puede ser visible por APP
}
// si el numero de cliente es igual al que envia en el formulario
if ($client_number != budgets_field_id('client_id', $budget_id)) {
    array_push($error, "Client number error");
}


#################################################################################


if (!$error) {
    
    budgets_change_status_to($budget_id, 30);

    include view("app", "tks");
} else {

    include view("home", "pageError");
}

