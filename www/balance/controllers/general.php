<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$totalItems = count(balance_general_list());

//vardump($totalItems);

include controller("balance", "pagination");
// ****************************************

$balance = balance_general_list($limit, $start);
//$balance = balance_general_list() ;
//vardump(count($balance));

include view("balance", 'general');

