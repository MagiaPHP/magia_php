<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
///
$budget_id = (isset($_REQUEST["budget_id"])) ? clean($_REQUEST["budget_id"]) : false;
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$description = (isset($_REQUEST["description"])) ? clean($_REQUEST["description"]) : '';
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

###############################################################################
# V e r i f i c a c i o n 
if (!$id) {
    array_push($error, "ID is mandatory");
}
###############################################################################
if (!is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
################################################################################

if (!$error) {

    budget_lines_description_update($id, '---' . $description);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=budgets&a=edit&id=$budget_id");
            break;

        default:
            header("Location: index.php?c=budgets&a=details&id=$budget_id");
            break;
    }
} else {
    include view("home", "pageError");
}    