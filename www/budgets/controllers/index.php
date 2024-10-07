<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
$client_id = "";
$status = "";
$pagination = "";

if (!$error) {
    ################################################################################
    $pagination = new Pagination($page, budgets_list());
    // puede hacer falta
    //$pagination->setUrl($url);
    $budgets = budgets_list($pagination->getStart(), $pagination->getLimit());
    ################################################################################
    include view("budgets", 'index');
} else {

    include view("home", "pageError");
}