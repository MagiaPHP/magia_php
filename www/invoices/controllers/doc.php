<?php

//
//if (!permissions_has_permission($u_rol, $c, "create")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}
//$error = array();
//################################################################################
//if (!$error) {
//    include view("invoices", "docs");
//} else {
//    include view("home", "pageError");
//}



include view("invoices", "doc");
