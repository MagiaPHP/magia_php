<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"]) ? clean($_REQUEST["id"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
###############################################################################
# FORMAT
################################################################################
//if (isset($id) && !expenses_categories_is_id($id)) {
//    array_push($error, 'Id format error');
//}
###############################################################################
# CONDICIONAL
################################################################################
//if (!expenses_categories_field_id("id", $id)) {
//    array_push($error, "Id is mandatory");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    if ($id) {

        $expenses_categories = new Expenses_categories_e();
        $expenses_categories->setExpenses_categories($id);
    }



    include view("expenses_categories", "index");
} else {
    include view("home", "pageError");
}    



