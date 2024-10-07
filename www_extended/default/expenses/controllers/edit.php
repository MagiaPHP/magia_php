<?php

include "www_extended/default/expenses/models/Expense.php";

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!expenses_can_be_edit($id)) {
    $error = expenses_why_can_not_be_edit($id);
}
################################################################################
if (!$error) {

    $expense = new Expense();
    $expense->setExpenses($id);
    $expense->setLines();

//    vardump($expense->getLines());
//    switch (_options_option('config_budgets_edit_tmp')) {
//        case 'short':
//            include view("expenses", "short_edit");
//            break;
//
//        case '2_cols':
//            include view("expenses", "2_cols_edit");
//            break;
//
//        case 'default':
//        default:
//            include view("expenses", "edit");
//            break;
//    }
//    
//    
//    
    include view("expenses", "2_cols_edit");
} else {

    include view("home", "pageError");
}
