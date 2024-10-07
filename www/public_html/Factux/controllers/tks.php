<?php

//if (!permissions_has_permission($u_rol, $c, "update")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}

$code = (isset($_GET["code"])) ? clean($_GET["code"]) : false;

$error = array();

################################################################################
if (!$code) {
    array_push($error, "Code Don't send");
}
################################################################################
################################################################################
################################################################################
if (!subdomains_field_code('id', $code)) {
    array_push($error, "Account not find");
}

################################################################################
if (!$error) {
    $subdomain = subdomains_details_by_code($code);

    include view("public_html", "tks");
} else {
    // array_push($error, "Check your form");

    include view("home", "pageError");
}

