<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;

$company = new Company();
$company->setCompany($u_owner_id);
$company->setSubdomain();

// Busco el primer budget creado para este cliente 
// con el codigo startxxxxxxxxxxxxx
$budget_start = budgets_start_by_client_id($u_owner_id);
// 2 El cliente realiza el pago 
// 3 una vez el diner llega a la cuenta 
// 4 se crea la factura apartir de este presupuesto 
// 5 se registra el cobro de la factura 
// 6 se envia la el presupuesto y factura al cliente via la red factux
// 
// 



if ($budget_start) {
    $budget = new Budgets();
//    $budget->setBudgets(budgets_search_by_client($u_owner_id)[0]['id']);
    $budget->setBudgets($budget_start[0]['id']);
}
include view("shop", "8");
