<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//
$budget_id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
// un array de presupuestos 
$array_budgets = array();
//
// agrego el presente presupuesto al array 
array_push($array_budgets, $budget_id);
//
//
$error = array();
//
################################################################################
if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
//
if (!budgets_field_id("client_id", $budget_id)) {
    array_push($error, 'client_id not present in budget');
}
//
################################################################################
# // si el budget esta en status aceptado
//if (budgets_field_id("status", $budget_id) == 30) {
//    array_push($error, 'Budget already accepted');
//}
// si esta Rechazado por el cliente 
//if (budgets_field_id("status", $budget_id) == 40) {
//    array_push($error, 'Budget already rejected');
//}
// Si esta cancelado
//if (budgets_field_id("status", $budget_id) == -10) {
//    array_push($error, 'Budget already candeled');
//}
# viene de un ORDER 
if (orders_budgets_search_order_by_budget($budget_id)) {
    array_push($error, 'This budget comes from an order, it cannot be canceled');
    array_push($error, 'First cancel the order');
}

################################################################################
################################################################################
################################################################################
if (!$error) {
    // Cambiamos de status a rechazado por el cliente 
    budgets_change_status_to($budget_id, 40);
    //
    // actualizo el total del presupuesto 
    budgets_update_total_tax($budget_id, budget_lines_totalHTVA($budget_id), budget_lines_totalTVA($budget_id));
    //
    header("Location: index.php?c=budgets&a=details&id=$budget_id");
} else {
    include view("home", "pageError");
}    