<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}

if (!$a) {
    array_push($error, "Action Don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}


################################################################################

if (!orders_budgets_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!orders_budgets_field_id("id", $id)) {
    array_push($error, "id not exist");
}



if (!$error) {
    $orders_budgets = orders_budgets_details($id);
    include view("orders_budgets", "details");
} else {
    array_push($error, "Check your form");
    include view("orders_budgets", "index");
}

