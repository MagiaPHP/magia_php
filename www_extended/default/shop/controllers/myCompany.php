<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$e = (!empty($_REQUEST["e"])) ? ($_REQUEST["e"]) : false;

if ($e == "ok") {
    array_push($error, "ok");
}


include view("shop", "address_check");

//include view("shop", "myCompany"); 
