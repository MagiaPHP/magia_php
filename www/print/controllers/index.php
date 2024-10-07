<?php

//if (!permissions_has_permission($u_rol, $c, "read")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}
//$perte = (isset($_POST["perte"])) ? clean($_POST["perte"]) : false;


vardump($c);
vardump($a);

include view('print', 'index');

