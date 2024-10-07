<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}


################################################################################

if (!budgets_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!budgets_field_id("*", $id)) {
    array_push($error, "id not exist");
}


################################################################################
################################################################################
if (!$error) {

    $budget = budgets_details($id);

    array_push($budget, budget_lines_list_by_budget_id($id));

    include view("budgets", "export");
} else {

    include view("home", "pageError");
}

