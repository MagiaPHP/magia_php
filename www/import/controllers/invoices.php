<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//$factux_code =   (isset($_GET["factux_code"]) && $_GET['factux_code'] !='' ) ? clean($_GET["factux_code"]) : false;
//vardump($factux_code);
//echo "poner un verificado de factux_code "; 

include view("import", "invoices");

